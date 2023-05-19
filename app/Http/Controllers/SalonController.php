<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\Service;
use App\Models\Employee;
use App\Models\SalonPhoto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class SalonController extends Controller
{
    //
    public function index()
    {
        $data = Salon::all();
        return view('show', [

            'salons' => $data
        ]);
    }
    public function show($id)
    {

        $data = Salon::find($id);
        return view('salon', [
            'heading' => $data->name,
            'salon' => $data
        ]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {

        $usersalon = Salon::where('user_id', Auth::id())->first();

        if ($usersalon != null) {
            return redirect()->route('show')->with('message', 'mar rendelkezel szalonnal');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'phone_number'=>'required|numeric'
        ]);
        $filepath = 'logos/dummy-logo.png';
        if ($request->hasFile('logo')) {




            $filepath=$request->file('logo')->store('logos','public');
        }




        Salon::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'description' => $request->description,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'logo' => $filepath,
        ]);

        return redirect()->route('show');
    }
    public function mySalon()
    {
        $salon=Salon::where('user_id',Auth::id())->firstOrFail();

        return view('mysalon.dashboard',['salon'=>$salon]);

    }
    public function serviceform()
    {

        $services=Service::all();

        return view('mysalon.serviceform',['services'=>$services]);
    }
    public function addService(Request $request){
        $request->validate(
            ['id'=>'required',
        ]);

        $salon=Salon::where('user_id',Auth::id())->firstOrFail();
        $exists=$salon->services()->where('service_id',$request->id)->exists();
        if($exists){
            return back()->with('message','You already have this service');
        }
        $salon->services()->attach($request->id);

        return back()->with('message','Success');

    }
    public function deleteService(Request $request){
        $request->validate([
            'services' =>'required',
        ]);
        $salon=Salon::where('user_id',Auth::id())->firstOrFail();
        foreach($request->services as $service)

        $salon->services()->detach($service);

        return back()->with('message','Service delete succesfully');
    }
    public function edit()
    {

        $salon = Salon::where('user_id',Auth::id())->firstOrFail();
        if ($salon == null) {
            return redirect()->route('show')->with('message', 'You dont have a salon. Create one');
        }


        return view('update', ['salon' => $salon]);

    }
    public function update(Request $request)
    {

        $salon=Salon::where('user_id',Auth::id())->firstOrFail();

        if ($salon == null) {
            return redirect()->route('show')->with('message', 'Nope');
        }

        $salon->name = $request->name;
        $salon->description = $request->description;
        $salon->phone_number= $request->phone_number;
        $salon->email= $request->email;
        $salon->save();
        return redirect()->route('mysalon')->with('id',Auth::id());



    }
    public function myPictures(){
        $salon=Salon::where('user_id',Auth::id())->firstOrFail();
        $pictures=$salon->pictures;

        return view('mysalon.salonpictures',['pictures'=>$pictures]);

    }
    public function photoform()
    {
        $salon = Salon::where('user_id',Auth::id())->first();

        return view('addpic', ['salon' => $salon]);
    }
    public function addPhoto(Request $request)
    {
        $request->validate([
            'picture.*' =>'required|file|mimes:jpeg,jpg,png',
        ]);


            $salon = Salon::where('user_id', Auth::id())->first();

                if ($request->hasFile('picture')) {
                    foreach ($request->file('picture') as $picture) {


                        $filepath = $picture->store('salonimages','public');

                        SalonPhoto::create([
                            'salon_id' => $salon->id,
                            'name' => $filepath,
                        ]);
                    }
                    return redirect()->route('mysalon');
                }


    }
    public function deletePhotos(Request $request){
        $salon=Salon::where('user_id',Auth::id())->firstOrFail();
        foreach ($request->selectedPictures as $picture){
            $pic=SalonPhoto::find($picture);

            Storage::disk('public')->delete($pic->name);
            $pic->delete();

        }
        return back()->with('message','You successfully deleted the photos');
    }
    public function editLogo(){
        return view('mysalon.editpfp');
    }
    public function updateLogo(Request $request){

        $request->validate([
            'picture' =>'required|file|mimes:jpeg,jpg,png',
        ]);

        $salon=Salon::where('user_id',Auth::id())->firstOrFail();


        if (!$request->hasFile('picture')) {

            return redirect()->back();
        }
        $default='logos/dummy-logo.png';
        $filepath=$request->file('picture')->store('logos','public');
        if($default!=$salon->logo){

            Storage::disk('public')->delete($salon->logo);
        }
        $salon->logo=$filepath;
        $salon->save();
        return redirect()->route('mysalon')->with('message','You changed your logo succesfully');


    }
    public function employeeForm()
    {

        $services = Service::all();
        return view('employeeform')->with('services', $services);
    }
    public function addEmployee(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required|after:starts_at',
            'picture'=> 'file|mimes:jpeg,jpg,png'

        ]);


        $salon = Salon::where('user_id', Auth::id())->first();
        $validator->validate();
        $picturepath='employeepics/dummy-profile-pic.jpg';
        if ($request->hasFile('picture')) {
            $picturepath=$request->file('picture')->store('employeepics','public');
        }


        Employee::create([
            'name' => $request->name,
            'salon_id' => $salon->id,
            'description' => $request->description,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at,
            'picture' => $picturepath,
        ]);




        return redirect()->route('salon', ['id' => $salon->id, 'message' => 'Employee created succesfully']);
    }
    public function myServices(){
        $salon=Salon::where('user_id',Auth::id())->firstOrFail();
        $services=$salon->services()->get();

        return view('mysalon.services',['services'=>$services]);
    }

}

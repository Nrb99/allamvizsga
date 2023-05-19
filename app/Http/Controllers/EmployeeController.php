<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeePhoto;
use App\Models\EmployeePicture;
use App\Models\Reservation;
use App\Models\Salon;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        # code...
    }
    public function show($id){


        $employee= Employee::find($id);

        return view('employee',['employee'=>$employee]);
    }
    public function myEmployees(){

        $salon=Salon::where('user_id',Auth::id())->first();
        $employees=$salon->employees;
        return view('mysalon.employees',['employees'=>$employees]);
    }
    public function edit($id){

        $employee=Employee::find($id);
        $services=Service::all();
        if(Auth::id()!=$employee->salon->user_id){
            return redirect()->route('show')->with("You dont have permission to edit this employees data");

        }
        return view('updateemployee',['employee'=>$employee,
        'services'=> $services]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required|after:starts_at',
            'picture'=> 'file|mimes:jpeg,jpg,png',

        ]);

       $employee=Employee::find($request->id);

       if($employee->salon->user_id!=Auth::id()){
        return redirect()->route('show')->with('message','You dont have permission to update this employee');
       }
       $default='employeepics/dummy-profile-pic.jpg';
       if($request->hasFile('picture')){
        if($default!=$employee->picture){

        Storage::disk('public')->delete($employee->picture);
        }
         $filepath= $request->file('picture')->store('employeepics','public');
         $employee->picture=$filepath;
       }
       $employee->name=$request->name;
       $employee->description=$request->description;
       $employee->starts_at=$request->starts_at;
       $employee->ends_at=$request->ends_at;
       $employee->save();
       return redirect()->route('myemployees' ,['message'=>'Employee updated succesfully']);

    }
    public function destroy($id)
    {

        if(!Auth::check()){
            return redirect()->route('show')->with('message','Unaunthicated');
        }
        $employee= Employee::find($id);
        if(Auth::id()!=$employee->salon->user_id){
            return redirect()->route('show')->with('message','You dont have permission to delete this employee');
        }

        $employee->delete();
        return redirect()->route('myemployees')->with('message','Your employee is deleted succesfully');
    }
    public function addPhotos($id,Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('show',['message'=>'Unauthorized']);
        }
        $employee= Employee::find($id);
        if(Auth::id()!=$employee->salon->user_id){
            return redirect()->route('show',['message'=>'You dont have permission to add photos to this employee']);
        }
        if($request->hasFile('pictures')){

            foreach($request->file('pictures') as $picture){
                $filename= $picture->getClientOriginalName();
                $picture->storeAs('employeeportfolio',$filename,'public');
                EmployeePicture::create([
                    'employee_id'=>$employee->id,
                    'picture'=>$filename,
                ]);
            }
        }



    }
    public function employeeServices($id){
        $employee=Employee::findOrFail($id);
        if($employee->salon->user_id!=Auth::id()){
            return back()->with('message','Unauthorized');
        }
        $services=$employee->services()->withPivot('duration')->get();


        return view('mysalon.employeeservices',['services'=> $services,'employee'=>$employee]);
    }
    public function addServiceForm($id){
        $employee=Employee::findOrFail($id);
        if($employee->salon->user_id!=Auth::id()){
            return back()->with('message','Unauthorized');
        }
        $services=Service::all();

        return view('mysalon.employeeserviceform',[
            'services'=>$services,
            'employee'=>$employee,
        ]);
    }
    public function addService(Request $request){
        $request->validate([
            'employee_id'=>'required',
            'id'=> 'required',
            'duration'=> 'required|numeric',
        ]);
        $employee=Employee::find($request->employee_id);
        if($employee->salon->user_id!=Auth::id()){
            return back()->with('message','Unauthorized');
        }
        $exists=$employee->services()->where('service_id',$request->id)->exists();
        if($exists){
            return back()->with('message','This employe already has this service');
        }
        $employee->services()->attach($request->id,['duration'=>$request->duration]);

        return back();

    }
    public function deleteService(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'services'=>'required'
        ]);
        $employee=Employee::find($request->id);
        if($employee->salon->user_id!=Auth::id()){
            return back()->with('message','Unauthorized');
        }
        foreach($request->services as $service){
            $employee->services()->detach($service);
        }
        return back()->with('message','Service deleted succsesfully');


    }



}

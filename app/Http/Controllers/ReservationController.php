<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Reservation;
use App\Models\Salon;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin){
            return Reservation::all();
        }
    }
    public function myReservations()
    {
        $salon=Salon::where('user_id',Auth::id())->firstOrFail();
        $reservations=Reservation::where('salon_id',$salon->id)->get();

        return view('mysalon.reservations',['reservations'=>$reservations]);
    }
    public function myEmployeeReservations($id)
    {
       $reservations=Reservation::where('employee_id',$id)->get();

       return view('mysalon.employeereservations',['reservations'=>$reservations]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
         //$reservations=Reservation::All();
         $date=$request->date;
         $employee= Employee::find($id);
         $starttime=$employee->starts_at;
         $endtime=Carbon::parse($employee->ends_at);
         $time=Carbon::parse($starttime);
         $timestamps=[];
         //dd($time);



        $reservations=Reservation::where('employee_id',$employee->id)
        ->whereDate('reservation_time',$date)
        ->get();



        while($time<=$endtime){

            $timestamps[] = $time->format('H:i');
            $time->addMinutes(30);


        }

        if($reservations!=null){
            foreach($reservations as $reservation){
            $reserveddatetime=Carbon::parse($reservation->reservation_time);
            $reservationenddatetime=Carbon::parse($reservation->estimated_end);
            $reservedtime=$reserveddatetime->format('H:i');
            $endtime=$reservationenddatetime->format('H:i');



            foreach($timestamps as $key =>$time1){
                if($time1 >= $reservedtime && $time1 < $endtime){
                    unset($timestamps[$key]);

                }
            }

            }
        }



        return view('reservationform',['availabletimes'=>$timestamps,'employee'=>$employee,'date'=>$date]);
    }




    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'service' => 'required',

        ]);
        $validator->validate();



        $employee = Employee::find($request->employee_id);

        $employeeservice = $employee->services()->wherePivot('service_id', $request->service)->first();
        $duration = $employeeservice->pivot->duration;

        $datetime = Carbon::parse($request->date . ' ' . $request->time);
        $endtime = $datetime->copy()->addMinutes($duration);

        Reservation::create([
            'salon_id' => $employee->salon_id,
            'employee_id' => $employee->id,
            'service_booked' => $request->service,
            'client_name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'reservation_time' => $datetime,
            'estimated_end' => $endtime,
        ]);
        return redirect()->route('employee', ['id' => $request->employee_id])->with('message','Your reservation is created successfully');
    }


    public function show(Reservation $reservation)
    {
        //
    }


    public function edit(Reservation $reservation)
    {
        //
    }

    public function update(Request $request, Reservation $reservation)
    {
        //
    }


    public function destroy(Reservation $reservation)
    {

    }
}

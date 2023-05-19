<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $timestamps=false;
    protected $fillable=['salon_id','employee_id','service_booked','client_name','email','phone_number','reservation_time','estimated_end','ended_at','cancelled','reason'];
    use HasFactory;
    public function salon()
    {
       return $this->belongsToMany(Salon::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service_booked');
    }
}


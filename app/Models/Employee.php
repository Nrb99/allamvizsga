<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps= false;
    protected $fillable =['name','description','starts_at','ends_at','salon_id','picture'];
    use HasFactory;

    public function salon()
    {
       return $this->belongsTo(Salon::class);
    }
    public function services(){
       return $this->belongsToMany(Service::class,'employee_services')->withPivot('duration');
    }
    public function photos(){
        return $this->hasMany(EmployeePicture::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}

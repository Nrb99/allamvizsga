<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;
    protected $fillable=['name','salon_id','employee_id','duration'];
    use HasFactory;


    public function salons(){
        return $this->belongsToMany(Salon::class,'salon_services');
    }
    public function employees(){
        return $this->belongsToMany(Employee::class,'employee_services');
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}

<?php

namespace App\Models;


use App\Models\SalonPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salon extends Model
{
    protected $fillable=[
        'name',
        'description',
        'user_id',
        'logo',
        'phone_number',
        'email',
    ];
    public $timestamps=false;
    use HasFactory;
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function services(){
        return $this->belongsToMany(Service::class,'salon_services');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pictures()
    {
        return $this->hasMany(SalonPhoto::class);
    }
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

}

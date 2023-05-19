<?php

namespace App\Models;

use App\Models\Salon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalonPhoto extends Model
{
    public $timestamps=false;
    protected $fillable=['salon_id','name'];
    use HasFactory;
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
}


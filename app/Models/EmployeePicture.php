<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePicture extends Model
{

    public $timestamps=false;
    protected $fillable=['employee_id','picture'];
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}

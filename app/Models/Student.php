<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable=['born_place','name','email','student_id','student_id_second','email','password','address','student_class_id','born_date','born_place','religion','nik','father_name','mother_name','father_born_date','mother_born_date','father_work','mother_work','father_latest_education','mother_latest_education'];

    public function class()
    {
        return $this->belongsTo(\App\Models\StudentClass::class, 'student_class_id', 'id');
    }
}

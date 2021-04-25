<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable=['name','email','student_id','email','password','address','student_class_id'];

    public function class()
    {
        return $this->belongsTo(\App\Models\StudentClass::class, 'student_class_id', 'id');
    }
}

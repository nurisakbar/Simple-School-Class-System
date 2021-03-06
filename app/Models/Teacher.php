<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable=['name','email','password','phone','photo'];


    public function schedules()
    {
        return $this->hasMany(\App\Models\Schedule::class);
    }

    public function curiculum()
    {
        return $this->hasMany(\App\Models\Curiculum::class);
    }

    // walikelas
    public function studentClass()
    {
        return $this->hasOne(\App\Models\StudentClass::class);
    }
}

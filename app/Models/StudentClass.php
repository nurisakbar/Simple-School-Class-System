<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    public function schedules()
    {
        return $this->hasMany(\App\Models\Schedule::class);
    }

    public function student()
    {
        return $this->hasMany(\App\Models\Student::class);
    }
}

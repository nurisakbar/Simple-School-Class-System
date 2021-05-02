<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable=['name','teacher_id'];

    public function schedules()
    {
        return $this->hasMany(\App\Models\Schedule::class);
    }

    public function student()
    {
        return $this->hasMany(\App\Models\Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class);
    }
}

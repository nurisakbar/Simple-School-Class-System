<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curiculum extends Model
{
    use HasFactory;


    public function students()
    {
        return $this->hasMany(\App\Models\student::class, 'student_class_id', 'student_class_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable=['room_id','course_id','teacher_id','time','student_class_id','day'];

    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class);
    }

    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class);
    }

    public function class()
    {
        return $this->belongsTo(\App\Models\StudentClass::class, 'student_class_id', 'id');
    }
}

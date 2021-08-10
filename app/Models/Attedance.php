<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attedance extends Model
{
    use HasFactory;

    protected $fillable=['student_id','status','meet_to','course_id','teacher_id','date'];
}

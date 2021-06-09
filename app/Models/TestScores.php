<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestScores extends Model
{
    use HasFactory;

    protected $fillable=['knowledge_value','knowledge_predicate','knowledge_description','schedule_id','student_id','skill_value','skill_predicate','skill_description','semester'];


    public function schedule()
    {
        return $this->belongsTo(\App\Models\Schedule::class);
    }
}

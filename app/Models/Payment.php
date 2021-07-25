<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable=['student_id','description','payment_type','amount','name'];

    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class);
    }
}

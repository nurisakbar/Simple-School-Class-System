<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['subject','description','schedule_id','end_date'];

    public function schedule()
    {
        return $this->belongsTo(\App\Models\Schedule::class);
    }
}

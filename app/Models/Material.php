<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable=['schedule_id','title','description','file'];


    public function schedule()
    {
        return $this->belongsTo(\App\Models\Schedule::class);
    }
}

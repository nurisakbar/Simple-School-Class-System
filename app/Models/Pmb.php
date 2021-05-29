<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmb extends Model
{
    use HasFactory;

    protected $fillable=['name','nik','kk','phone','religion','address','gender','birth_date','birth_place'];
}

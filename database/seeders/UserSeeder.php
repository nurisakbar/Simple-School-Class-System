<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'administrator','email'=>'administrator@gmail.com','password'=>Hash::make('password')]);
        User::create(['name'=>'Kepala Sekolah','email'=>'kepsek@gmail.com','password'=>Hash::make('password')]);
    }
}

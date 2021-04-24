<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentClass;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            ['name'=>'Class 1A'],
            ['name'=>'Class 1B'],
            ['name'=>'Class 1C'],
            ['name'=>'Class 2A'],
            ['name'=>'Class 2B'],
            ['name'=>'Class 2C'],
            ['name'=>'Class 3A'],
            ['name'=>'Class 3B'],
            ['name'=>'Class 3C']
        ];

        StudentClass::insert($rooms);
    }
}

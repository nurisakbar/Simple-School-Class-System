<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentClass;
use App\Models\Teacher;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = Teacher::all()->random(1)->first();
        $rooms = [
            ['name'=>'Class 1A','teacher_id'=>$teacher->id],
            ['name'=>'Class 1B','teacher_id'=>$teacher->id],
            ['name'=>'Class 1C','teacher_id'=>$teacher->id],
            ['name'=>'Class 2A','teacher_id'=>$teacher->id],
            ['name'=>'Class 2B','teacher_id'=>$teacher->id],
            ['name'=>'Class 2C','teacher_id'=>$teacher->id],
            ['name'=>'Class 3A','teacher_id'=>$teacher->id],
            ['name'=>'Class 3B','teacher_id'=>$teacher->id],
            ['name'=>'Class 3C','teacher_id'=>$teacher->id]
        ];

        StudentClass::insert($rooms);
    }
}

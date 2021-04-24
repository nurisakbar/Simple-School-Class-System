<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            ['name'=>'Math'],
            ['name'=>'English'],
            ['name'=>'Science'],
            ['name'=>'Art']
        ];

        Course::insert($courses);
    }
}

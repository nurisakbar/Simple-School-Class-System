<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuriculumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view curiculums  as 
        SELECT c.id as course_id,
        c.name as course_name,
        sc.id as student_class_id,
        sc.name as student_class_name,
        t.name as teacher_name,
        t.id as teacher_id,
        t.photo as teacher_photo,
        ac.year as academic_year,
        ac.id as academic_year_id
        from schedules as s
        left join courses as c on c.id=s.course_id
        left join student_classes as sc on sc.id=s.student_class_id
        left join teachers as t on t.id=s.teacher_id
        left join academic_years as ac on ac.id=s.academic_year_id
        group by c.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curiculums');
    }
}

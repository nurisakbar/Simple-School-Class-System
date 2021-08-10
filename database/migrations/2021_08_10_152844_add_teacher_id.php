<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_scores', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'course_id');
            $table->integer('teacher_id');
        });

        DB::table('test_scores')->truncate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_scores', function (Blueprint $table) {
            //
        });
    }
}

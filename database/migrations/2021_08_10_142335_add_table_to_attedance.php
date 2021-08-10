<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableToAttedance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attedances', function (Blueprint $table) {
            $table->renameColumn('schedule_id', 'course_id');
            $table->integer('teacher_id');
        });

        DB::table('attedances')->truncate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attedance', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('schedule_id', false)->unsigned();
            $table->integer('student_id', false)->unsigned();
            $table->integer('skill_value', false)->unsigned();
            $table->integer('knowledge_value', false)->unsigned();
            $table->string('knowledge_predicate', 1);
            $table->text('knowledge_description');
            $table->string('skill_predicate', 1);
            $table->text('skill_description');
            $table->integer('semester', false)->unsigned();
            ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_scores');
    }
}

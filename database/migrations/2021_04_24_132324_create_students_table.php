<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 10); // nik
            $table->string('student_id_second', 10)->nullable();
            $table->string('name');
            $table->enum('gender', ['m','f']);
            $table->string('born_place');
            $table->string('born_date');
            $table->string('address');
            $table->string('address_2')->nullable(); // rt
            $table->string('address_3')->nullable(); //rw
            $table->string('address_4')->nullable(); // kelurahan
            $table->string('address_5')->nullable(); // kecamatan
            $table->string('postcode', 7);
            $table->string('phone', 13);
            $table->string('religion');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('father_born_date');
            $table->date('mother_born_date');
            $table->string('father_latest_education')->nullable();
            $table->string('mother_latest_education')->nullable();
            $table->string('father_work')->nullable();
            $table->string('mother_work')->nullable();
            $table->string('email');
            $table->string('password');
            $table->integer('student_class_id');
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
        Schema::dropIfExists('students');
    }
}

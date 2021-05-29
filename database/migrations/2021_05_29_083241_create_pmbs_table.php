<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmbs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('religion');
            $table->string('kk');
            $table->string('nik');
            $table->string('phone', 13);
            $table->text('address');
            $table->enum('gender', ['m','f']);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->boolean('payment_status')->nullable();
            $table->text('proof_of_payment')->nullable();
            $table->enum('pass_status', ['y','n'])->nullable();
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
        Schema::dropIfExists('pmbs');
    }
}

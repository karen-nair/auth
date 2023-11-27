<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('first_name');
        $table->string('last_name');
        $table->bigInteger('company'); 
        $table->string('email');
        $table->string('phone');
        $table->timestamps();
        $table->index('company'); 
        $table->foreign('company')->references('id')->on('companies'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}

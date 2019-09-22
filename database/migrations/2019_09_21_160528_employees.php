<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         *   image, name, phone, email, position, salary, head, hire_date
         */
        Schema::create('employees', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('image', 250)->nullable();
            $table->string('name', 250);
            $table->string('phone', 15);
            $table->string('email', 120);
            $table->bigInteger('position');
            $table->integer('salary');
            $table->bigInteger('head');
            $table->date('hire_date');

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
        Schema::dropIfExists('employees');
    }
}

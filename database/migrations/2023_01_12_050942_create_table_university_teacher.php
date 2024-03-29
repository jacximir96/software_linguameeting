<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_instructor', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id')->references('id')->on('university');

            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('user');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('university_instructor');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seminar_id')->nullable();
            $table->unsignedBigInteger('trainee_id')->nullable();
            $table->timestamps();

            $table->foreign('seminar_id')
                ->references('id')
                ->on('seminars')
                ->onDelete('cascade');

            $table->foreign('trainee_id')
                ->references('id')
                ->on('trainees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seminar_visits');
    }
}

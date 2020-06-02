<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('title');
            $table->string('about', 1024);
            $table->string('photo');
            $table->string('phone');
            $table->date('bday');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedTinyInteger('level');
            $table->enum('level_type', [
                'que',
                'dan',
            ]);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('locale');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}

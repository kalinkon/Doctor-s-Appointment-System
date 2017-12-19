<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')
                ->references('id')->on('doctors')
                ->ondelete('cascade');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->ondelete('cascade');
//            $table->integer('assistant_id')->unsigned();
            $table->timestamp('scheduledTime');
            $table->timestamp('endTime');
            $table->string('appointmentDuration')->nullable();
            $table->boolean('isCurrentlyActive');
            $table->string('diseaseSymptom')->nullable();
            $table->string('medication')->nullable();
            $table->string('tips')->nullable();
            $table -> string('isbooked');
            $table->boolean('isCancelled');
            $table->integer('serial');
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
        Schema::dropIfExists('appointments');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduling_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')
                ->references('id')->on('doctors')
                ->ondelete('cascade');

            $table->boolean('isAvailableOnFriday');
            $table->string('fridayStartingTime')->nullable();
            $table->string('fridayClosingTime')->nullable();

            $table->boolean('isAvailableOnSaturday');
            $table->string('saturdayStartingTime')->nullable();
            $table->string('saturdayClosingTime')->nullable();

            $table->boolean('isAvailableOnSunday');
            $table->string('sundayStartingTime')->nullable();
            $table->string('sundayClosingTime')->nullable();

            $table->boolean('isAvailableOnMonday');
            $table->string('mondayStartingTime')->nullable();
            $table->string('mondayClosingTime')->nullable();

            $table->boolean('isAvailableOnTuesday');
            $table->string('tuesdayStartingTime')->nullable();
            $table->string('tuesdayClosingTime')->nullable();

            $table->boolean('isAvailableOnWednesday');
            $table->string('wednesdayStartingTime')->nullable();
            $table->string('wednesdayClosingTime')->nullable();

            $table->boolean('isAvailableOnThursday');
            $table->string('thursdayStartingTime')->nullable();
            $table->string('thursdayClosingTime')->nullable();

            $table->string('timeForCategoryA_patients');
            $table->string('timeForCategoryB_patients');
            $table->string('timeForCategoryC_patients');

//            'appointmentReschedulingType',
//        'visitBufferTime',

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
        Schema::dropIfExists('scheduling_settings');
    }
}

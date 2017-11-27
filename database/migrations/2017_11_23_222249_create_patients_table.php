<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**•	id
        •	userId
        •	address
        •	totalAsasappointmentCount
        •	notShowingUpCount
        •	showingUpCount
**/
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
//            $table->foreign('userId')
//                ->references('id')->on('user')
//                ->ondelete('cascade');
            $table->string('address');
            $table->integer('totalAppointmentCount');
            $table->integer('noShowUpCount');
            $table->integer('showUpCount');
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
        Schema::dropIfExists('patients');
    }
}

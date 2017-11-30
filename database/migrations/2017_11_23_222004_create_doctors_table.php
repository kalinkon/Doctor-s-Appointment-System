<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            /**
             * •	id
            •	userId
            •	registrationNo.
            •	educationalDegrees
            •	specializationDepartment
            •	specializationDepartmentId
            •	chamberAddress
            •	chamberAddressGeoLocation
            •	visitfee
            •	isActiveForSchedulilng
            •	isChamberCurrentlyOpen
             */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->ondelete('cascade');
            $table->string('doctorName');
            $table->integer('registrationNo');
            $table->string('educationalDegrees');
            $table->string('specializationDepartment');
            $table->integer('specializationDepartmentId');
            $table->string('chamberAddress');
            $table->string('chamberAddressGeoLocation');
            $table->string('visitFee');
            $table->boolean('isActiveForScheduling');
            $table->boolean('isChamberCurrentlyOpen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}

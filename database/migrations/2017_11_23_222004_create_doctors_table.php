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
            $table->integer('userId');
            $table->integer('registrationNo');
            $table->string('educationalDegrees');
            $table->string('specializationDepartmentId');
            $table->string('chamberAddress');
            $table->string('chamberAddressGeoLocation');
            $table->string('visitfee');
            $table->string('isActiveForSchedulilng');
            $table->string('isChamberCurrentlyOpen');
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

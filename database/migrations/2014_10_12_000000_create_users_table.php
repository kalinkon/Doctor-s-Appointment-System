<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->string('name');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('mobileNo')->unique();
            $table->string('email')->nullable();
            $table->boolean('isActivated');
            $table->boolean('isValid')->nullable();
            $table->string('pictureLink');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

/**            •	id
•	password
•	name
•	dateOfBirth
•	email
•	mobileNo
•	role
•	pictureLink
•	isActivated
•	isValid
•	log
**/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

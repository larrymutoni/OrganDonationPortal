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
        Schema::create('donors', function (Blueprint $table) {
            $table->increments('DonorDId');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('gender');
            $table->date('dob');
            $table->string('bloodtype');
            $table->string('infectiousDiseases');
            $table->string('donationtype');
            $table->string('height');
            $table->string('organtype');
            $table->text('address1');
            $table->text('address2');
            $table->string('state');
            $table->string('phonenumber');
            $table->string('postalcode');
            $table->string('city');
            $table->string('country');
            $table->string('status')->default('Submitted');

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
        Schema::dropIfExists('donors');
    }
};

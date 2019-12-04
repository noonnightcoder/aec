<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('registration_date');
            $table->string('family_name',128);
            $table->string('given_name',128);
            $table->date('date_of_birth');
            $table->string('age_at_registration',16);
            $table->string('gender',10);
            $table->string('nationality',32);
            $table->integer('referral_id')->nullable();
            $table->integer('clinic_id');
            $table->string('phone1',32)->nullable();
            $table->string('phone2',32)->nullable();
            $table->string('email',64)->nullable();
            $table->string('address1',128)->nullable();
            $table->string('address2',128)->nullable();
            $table->integer('village_id')->nullable();
            $table->integer('communue_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('entry_id')->nullable();
            $table->integer('receptionist_id')->nullable();
            $table->string('deceased',2)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clinic_name',128)->unique();
            $table->string('email',128)->nullable();
            $table->string('phone',32)->nullable();
            $table->string('mobile',32)->nullable();
            $table->string('website',128)->nullable();
            $table->string('address1',128)->nullable();
            $table->string('address2',128)->nullable();
            $table->integer('village_id')->unsigned()->nullable();
            $table->integer('commune_id')->unsigned()->nullable();
            $table->integer('district_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('postcode',20)->nullable();
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
        Schema::dropIfExists('clinics');
    }
}

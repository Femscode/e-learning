<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('lincenses_license')->nullable();
            $table->string('lincenses_state')->nullable();
            $table->string('lincenses_expiration')->nullable();
            $table->string('lincenses_lincense_number')->nullable();
            $table->string('lincenses_image')->nullable();
            $table->string('client_specific_certification')->nullable();
            $table->string('client_specific_expiration')->nullable();
            $table->string('client_specific_licence_number')->nullable();
            $table->string('client_specific_image')->nullable();
            $table->string('pre_employment_license')->nullable();
            $table->string('pre_employment_state')->nullable();
            $table->string('pre_employment_expiration')->nullable();
            $table->string('pre_employment_license_number')->nullable();
            $table->string('pre_employment_image')->nullable();
            $table->string('certifications_license')->nullable();
            $table->string('certifications_state')->nullable();
            $table->string('certifications_expiration')->nullable();
            $table->string('certifications_license_number')->nullable();
            $table->string('certifications_image')->nullable();
            $table->string('medical_license')->nullable();
            $table->string('medical_state')->nullable();
            $table->string('medical_expiration')->nullable();
            $table->string('medical_license_number')->nullable();
            $table->string('medical_image')->nullable();
            $table->string('trainings_license')->nullable();
            $table->string('trainings_state')->nullable();
            $table->string('trainings_expiration')->nullable();
            $table->string('trainings_lincense_number')->nullable();
            $table->string('trainings_image')->nullable();
            $table->string('additional_cert_license')->nullable();
            $table->string('additional_cert_state')->nullable();
            $table->string('additional_cert_expiration')->nullable();
            $table->string('additional_cert_license_number')->nullable();
            $table->string('additional_cert_image')->nullable();
            $table->string('background_checks_license')->nullable();
            $table->string('background_checks_state')->nullable();
            $table->string('background_checks_expiration')->nullable();
            $table->string('background_checks_license_number')->nullable();
            $table->string('background_checks_image')->nullable();
            $table->string('hr_license')->nullable();
            $table->string('hr_state')->nullable();
            $table->string('hr_expiration')->nullable();
            $table->string('hr_license_number')->nullable();
            $table->string('hr_image')->nullable();
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
        Schema::dropIfExists('credentials')->nullable();
    }
}

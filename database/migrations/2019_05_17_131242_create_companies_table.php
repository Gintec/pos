<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('motto');
            $table->string('company_address');
            $table->text('company_services');
            $table->string('company_tel');
            $table->string('company_logo');
            $table->string('color');
            $table->string('company_email');
            $table->string('company_website');
            $table->string('company_account_no');
            $table->string('company_account_bank');
            $table->string('company_account_name');
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
        Schema::dropIfExists('companies');
    }
}

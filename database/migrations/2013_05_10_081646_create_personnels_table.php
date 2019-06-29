<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->bigIncrements('id');        
            $table->string('personnel_firstname');
            $table->string('personnel_lastname');
            $table->string('personnel_phoneno');
            $table->string('personnel_email')->nullable();
            $table->string('personnel_address')->nullable();
            $table->string('personnel_department');
            $table->string('personnel_id')->unique();            
            $table->text('personnel_details')->nullable();
            $table->string('personnel_salary')->nullable();
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
        Schema::dropIfExists('personnels');
    }
}

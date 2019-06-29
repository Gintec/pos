<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_name');
            $table->string('supplier_company')->nullable();
            $table->string('supplier_phoneno')->nullable();
            $table->string('supplier_email')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('supplier_items')->nullable();
            $table->string('supplier_id')->unique();
            //$table->foreign('supplier_id')->references('supplier_id')->on('inventory');
            $table->string('supplier_remarks')->nullable();
            $table->string('supplier_category')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}

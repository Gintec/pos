<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_id')->index('product_id');
            $table->string('supplier_id')->index('supplier_id');
            $table->date('date_supplied');
            $table->integer('quantity_supplied');
            $table->integer('cost_price');
            $table->string('supply_batchno');
            $table->string('remarks');      
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');      
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
        Schema::dropIfExists('inventories');
    }
}

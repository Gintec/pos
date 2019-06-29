<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_id')->index('product_id');
            $table->integer('quantity_sold');
            $table->decimal('amount',10,2);
            $table->string('sales_id');
            $table->decimal('item_discount',10,2);
            $table->string('invoice_no')->index('invoice_no');
            $table->string('remarks');            
            $table->timestamps();
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('invoice_no')->references('invoice_no')->on('invoices');
            $table->string('personnel_id')->index();
            $table->foreign('personnel_id')->references('personnel_id')->on('personnels');
            $table->decimal('selling_price',10,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

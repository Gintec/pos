<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returneds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_id')->index();
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->string('invoice_no')->index('invoice_no');
            $table->string('quantity_returned');
            $table->date('date_returned');
            $table->string('return_reason');
            $table->string('collected_by')->index('collected_by');
            $table->foreign('collected_by')->references('personnel_id')->on('personnels');
            $table->integer('item_id')->unsigned()->index('item_id');
            $table->decimal('amount_returned',10,2);
            $table->string('return_status')->default('In Returned List');
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
        Schema::dropIfExists('returneds');
    }
}

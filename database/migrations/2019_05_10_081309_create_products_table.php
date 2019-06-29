<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->string('selling_price');
            $table->string('measurement_unit')->nullable();
            $table->string('size')->nullable();
            $table->string('product_category');
            $table->string('product_type');
            $table->string('product_status')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('product_location')->nullable();
            $table->string('product_id')->unique();
            $table->string('made_year')->nullable();
            $table->string('model_name')->nullable();
            $table->string('product')->nullable();
            $table->string('part_number')->nullable();

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
        Schema::dropIfExists('products');
    }
}

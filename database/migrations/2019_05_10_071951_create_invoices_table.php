<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no')->unique();
            $table->decimal('total_amount',10,2);
            $table->decimal('total_discount', 10,2);
            $table->decimal('tax', 10,2);
            $table->string('payment_status');
            $table->decimal('balance',10,2);
            $table->string('customer_id')->index('customer_id');
            $table->string('invoice_date');
            $table->text('invoice_remarks')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}

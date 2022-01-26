<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');

            $table->integer('number_invoice');
            $table->date('purchase_date');

            $table->string('category');
            $table->string('brand');
            $table->string('model');
            $table->integer('serial_number');
            $table->longtext('breakdown');

            $table->string('exchange_type');
            $table->integer('exchange_number_ticket');

            $table->string('price');
            $table->longtext('prior_agreement');

            $table->boolean('rules_sav');

            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('user');
            
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
        Schema::dropIfExists('tickets');
    }
}

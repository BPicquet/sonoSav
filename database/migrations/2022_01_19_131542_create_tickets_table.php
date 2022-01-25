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
            $table->integer('price');
            $table->string('prior_agreement');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');

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

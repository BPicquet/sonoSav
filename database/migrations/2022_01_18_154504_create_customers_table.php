<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name');
            $table->bigInteger('code_client');
            
            $table->unsignedBigInteger('customer_type_id');
            $table->foreign('customer_type_id')->references('id')->on('customer_types');

            $table->string('phone');
            $table->string('mail')->unique();
            $table->string('address');
            $table->bigInteger('postal_code');
            $table->string('city');
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
        Schema::dropIfExists('customers');
    }
}

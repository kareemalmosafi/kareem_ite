<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_scientific');
            $table->string('name_trade');
            $table->string('type');
            $table->string('company');
            $table->integer('warehouse_id')->unsigned();
            $table->integer('quantity');
            $table->date('ex_date');
            $table->integer('price');
            $table->timestamps();
            $table->foreign('warehouse_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

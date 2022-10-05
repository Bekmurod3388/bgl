<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_id');
            $table->string('car_number');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('kg');
            $table->unsignedBigInteger('how_sum');
            $table->unsignedBigInteger('total_sum');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_incomes');
    }
};

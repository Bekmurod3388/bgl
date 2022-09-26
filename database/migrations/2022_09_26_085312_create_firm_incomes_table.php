<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id");
            $table->string("car_number");
            $table->unsignedBigInteger("brutto");
            $table->unsignedBigInteger("netto");
            $table->unsignedBigInteger("tara");
            $table->unsignedBigInteger("soil");
            $table->unsignedBigInteger("price");
            $table->unsignedBigInteger("total_price");
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
        Schema::dropIfExists('firm_incomes');
        Schema::table("firm_incomes", function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};

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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maxsulot_id');
            $table->string('kimga');
            $table->unsignedBigInteger('necha_somdan');
            $table->integer('kg');
            $table->unsignedBigInteger('jami_summ');
            $table->unsignedBigInteger('bergan_summ')->default(0);
            $table->unsignedBigInteger('qarzdorlik');
            $table->date('sanasi');
            $table->string('avto_raqam');
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
        Schema::dropIfExists('sells');
    }
};

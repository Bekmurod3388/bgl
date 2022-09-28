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
        Schema::create('firm_provideds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("firm_id");
            $table->unsignedBigInteger("price");
            $table->date("date");
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
        Schema::dropIfExists('firm_provideds');
        Schema::table("firm_provideds", function (Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};

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
        Schema::create('outlay', function (Blueprint $table) {
            $table->id();
            $table->string('outlay_name');
            $table->integer('summ')->default(0);
            $table->integer('one_summ')->default(0);
            $table->integer('all_summ')->default(0);
            $table->date('from_date');
//            $table->timestamps();
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
        Schema::dropIfExists('outlay');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDarazskusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darazskus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('darazlink_id');
            $table->foreign('darazlink_id')->references('id')->on('darazlink');
            $table->string('sku_id');
            $table->integer('sku_stock');
            $table->integer('price');
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
        Schema::dropIfExists('darazskus');
    }
}

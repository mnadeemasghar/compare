<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDarazTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darazlink', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->longText('page_body')->nullable();
            $table->string('product_title')->nullable();
            $table->string('product_link')->nullable();
            $table->string('product_rating_score')->nullable();
            $table->string('product_rating_total')->nullable();
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
        Schema::dropIfExists('daraz');
    }
}

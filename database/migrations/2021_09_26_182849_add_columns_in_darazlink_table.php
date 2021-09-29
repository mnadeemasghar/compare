<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInDarazlinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('darazlink', function (Blueprint $table) {
            //
            $table->string('seller_name');
            $table->string('seller_shop_id');
            $table->string('product_sale_price');
            $table->longText('product_skus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('darazlink', function (Blueprint $table) {
            //
        });
    }
}

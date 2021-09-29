<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnPropertiesInDarazlinkTable extends Migration
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
            $table->string('seller_name')->nullable()->change();
            $table->string('seller_shop_id')->nullable()->change();
            $table->string('product_sale_price')->nullable()->change();
            $table->longText('product_skus')->nullable()->change();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('IMAGE', function (Blueprint $table) {
        $table->unsignedBigInteger('product_id');

        $table->foreign('product_id')
            ->references('id')->on('PRODUCTS')
            ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
   public function down()
{
    Schema::table('IMAGE', function (Blueprint $table) {
        $table->dropForeign(['product_id']);
        $table->dropColumn('product_id');
    });
}
};

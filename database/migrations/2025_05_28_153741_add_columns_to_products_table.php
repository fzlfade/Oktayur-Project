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
    Schema::table('products', function (Blueprint $table) {
        $table->boolean('is_organic')->default(false);
        $table->boolean('is_fresh')->default(true);
        $table->decimal('rating', 3, 1)->default(4.5);
        $table->string('shop_name');
        $table->decimal('distance', 5, 2)->default(1.5);
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['is_organic', 'is_fresh', 'rating', 'shop_name', 'distance']);
    });
}
};

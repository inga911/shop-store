<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_title', 100);
            $table->string('product_description', 500);
            $table->string('product_how_to_use', 300);
            $table->string('product_warnings', 500);
            $table->string('product_ingredients', 600);
            $table->decimal('product_price', 6, 2)->unsigned();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('photo', 200)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

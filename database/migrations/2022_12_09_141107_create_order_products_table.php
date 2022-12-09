<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->float('price');
            $table->integer('quantity');
            $table->boolean('removed')->default(false);
            $table->foreignId('product_id')->nullable();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->integer('quantity')->default('0')->nullable();
            $table->decimal('price')->default('0.00');
            $table->decimal('special_price')->default('0.00')->nullable();
            $table->boolean('featured')->nullable();
            $table->string('affiliate_url')->nullable();
            $table->boolean('active')->default('1');
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
        Schema::dropIfExists('products');
    }
}

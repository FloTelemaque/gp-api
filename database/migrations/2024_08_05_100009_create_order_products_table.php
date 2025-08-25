<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Fichier : 2024_08_05_100009_create_order_products_table.php
// Nouvelle table pivot pour la relation Order-Product. Dépend de 'orders' et 'products'.
class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('name'); // Nom du produit au moment de la commande
            $table->float('quantity');
            $table->enum('unit', ['kg', 'liter', 'pack', 'unit', 'carton']);
            $table->enum('status', ['to_buy', 'partially_bought', 'bought', 'missing'])->default('to_buy');
            $table->text('comment')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('price_coefficient')->nullable();
            $table->enum('priority', ['normal', 'urgent'])->default('normal');
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
        Schema::dropIfExists('order_products');
    }
}

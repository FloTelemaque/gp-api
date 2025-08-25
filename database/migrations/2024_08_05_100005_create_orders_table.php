<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\OrderStatus;

// Fichier : 2024_08_05_100005_create_orders_table.php
// Dépend de la table 'yachts'.
class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('yacht_id')->constrained('yachts')->onDelete('cascade');
            $table->date('delivery_at')->nullable();
            $table->enum('status', OrderStatus::values())->default(OrderStatus::PENDING->value);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Fichier : 2024_08_05_100010_create_deliveries_table.php
// Dépend des tables 'orders' et 'users'.
class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('delivered_at')->nullable();
            $table->string('approx_time')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'delivered', 'returned', 'delayed'])->default('pending');
            $table->string('gps_position')->nullable();
            $table->text('return_comment')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}

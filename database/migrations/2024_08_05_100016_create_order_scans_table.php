<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Fichier : 2024_08_05_100016_create_order_scans_table.php
// Dépend de la table 'orders'.
class CreateOrderScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_scans', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('image_url');
            $table->text('analyzed_data')->nullable();
            $table->enum('analysis_status', ['pending', 'successful', 'failed'])->default('pending');
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
        Schema::dropIfExists('order_scans');
    }
}

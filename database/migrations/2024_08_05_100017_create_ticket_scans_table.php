<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Fichier : 2024_08_05_100017_create_ticket_scans_table.php
// Dépend de la table 'order_products'.
class CreateTicketScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_scans', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('order_product_id')->constrained('order_products')->onDelete('cascade'); // Clé étrangère mise à jour
            $table->string('image_url');
            $table->float('extracted_purchase_price')->nullable();
            $table->text('analyzed_data')->nullable();
            $table->timestamp('timestamp');
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
        Schema::dropIfExists('ticket_scans');
    }
}

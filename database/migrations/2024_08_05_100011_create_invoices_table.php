<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Fichier : 2024_08_05_100011_create_invoices_table.php
// Dépend de la table 'orders'.
class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->float('total_purchase')->nullable();
            $table->float('total_sale')->nullable();
            $table->float('global_coefficient')->nullable();
            $table->enum('status', ['draft', 'sent', 'paid'])->default('draft');
            $table->string('pdf_file_src')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}

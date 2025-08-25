<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\UserRole;

// Fichier : 2024_08_05_100002_create_users_table.php
// Dépend de la table 'companies'.
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->enum('role', UserRole::values())->default(UserRole::BACK_OFFICE->value);
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('first_name', 32)->nullable();
            $table->string('last_name', 32)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

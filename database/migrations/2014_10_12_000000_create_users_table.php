<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('created_date')->nullable();
            $table->string('created_month')->nullable();
            $table->string('created_year')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('image')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->tinyInteger('role')->nullable();
            $table->tinyInteger('publication_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('author_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('image')->nullable();
            $table->text('base_url')->nullable();
            $table->text('main_url')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->text('facebook_id')->nullable();
            $table->text('instagram_id')->nullable();
            $table->text('twitter_id')->nullable();
            $table->text('linkedin_id')->nullable();
            $table->integer('updated_admin_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

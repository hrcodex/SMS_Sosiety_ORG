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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->string('project_name')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('time')->nullable();
            $table->bigInteger('budget')->nullable();
            $table->text('donner')->nullable();
            $table->text('image')->nullable();
            $table->string('category')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->tinyInteger('publication_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

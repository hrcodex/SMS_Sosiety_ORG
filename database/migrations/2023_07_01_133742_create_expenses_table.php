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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('expense_id')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('expense_date')->nullable();
            $table->string('expense_month')->nullable();
            $table->string('expense_year')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('created_admin_id')->nullable();
            $table->integer('updated_admin_id')->nullable();
            $table->text('image')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};

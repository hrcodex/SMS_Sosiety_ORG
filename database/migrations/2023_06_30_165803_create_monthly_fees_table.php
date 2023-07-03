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
        Schema::create('monthly_fees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_uniq_id')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_month')->nullable();
            $table->string('payment_year')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('created_admin_id')->nullable();
            $table->integer('updated_admin_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_fees');
    }
};

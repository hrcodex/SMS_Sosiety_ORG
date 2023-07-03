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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('user_id')->nullable();
            $table->text('image')->nullable();
            $table->string('created_date')->nullable();
            $table->string('created_month')->nullable();
            $table->string('created_year')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('profession')->nullable();
            $table->bigInteger('national_identity')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('publication_status')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('created_admin_id')->nullable();
            $table->bigInteger('updated_admin_id')->nullable();
            $table->string('position')->nullable();
            $table->text('facebook_id')->nullable();
            $table->text('instagram_id')->nullable();
            $table->text('twitter_id')->nullable();
            $table->text('linkedin_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

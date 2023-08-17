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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('designation')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamp('date_joined')->nullable();
            $table->timestamp('date_of_birth')->nullable();
            $table->string('passport_number')->nullable();
            $table->timestamp('date_joined_organisation')->nullable();
            $table->text('area_of_expertise')->nullable();
            $table->text('area_of_training_of_trainer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

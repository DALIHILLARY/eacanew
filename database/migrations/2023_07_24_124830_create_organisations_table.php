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
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('email')->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('physical_address')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('country_id')->constrained('countries')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisations');
    }
};

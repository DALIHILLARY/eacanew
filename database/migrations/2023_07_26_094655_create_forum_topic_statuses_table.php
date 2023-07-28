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
        Schema::create('forum_topic_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // The status name
            $table->foreignId('forum_topic_id')->constrained('forum_topics');
            $table->foreignId('user_id')->constrained('users'); // The user who changed the status
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_topic_statuses');
    }
};

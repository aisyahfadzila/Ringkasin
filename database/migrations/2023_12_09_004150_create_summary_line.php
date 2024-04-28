<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('summary_topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('summary_id');
            $table->text('title');
            $table->text('content');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('summary_id')->references('id')->on('summaries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_topics');
    }
};

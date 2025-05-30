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
        Schema::create('call_responses', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->text('response');
            $table->foreignUuid('user_uuid')
            ->constrained()
            ->references('uuid')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignUuid('called_uuid')
            ->constrained()
            ->references('uuid')
            ->on('calleds')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_responses');
    }
};

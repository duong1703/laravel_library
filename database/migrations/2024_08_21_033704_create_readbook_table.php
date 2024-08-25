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
        Schema::create('readbook', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('book_id');
            $table->integer('read_count')->default(0);
            $table->timestamp('last_read_at');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('member')->cascadeOnDelete();
            $table->foreign('book_id')->references('id')->on('book')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readbook');
    }
};

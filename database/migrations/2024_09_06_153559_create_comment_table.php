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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('book_id');
            $table->string('name_login');
            $table->string('email')->unique();
            $table->text('comment');
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
        Schema::dropIfExists('comment');
    }
};

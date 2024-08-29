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
        Schema::create('resetpassword', function (Blueprint $table) {
            $table->unsignedBigInteger('tokenId_member');
            $table->string('token');
            $table->timestamps();

            $table->foreign('tokenId_member')->references('id')->on('member')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resetpassword');
    }
};

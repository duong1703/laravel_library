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
        Schema::create('member', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name_member');
            $table->string('name_login');
            $table->string('password');
            $table->string('Email')->unique();
            $table->string('role');
            $table->string('born');
            $table->string('numberphone');
            $table->string('ID_number_card');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};

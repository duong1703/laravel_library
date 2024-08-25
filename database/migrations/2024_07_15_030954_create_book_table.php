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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('book_images');
            $table->string('book_name');
            $table->string('book_author');
            $table->string('book_file');
            $table->string('book_publisher');
            $table->string('book_year_of_manufacture');
            $table->string('book_amount');
            $table->string('book_category');
            $table->string('book_status');
            $table->timestamps();

            $table->foreignId('subcategory_id')->constrained('subcategories')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};

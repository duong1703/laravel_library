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
        Schema::table('book', function (Blueprint $table) {
            DB::statement('
            ALTER TABLE `book` 
            ADD FULLTEXT INDEX `books_fulltext_index` (`book_category`, `book_author`, `book_name`);
        ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book', function (Blueprint $table) {
            DB::statement('
            ALTER TABLE `book` 
            DROP INDEX `books_fulltext_index`;
        ');
        });
    }
};

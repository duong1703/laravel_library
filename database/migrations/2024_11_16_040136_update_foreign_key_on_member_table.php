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
        Schema::table('member', function (Blueprint $table) {
            $table->dropForeign(['admin_id']); // Xóa ràng buộc khóa ngoại hiện tại
        });

        Schema::table('member', function (Blueprint $table) {
            $table->foreign('admin_id')
                  ->references('id')->on('admin')
                  ->onDelete('set null');  // Khi xóa admin, set admin_id của member thành NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};

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
        Schema::table('package_images', function (Blueprint $table) {
            $table->foreign(['package_id'], '[package_images|package_id][packages|id]')->references(['id'])->on('packages')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('package_images', function (Blueprint $table) {
            $table->dropForeign('[package_images|package_id][packages|id]');
        });
    }
};

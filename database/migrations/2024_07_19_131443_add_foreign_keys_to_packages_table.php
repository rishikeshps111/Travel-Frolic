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
        Schema::table('packages', function (Blueprint $table) {
            $table->foreign(['destination_id'], '[packages|destination_id][destination|id]')->references(['id'])->on('destination')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['duration_id'], '[packages|duration_id][duration|id]')->references(['id'])->on('duration')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeign('[packages|destination_id][destination|id]');
            $table->dropForeign('[packages|duration_id][duration|id]');
        });
    }
};

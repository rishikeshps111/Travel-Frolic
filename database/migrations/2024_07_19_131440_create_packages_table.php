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
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('package_name', 200);
            $table->unsignedBigInteger('destination_id')->index('[packages|destination_id][destination|id]');
            $table->unsignedBigInteger('duration_id')->index('[packages|duration_id][duration|id]');
            $table->text('description')->nullable();
            $table->double('price');
            $table->integer('rating')->default(5);
            $table->json('daywise_details')->nullable();
            $table->boolean('status')->default(true);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};

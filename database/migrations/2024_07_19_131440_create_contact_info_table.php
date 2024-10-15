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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name', 200);
            $table->string('address', 200);
            $table->string('phone_1', 20);
            $table->string('phone_2', 20)->nullable();
            $table->string('email_1', 200);
            $table->string('email_2', 200)->nullable();
            $table->string('location', 200)->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('update_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info');
    }
};

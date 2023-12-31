<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('city_code');
            $table->string('barangay_code');
            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->timestamps();

            $table
                ->foreign('barangay_code')
                ->references('code')
                ->on('barangays')
                ->onDelete('cascade');
            $table
                ->foreign('city_code')
                ->references('code')
                ->on('cities')
                ->onDelete('cascade');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};

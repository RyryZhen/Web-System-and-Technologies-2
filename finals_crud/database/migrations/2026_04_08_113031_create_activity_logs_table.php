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
    Schema::create('activity_logs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); // Who did it?
        $table->string('action');      // e.g., "Login", "Register", "Update Profile"
        $table->text('description');   // e.g., "Student 2024-001 updated their address."
        $table->string('ip_address');  // For security tracking
        $table->timestamps();          // When did it happen?
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};

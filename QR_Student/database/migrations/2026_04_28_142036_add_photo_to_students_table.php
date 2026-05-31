<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('students', function (Blueprint $table) {
        // Store the file path as a string
        $table->string('picture')->nullable()->after('name');
        // Add other missing fields if needed
        $table->string('phone')->nullable();
        $table->date('dob')->nullable();
        $table->string('gender')->nullable();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};

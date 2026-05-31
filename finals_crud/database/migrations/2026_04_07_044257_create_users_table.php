<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//   public function up()

// {

// Schema::create('users', function (Blueprint $table) {

// $table->id();

// $table->string('name');

// $table->string('email')->unique();

// $table->string('password');

// $table->timestamps();

// });

// }
public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('student_id')->unique(); // 1. Student ID
        $table->string('name');                 // 2. Full Name
        $table->string('email')->unique();      // 3. Email
        $table->string('password');             // 4. Password
        $table->string('course');               // 5. Course (BSIT, BSCS, etc.)
        $table->string('year_level');           // 6. 1st, 2nd, 3rd, 4th Year
        $table->string('gender');               // 7. Male/Female
        $table->date('birthdate');              // 8. Date of Birth
        $table->string('contact_no');           // 9. Phone Number
        $table->text('address');                // 10. Home Address
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

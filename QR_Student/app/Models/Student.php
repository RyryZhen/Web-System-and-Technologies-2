<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   // app/Models/Student.php

protected $fillable = [
    'student_id',
    'name',
    'email',    // Add this
    'course',   // Add this
    'phone',    // Add this
    'dob',      // Add this
    'gender',   // Add this
    'picture',  // Add this
];
}

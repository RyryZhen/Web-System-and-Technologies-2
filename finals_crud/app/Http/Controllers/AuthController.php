<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

class AuthController extends Controller

{

// Show login form

public function showLogin() {

return view('auth.login');

}

public function showRegister() {

return view('auth.register');

}
public function register(Request $request) {
  
    $request->validate([
        'student_id' => 'required|unique:users',
        'name'       => 'required',
        'email'      => 'required|email|unique:users',
        'password'   => 'required|min:6',
        'course'     => 'required',
        'year_level' => 'required',
        'birthdate'  => 'required|date',
        'gender'     => 'required',
        'contact_no' => 'required',
        'address'    => 'required',
    ]);

    $userId = DB::table('users')->insertGetId([
        'student_id' => $request->student_id,
        'name'       => $request->name,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
        'course'     => $request->course,
        'year_level' => $request->year_level,
        'birthdate'  => $request->birthdate,
        'gender'     => $request->gender,
        'contact_no' => $request->contact_no,
        'address'    => $request->address,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

  
    DB::table('activity_logs')->insert([
        'user_id'     => $userId,
        'action'      => 'Registration',
        'description' => "Student account created for {$request->name}",
        'ip_address'  => $request->ip(),
        'created_at'  => now(),
    ]);

    return redirect()->route('login')->with('success', 'Registration successful!');
}


public function login(Request $request) {

$request->validate([

'email' => 'required|email',

'password' => 'required',

]);

#

$user = DB::table('users')->where('email', $request->email)->first();

//Check if user exists and password matches

if ($user && Hash::check($request->password, $user->password)) {

//Manually store user info in Session (since we aren't using Auth Guard)

Session::put('user_id', $user->id);

Session::put('user_name', $user->name);
Session::put('user_email', $user->email);

return redirect()->route('dashboard');

}

return back()->withErrors(['email' => 'Invalid credentials.']);

}

// Handle Logout

public function logout() {

Session::flush(); // Clear all session data

return redirect()->route('login');

}


public function settings() {

// Fetch the latest user data from the DB

$user = DB::table('users')->where('id', Session::get('user_id'))->first();

return view('auth.settings', compact('user'));

}

public function updateSettings(Request $request) {

$request->validate([

'name' => 'required|string|max:255',

'email' => 'required|email|unique:users,email,' . Session::get('user_id'),

]);

DB::table('users')

->where('id', Session::get('user_id'))

->update([

'name' => $request->name,

'email' => $request->email,

'updated_at' => now()

]);

#

// Update the session name in case it changed

Session::put('user_name', $request->name);

return back()->with('success', 'Profile updated successfully!');

}

public function dashboard()

{

if (!Session::has('user_id')) {

return redirect()->route('login')->withErrors(['email' => 'Please login first.']);

}

$user = DB::table('users')->where('id', Session::get('user_id'))->first();

return view('dashboard', compact('user'));

}

}
<h1>Login</h1>

<form action="/s1" method="POST">
    @csrf
    Enter username: <input type="text" name="username" value="{{old('username')}}"><br><br>
    Enter password: <input type="password" name="password" value="{{old('password')}}"><br><br>
    Re-enter password: <input type="passsword" name="conPass" value="{{old('conPass')}}"><br><br>
    <button type="submit">Submit</button>
</form>


<form action="{{route('punta')}}">
    <button type="submit"> Submit</button>
</form>

Route::get('/dashboard', function () {
    return view('dashboard'); // make sure dashboard.blade.php exists
})->name('punta'); // this is the named route
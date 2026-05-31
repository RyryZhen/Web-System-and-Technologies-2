<h1>Problem 1</h1>

<form action="/p1" method="POST">
    @csrf
    Enter username: <input type="text" name="username" value="{{old('username')}}">
    Enter password: <input type="password" name="password" value="{{old('password')}}">
    Re-enter password: <input type="passsword" name="conPass" value="{{old('conPass')}}">
    <button type="submit">Submit</button>
</form>
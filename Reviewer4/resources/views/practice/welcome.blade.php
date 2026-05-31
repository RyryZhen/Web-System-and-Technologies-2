<h1>Welcome to Laravel</h1>
<form action="/display" method="POST">
@csrf
Enter your name: <input type="text" name="name">
<button type="submit">Submit</button>
</form>



{{$id ?? ''}}
{{$name ?? ''}}
{{$address ?? ''}}













@php

$age =20;
$role = 'admin';
$fruits = ['banana', 'apple'];
$count = 5;
$colors = ['red', 'blue'];

@endphp


//@if ($age >= 18)
    <p>Adult</p>
@else
    <p>Minor</p>
@endif

@unless ($age >= 18)
    <p>Minor</p>
@endunless

@isset($name)
    <p>Name: {{ $name }}</p>
@endisset

@empty($colors)
    <p>No colors</p>
@endempty

@switch($role)
    @case('admin')
        <p>Admin</p>
    @break
    @case('user')
        <p>User</p>
    @break
    @default
        <p>Guest</p>
@endswitch


//locale_compose
@foreach($fruits as $fruit)
    <p>{{ $loop->iteration }}: {{ $fruit }}</p>
@endforeach

@for($i = 1; $i <= 5; $i++)
    <p>Iteration {{ $i }}</p>
@endfor

@while($count <= 3)
    <p>Count {{ $count }}</p>
    @php $count++; @endphp
@endwhile

@forelse($colors as $color)
    <p>{{ $color }}</p>
@empty
    <p>No colors available</p>
@endforelse





<a href="">Problem 1</a>
<a href="">Problem 2</a>
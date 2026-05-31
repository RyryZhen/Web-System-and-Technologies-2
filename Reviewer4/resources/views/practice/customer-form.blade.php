<h1>Customer Form</h1>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('/customer-form') }}" method="POST">
    @csrf
    <label>Customer ID:</label> <input type="text" name="id" value="{{ old('id') }}"><br>
    <label>Name:</label> <input type="text" name="name" value="{{ old('name') }}"><br>
    <label>Address:</label> <input type="text" name="address" value="{{ old('address') }}"><br>
    <button type="submit">Submit</button>
</form>
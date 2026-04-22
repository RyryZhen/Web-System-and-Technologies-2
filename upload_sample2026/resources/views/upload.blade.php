<!DOCTYPE html>

<html>

<head>

<title>Laravel Image Upload (Single + Multiple)</title>

</head>

<body>

<h1>Single Image Upload</h1>

<form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">

@csrf

<input type="file" name="image" required>

<button type="submit">Upload</button>

</form>

<h1>Multiple Images Upload</h1>

<form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">

#

Create the Upload Blade View

@csrf

<input type="file" name="images[]" multiple required>

<button type="submit">Upload</button>


</form>

<ul>
    @foreach ($photos as $photo)
    <li>
        {{ $photo->image }}
        <a href="{{ route('photos.edit', $photo->id) }}">Edit</a>
        
        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>

@if(session('success'))

<p style="color: green;">{{ session('success') }}</p>

@endif

</body>

</html>
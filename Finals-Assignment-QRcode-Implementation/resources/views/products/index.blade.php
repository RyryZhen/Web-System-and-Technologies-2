@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Product List</h2>
        <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
    </div>
</div>
<table class="table table-bordered mt-2">
    <tr>
        <th>QR</th>
        <th>Name</th>
        <th>Price</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{!! $product->qr !!}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
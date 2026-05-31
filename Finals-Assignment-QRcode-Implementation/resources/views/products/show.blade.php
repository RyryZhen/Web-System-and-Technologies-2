@extends('layouts.app')
@section('content')
<div class="row text-center">
    <div class="col-lg-12">
        <h2> Show Product</h2>
    </div>
    <div class="col-lg-12">
        {!! $qr !!}
    </div>
    <div class="col-lg-12 mt-3">
        <strong>Name:</strong> {{ $product->name }}<br>
        <strong>Price:</strong> {{ $product->price }}
    </div>
    <div class="col-lg-12 mt-3">
        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
    </div>
</div>
@endsection
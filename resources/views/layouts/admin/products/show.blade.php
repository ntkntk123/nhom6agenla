@extends('layouts.admin.main')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
    <h1>{{ $product->name }}</h1>
    <p>Giá: {{ number_format($product->price, 0, ',', '.') }} VND</p>
    <!-- <p>Lượt xem: {{ $product->view }}</p> -->
    <p>Mô tả: {{ $product->description }}</p>
    <p>Ngày tạo: {{ $product->created_at }}</p>
    <p>Ngày sửa gần nhất: {{ $product->updated_at }}</p>


    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" width="150">
    @endif
    <br>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
@endsection

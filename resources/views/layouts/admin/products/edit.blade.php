@extends('layouts.admin.main')

@section('title', 'Sửa sản phẩm')

@section('content')
    <h1>Sửa sản phẩm</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Ảnh</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" width="150">
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="{{ $product->category_id }}" selected>{{ $product->category->name }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Cập nhật sản phẩm</button>
    </form>
@endsection

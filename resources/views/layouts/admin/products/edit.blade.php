@extends('layouts.admin.main')

@section('title', 'Sửa sản phẩm')

@section('content')
    <h1>Sửa sản phẩm</h1>

    {{-- Hiển thị thông báo thành công nếu có --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Tên sản phẩm --}}
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ old('name', $product->name) }}" >
            @error('name')
                <small class="text-danger">Tên không hợp lệ hoặc đang để trống.</small>
            @enderror
        </div>

        {{-- Giá --}}
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" name="price" id="price" class="form-control"
                value="{{ old('price', $product->price) }}">
            @error('price')
                <small class="text-danger">Giá không hợp lệ. Vui lòng nhập số và không âm.</small>
            @enderror
        </div>

        {{-- Mô tả --}}
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <small class="text-danger">Mô tả không hợp lệ.</small>
            @enderror
        </div>

        {{-- Ảnh --}}
        <div class="form-group">
            <label for="image">Ảnh</label><br>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mb-2" width="150">
            @endif
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <small class="text-danger">Ảnh không hợp lệ hoặc kích thước quá lớn (tối đa 2MB).</small>
            @enderror
        </div>

        {{-- Danh mục --}}
        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">Vui lòng chọn một danh mục hợp lệ.</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning mt-3">Cập nhật sản phẩm</button>
    </form>
@endsection

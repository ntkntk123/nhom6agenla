@extends('layouts.admin.main')

@section('title', 'Thêm sản phẩm')

@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Chọn danh mục</option>
                <!-- Giả sử có danh sách các danh mục -->
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Thêm sản phẩm</button>
    </form>
@endsection

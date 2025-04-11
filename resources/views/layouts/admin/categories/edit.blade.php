@extends('layouts.admin.main')

@section('title', 'Sửa danh mục')

@section('content')
    <h1>Sửa danh mục</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $category->name) }}" required>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Cập nhật danh mục</button>
    </form>
@endsection

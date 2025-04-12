@extends('layouts.admin.main')

@section('title', 'Chi tiết danh mục')

@section('content')
<div>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
    <h1>{{ $category->name }}</h1>

    <p>ID: {{ $category->id }}</p>
    <p>Ngày tạo: {{ $category->created_at }}</p>
    <p>Ngày chỉnh sửa gần nhất: {{ $category->updated_at }}</p>



    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
@endsection

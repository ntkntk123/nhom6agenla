@extends('layouts.admin.main')

@section('title', 'Chi tiết danh mục')

@section('content')
    <h1>{{ $category->name }}</h1>

    <p>ID: {{ $category->id }}</p>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
@endsection

@extends('layouts.admin.main')

@section('title', 'Chi tiết người dùng')

@section('content')
    <h1>{{ $user->name }}</h1>
    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>SĐT:</strong> {{ $user->phone }}</p>
    <p><strong>Vai trò:</strong> {{ $user->role_id }}</p>

    @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" class="img-fluid" width="150">
    @else
        <p><i>Không có avatar</i></p>
    @endif

    <br>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary mt-3">Chỉnh sửa</a>



@endsection

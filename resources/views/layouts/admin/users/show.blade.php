@extends('layouts.admin.main')

@section('title', 'Chi tiết người dùng')

@section('content')
<div>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
    <h1>{{ $user->name }}</h1>
    <!-- <p><strong>Username:</strong> {{ $user->username }}</p> -->
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>SĐT:</strong> {{ $user->phone }}</p>
    <p><strong>Vai trò:</strong>
    @if ($user->role_id == 1)
        Admin
    @elseif ($user->role_id == 2)
        Người dùng
    @else
        Không xác định
    @endif
</p>

<p><strong>Ngày tạo:</strong> {{ $user->created_at }}</p>
<p><strong>Ngày sửa:</strong> {{ $user->updated_at }}</p>



    @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" class="img-fluid" width="150">
    @else
        <p><i>Không có avatar</i></p>
    @endif

    <br>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary mt-3">Chỉnh sửa</a>



@endsection

@extends('layouts.admin.main')

@section('title', 'Sửa thông tin người dùng')

@section('content')
    <h1>Sửa thông tin người dùng</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Họ tên</label>
            <input type="text" name="name" disabled id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <!-- <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
        </div> -->

        <div class="form-group">
            <label for="role_id">Quyền</label>
            <select name="role_id" id="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Ảnh đại diện</label><br>
            @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" width="150" class="img-fluid">
            @else
                <p><em>Không có ảnh</em></p>
            @endif
        </div>

        <button type="submit" class="btn btn-warning mt-3">Cập nhật người dùng</button>
    </form>
@endsection

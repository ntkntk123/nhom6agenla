@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 450px; background-color: #fff3f8;">
        <h3 class="text-center text-danger mb-4">Đăng ký</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-danger w-100">Đăng ký</button>
            <div class="mt-3 text-center">
                <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
            </div>
        </form>
    </div>
</div>
@endsection

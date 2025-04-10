@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 400px; background-color: #f0f9ff;">
        <h3 class="text-center text-primary mb-4">Đăng nhập</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            <div class="mt-3 text-center">
                <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
            </div>
        </form>
    </div>
</div>
@endsection

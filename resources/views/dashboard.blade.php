<h2>Chào {{ Auth::user()->name }}!</h2>
<p>Vai trò: {{ Auth::user()->role_id == 1 ? 'Admin' : 'Khách hàng' }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Đăng xuất</button>
</form>

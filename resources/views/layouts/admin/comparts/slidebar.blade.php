<div class="main-wrapper">
        {{-- Sidebar --}}
        <div class="sidebar" style="padding: 10px;">
    <h5>Menu</h5>
    <ul class="nav flex-column">
        <li class="nav-item" style="border: 1px solid #ccc; border-radius: 6px; margin-bottom: 8px; padding: 6px;">
            <a href="{{ route('products.index') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item" style="border: 1px solid #ccc; border-radius: 6px; margin-bottom: 8px; padding: 6px;">
            <a href="{{ route('products.index') }}" class="nav-link">Quản lí sản phẩm</a>
        </li>
        <li class="nav-item" style="border: 1px solid #ccc; border-radius: 6px; margin-bottom: 8px; padding: 6px;">
            <a href="#" class="nav-link">Quản lí danh mục</a>
        </li>
        <li class="nav-item" style="border: 1px solid #ccc; border-radius: 6px; margin-bottom: 8px; padding: 6px;">
            <a href="#" class="nav-link">Thống kê</a>
        </li>
        <li class="nav-item" style="border: 1px solid #ccc; border-radius: 6px; margin-bottom: 8px; padding: 6px;">
            <a href="{{ route('products.trashed') }}" class="nav-link">Khôi phục</a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link text-danger btn btn-link w-100 text-start" style="text-decoration: none;" onclick="return confirm('Bạn chắc chắn muốn đăng xuất?')">
                    Đăng xuất
                </button>
            </form>
        </li>

        {{-- Add thêm menu ở đây --}}
    </ul>
</div>



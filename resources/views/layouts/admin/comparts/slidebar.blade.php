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
        {{-- Add thêm menu ở đây --}}
    </ul>
</div>



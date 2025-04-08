@extends('layouts.admin.main')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>

    <!-- Bảng danh sách sản phẩm -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Lượt xem</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->id }}</td>

                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                    <td>{{ $product->view }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" width="100">
                        @else
                            <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    {{ $products->links() }}
@endsection

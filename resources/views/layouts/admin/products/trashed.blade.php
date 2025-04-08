@extends('layouts.admin.main')

@section('title', 'Danh sách sản phẩm bị xóa mềm')

@section('content')
    <h1 class="mb-4">Danh sách sản phẩm bị xóa mềm</h1>

    <!-- Bảng danh sách sản phẩm -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
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
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" width="100" alt="Product Image">
                            @else
                                <span class="text-muted">Không có ảnh</span>
                            @endif
                        </td>
                        <td>
                            <!-- Khôi phục sản phẩm -->
                            <a href="{{ route('products.restore', $product->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-arrow-repeat"></i> Khôi phục
                            </a>

                            <!-- Xóa vĩnh viễn sản phẩm -->
                            <form action="{{ route('products.forceDelete', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn sản phẩm này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa vĩnh viễn
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection

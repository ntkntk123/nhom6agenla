@extends('layouts.admin.main')

@section('title', 'Danh sách danh mục')

@section('content')
    <h1>Danh sách danh mục</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Thêm danh mục</a>

    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>

                    <td>
                    <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-success btn-sm">Xem</a>

                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection

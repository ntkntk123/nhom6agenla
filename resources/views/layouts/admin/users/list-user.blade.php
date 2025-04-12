@extends('layouts.admin.main')

@section('title', 'Danh sách người dùng')

@section('content')
    <h1>Danh sách người dùng</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Vai trò</th>
                <th>Avatar</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>

                    {{-- Hiển thị tên vai trò --}}
                    <td>
                        @if ($user->role_id == 1)
                            Admin
                        @else
                            Người dùng
                        @endif
                    </td>

                    <td>
                        @if ($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" width="80" class="img-thumbnail">
                        @else
                            <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>


                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
</form>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getAllUser()
    {
        $users = User::paginate(10);
        // Nếu chỉ muốn user chưa bị xóa thì bỏ withTrashed()
        return view('layouts.admin.users.list-user', compact('users'));
    }
    public function index()
    {
        $users = User::paginate(10);
        // Nếu chỉ muốn user chưa bị xóa thì bỏ withTrashed()
        return view('layouts.admin.users.list-user', compact('users'));
    }

    // Xem chi tiết user
    public function show($id)
    {
        $user = User::findOrFail($id); // ❌ không lấy user đã bị soft delete
        return view('layouts.admin.users.show', compact('user'));
    }

    // Form chỉnh sửa user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Lấy danh sách roles
        return view('layouts.admin.users.edit', compact('user', 'roles'));
    }


    // Cập nhật thông tin user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:10',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data = $request->only(['username', 'name', 'phone', 'role_id']);

        $user->update($data);
        // dd($data);

        return redirect()->route('admin.users.show', $user->id)
            ->with('success', 'Cập nhật người dùng thành công.');
    }



   // Xóa mềm user và avatar nếu có
public function destroy($id)
{
    $user = User::findOrFail($id);

    // Kiểm tra và xóa avatar nếu tồn tại
    if (!empty($user->avatar) && Storage::disk('public')->exists($user->avatar)) {
        Storage::disk('public')->delete($user->avatar);
    }

    // Thực hiện soft delete
    $user->delete();

    return redirect()->route('admin.users.index')
        ->with('success', 'Người dùng đã được xóa tạm thời.');
}

    // Khôi phục user đã xóa
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.users.index')->with('success', 'User restored successfully.');
    }

    // Xóa vĩnh viễn
    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        // Xóa ảnh nếu còn
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->forceDelete();

        return redirect()->route('admin.users.index')->with('success', 'User permanently deleted.');
    }
}

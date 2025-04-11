<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // Hiển thị danh sách categories
    public function index()
    {
        $categories = Category::paginate(10); // hoặc số nào bạn muốn

        return view('layouts.admin.categories.index', compact('categories'));
    }

    // Hiển thị form tạo mới
    public function create()
    {
        return view('layouts.admin.categories.create');
    }

    // Lưu category mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($request->only('name'));
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('layouts.admin.categories.edit', compact('category'));
    }

    // Cập nhật category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('name'));

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật thành công');
    }

    // Xóa mềm category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Xóa thành công');
    }
}



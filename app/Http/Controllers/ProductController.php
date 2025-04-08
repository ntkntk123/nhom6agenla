<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('layouts.admin.products.list-product', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('layouts.admin.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm!');
    }



// public function store(Request $request)
// {
//     // Validate dữ liệu từ request
//     $validated = $request->validate([
//         'name'        => 'required|string|max:255',
//         'price'       => 'required|numeric|min:0',
//         'description' => 'nullable|string',
//         'image'       => 'nullable|image|max:2048',
//         'category_id' => 'required|exists:categories,id',
//     ]);

//     // Kiểm tra nếu có file ảnh và lưu vào thư mục images trong storage
//     if ($request->hasFile('image')) {
//         // Đảm bảo thư mục images tồn tại
//         $path = storage_path('app/public/images');
//         if (!file_exists($path)) {
//             // Nếu thư mục chưa có, tạo nó
//             mkdir($path, 0777, true);
//         }

//         // Lưu ảnh vào thư mục images và trả về đường dẫn
//         $validated['image'] = $request->file('image')->store('images', 'public');
//     }

//     // Tạo sản phẩm mới với dữ liệu đã xác thực
//     Product::create($validated);

//     // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
//     return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm!');
// }
    public function show(Product $product)
    {
        $categories = Category::all();

        $product->increment('view');
        return view('layouts.admin.products.show', compact('product', 'categories'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('layouts.admin.products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Xác thực dữ liệu nhập vào
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Kiểm tra xem có file ảnh mới được tải lên không
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ trong storage
            Storage::disk('public')->delete($product->image);

            // Lưu ảnh mới vào thư mục 'products'
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Cập nhật sản phẩm với dữ liệu đã xác thực
        $product->update($validated);

        // Chuyển hướng đến trang chi tiết sản phẩm sau khi cập nhật thành công
        return redirect()->route('products.show', $product->id)->with('success', 'Sản phẩm đã được cập nhật!');
    }



    public function destroy(Product $product)
    {
        // Xóa ảnh nếu tồn tại
        if ($product->image && \Storage::disk('public')->exists($product->image)) {
            \Storage::disk('public')->delete($product->image);
        }

        // Soft delete sản phẩm
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã bị xóa tạm thời và ảnh đã được xóa!');
    }

    public function trashed()
    {
        // Lấy tất cả sản phẩm bị xóa mềm (soft deleted)
        $products = Product::onlyTrashed()->paginate(10);

        // Trả về view với dữ liệu các sản phẩm bị xóa mềm
        return view('layouts.admin.products.trashed', compact('products'));
    }
    public function restore($id)
    {
        // Tìm sản phẩm đã bị xóa tạm thời
        $product = Product::onlyTrashed()->findOrFail($id);

        // Khôi phục sản phẩm bị xóa tạm thời
        $product->restore();

        // Quay lại trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được khôi phục!');
    }


    public function forceDelete($id)
    {
        // Tìm sản phẩm đã bị xóa tạm thời
        $product = Product::onlyTrashed()->findOrFail($id);

        // Kiểm tra nếu có ảnh thì xóa file ảnh trong storage
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Xóa sản phẩm vĩnh viễn
        $product->forceDelete();

        // Quay lại trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã bị xóa vĩnh viễn!');
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $data['image'] = 'uploads/products/' . $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.form', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $data['image'] = 'uploads/products/' . $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

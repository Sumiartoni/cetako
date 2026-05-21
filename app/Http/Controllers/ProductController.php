<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::active()->latest()->get();
        return view('produk.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->active()->firstOrFail();
        $relatedProducts = Product::active()->where('id', '!=', $product->id)->latest()->take(3)->get();
        return view('produk.show', compact('product', 'relatedProducts'));
    }
}

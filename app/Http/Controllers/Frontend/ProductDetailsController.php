<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::get();

        return view('frontend.productdetails', compact('products'));
    }

    public function show($title)
    {
        $product = Product::where('title', $title)->first(); // Cari produk berdasarkan title

        if (!$product) {
            abort(404, 'Product not found'); // Jika produk tidak ditemukan
        }

        return view('frontend.productdetails', compact('product')); // Pastikan view-nya benar
    }
}

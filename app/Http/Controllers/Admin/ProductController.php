<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all(); 

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        if($request->validated()){
            $banner = $request->file('banner')->store('asset/product', 'public');
            $slug = Str::slug($request->title, '-');
            Product::create($request->except('banner') + ['banner' => $banner, 'slug' => $slug]);
        }

        return redirect()->route('products.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function filterByCategory($categoryId)
    {
        // Ambil data produk berdasarkan kategori
        $products = Product::where('category_id', $categoryId)->get();

        // Ambil semua kategori untuk sidebar
        $categories = Category::all();

        // Kirim data ke view
        return view('frontend.shop', compact('products', 'categories'));
    }


    public function edit(Product $product): View
    {
        $categories = Category::all();
        
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        if($request->validated()){
            $slug = Str::slug($request->title, '-');
            if($request->banner){
                File::delete('storage/' . $product->banner);
                $banner = $request->file('banner')->store('asset/product', 'public');
                $product->update($request->except('banner') + ['banner' => $banner, 'slug' => $slug]);
            }else{
                $product->update($request->validated() + ['slug' => $slug]);
            } 
        }

        return redirect()->route('products.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Product $product): RedirectResponse
    {
        File::delete('storage/' . $product->banner);
        $product->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
   
    public function index(): View
    {
        $categorys = Category::get();

        return view('categorys.index', compact('categorys'));
    }

    public function create(): View
    {
        return view('categorys.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $slug = Str::slug($request->name, '-');
        Category::create($request->validated() + ['slug' => $slug]);

        return redirect()->route('categorys.index')->with([
            'message' => 'successfully created !',
            'alert-type' =>     'success'
        ]);
    }
    

    public function edit(Category $category): View
    {
        return view('categorys.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $slug = Str::slug($request->name, '-');
        $category->update($request->validated() + ['slug' => $slug]);

        return redirect()->route('categorys.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Category $category): RedirectResponse
    {
        File::delete('storage/' . $category->name);
        $category->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}

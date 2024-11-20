<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CatBlogRequest;
use App\Models\CatBlog;
use App\Models\PostBlog;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class CatBlogController extends Controller
{
    public function index(): View
    {
        $catblogs = CatBlog::get();

        return view('catblogs.index', compact('catblogs'));
    }

    public function create(): View
    {
        return view('catblogs.create');
    }

    public function store(CatBlogRequest $request): RedirectResponse
    {
        $slug = Str::slug($request->name, '-');
        CatBlog::create($request->validated() + ['slug' => $slug]);

        return redirect()->route('catblogs.index')->with([
            'message' => 'successfully created !',
            'alert-type' =>     'success'
        ]);
    }

    public function edit(CatBlog $catblog): View
    {
        return view('catblogs.edit', compact('catblog'));
    }

    public function update(CatBlogRequest $request, CatBlog $catblog): RedirectResponse
    {
        $slug = Str::slug($request->name, '-');
        $catblog->update($request->validated() + ['slug' => $slug]);

        return redirect()->route('catblogs.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(CatBlog $catblog): RedirectResponse
    {
        File::delete('storage/' . $catblog->name);
        $catblog->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}

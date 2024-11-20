<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostBlogRequest;
use App\Models\CatBlog;
use Illuminate\Support\Str;
use App\Models\PostBlog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostBlogController extends Controller
{
    public function index(): View
    {
        $postblogs = Postblog::with('catblog')->get();

        return view('postblogs.index', compact('postblogs'));
    }

    public function create(): View
    {
        $catblogs = CatBlog::all(); 

        return view('postblogs.create', compact('catblogs'));
    }

    public function store(PostBlogRequest $request): RedirectResponse
    {
        if($request->validated()){
            $thumbnail = $request->file('thumbnail')->store('asset/postblog', 'public');
            $slug = Str::slug($request->title, '-');
            PostBlog::create($request->except('thumbnail') + ['thumbnail' => $thumbnail, 'slug' => $slug]);
        }

        return redirect()->route('postblogs.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(PostBlog $postblog): View
    {
        $catblogs = CatBlog::all();
        
        return view('postblogs.edit', compact('postblog', 'catblogs'));
    }

    public function update(PostBlogRequest $request, PostBlog $postblog): RedirectResponse
    {
        if($request->validated()){
            $slug = Str::slug($request->title, '-');
            if($request->thumbnail){
                File::delete('storage/' . $postblog->thumbnail);
                $thumbnail = $request->file('thumbnail')->store('asset/postblog', 'public');
                $postblog->update($request->except('thumbnail') + ['thumbnail' => $thumbnail, 'slug' => $slug]);
            }else{
                $postblog->update($request->validated() + ['slug' => $slug]);
            } 
        }

        return redirect()->route('postblogs.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(PostBlog $postblog): RedirectResponse
    {
        File::delete('storage/' . $postblog->thumbnail);
        $postblog->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}

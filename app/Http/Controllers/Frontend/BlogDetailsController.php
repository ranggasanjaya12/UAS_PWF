<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PostBlog;
use Illuminate\Http\Request;

class BlogDetailsController extends Controller
{
    public function index()
    {
        $recentPosts = PostBlog::latest()->take(4)->get();
        return view('frontend.blogdetails', compact('recentPost'));
    }

    public function show($title)
    {
        $postblog = PostBlog::where('title', $title)->first();

        if (!$postblog) {
            abort(404, 'Blog not found');
        }

        $recentPosts = PostBlog::latest()->take(4)->get();

        return view('frontend.blogdetails', compact('postblog', 'recentPosts'));
    }


}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CatBlog;
use App\Models\PostBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $postblogs = PostBlog::get();
        $catblogs = CatBlog::get();
        $postblogs = PostBlog::paginate(3);
        $recentPosts = PostBlog::latest()->take(4)->get();

        return view('frontend.blog', compact('postblogs', 'recentPosts'));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'comment' => 'required|string',
        ]);

        $filePath = storage_path('app/comments.json');

        // Ambil data komentar yang sudah ada
        $comments = [];
        if (file_exists($filePath)) {
            $comments = json_decode(file_get_contents($filePath), true) ?? [];
        }

        // Tambahkan komentar baru
        $comments[] = [
            'name'    => $request->name,
            'email'   => $request->email,
            'comment' => $request->comment,
            'date'    => now()->format('F d, Y h:i A'),
        ];

        // Simpan kembali ke file JSON
        file_put_contents($filePath, json_encode($comments));

        return redirect()->back()->with('message', 'Comment added successfully!');
    }

    public function countComments()
    {
        $filePath = storage_path('app/comments.json');

        // Ambil data komentar dari file JSON
        $comments = [];
        if (file_exists($filePath)) {
            $comments = json_decode(file_get_contents($filePath), true) ?? [];
        }

        // Hitung jumlah komentar
        $commentCount = count($comments);

        // Return data dalam format JSON
        return response()->json([
            'count' => $commentCount,
        ]);
    }

}

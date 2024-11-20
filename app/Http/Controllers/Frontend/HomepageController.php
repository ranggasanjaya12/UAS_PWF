<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\PostBlog;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $offers = Offer::get();
        $products = Product::latest()->take(4)->get();
        $postblogs = PostBlog::latest()->take(3)->get();

        return view('frontend.homepage', compact('sliders', 'offers', 'products', 'postblogs'));
    }
}

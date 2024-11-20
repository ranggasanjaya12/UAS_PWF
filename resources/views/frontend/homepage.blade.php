@extends('frontend.layout')

@section('content')
    <!--================Home Banner Area =================-->
    @foreach ($sliders as $slider)
        <section class="home_banner_area mb-40"
            style="background: url('{{ Storage::url($slider->banner) }}') no-repeat center">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content row">
                        <div class="col-lg-12">
                            <p class="sub text-uppercase">Selamat Datang</p>
                            <h3><span>Pusat</span> Oleh <br />Oleh <span>Etam</span></h3>
                            <h4><span>Jelajahi kekayaan budaya</span>dan cita rasa Kalimantan Timur <br />melalui berbagai oleh-oleh <span>khas Samarinda</span></h4>
                            <h4></h4>
                            <a class="main_btn mt-40" href="{{ url('shop') }}">View Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!--================End Home Banner Area =================-->

    <!-- Start feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-money"></i>
                            <h3>Kualitas Terbaik</h3>
                        </a>
                        <p style="text-align: centre;">Hanya produk pilihan yang kami tampilkan, memastikan kualitas
                            oleh-oleh khas yang memuaskan.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Lokasi Toko</h3>
                        </a>
                        <p style="text-align: centre;">Temukan lokasi toko terdekat untuk oleh-oleh pilihan Anda dengan
                            mudah.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Dukungan</h3>
                        </a>
                        <p style="text-align: centre;">Kami siap membantu memberikan info lebih lanjut tentang produk yang
                            tersedia.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Aman dan Nyaman</h3>
                        </a>
                        <p style="text-align: centre;">Informasi produk terverifikasi untuk kenyamanan Anda dalam
                            merencanakan pembelian.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature Area -->

    <!--================ Offer Area =================-->
    @foreach ($offers as $offer)
        <section class="offer_area" style="background: url('{{ Storage::url($offer->banner) }}') no-repeat center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="offset-lg-4 col-lg-6 text-center">
                        <div class="offer_content">
                            <h3 class="text-uppercase mb-40">Koleksi Khas Samarinda</h3>
                            <h2 class="text-uppercase">Oleh-Oleh Autentik</h2>
                            <a href="{{ url('/shop') }}" class="main_btn mb-20 mt-5">Discover Now</a>
                            <p>Temukan rasa dan cerita dari setiap produk khas daerah ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!--================ End Offer Area =================-->

    <!--================ New Product Area =================-->
    <section class="inspired_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>New products</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="{{ Storage::url($product->banner) }}"
                                    alt="{{ $product->title }}" />
                                <div class="p_icon">
                                    <a href="{{ route('productdetails.show', ['title' => $product->title]) }}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-heart"></i>
                                    </a>
                                    {{-- <a href="#">
                                <i class="ti-shopping-cart"></i>
                            </a> --}}
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="{{ route('productdetails.show', $product->id) }}" class="d-block">
                                    <h4>{{ $product->title }}</h4>
                                </a>
                                <div class="mt-3">
                                    <span class="mr-4">{{ $product->location }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End New Product Area =================-->

    <!--================ Start Blog Area =================-->
    <section class="blog-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Latest Blog</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($postblogs as $postblog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ Storage::url($postblog->thumbnail) }}"
                                    alt="{{ $postblog->title }}">
                            </div>
                            <div class="short_details">
                                <div class="meta-top d-flex">
                                    <a href="#">By Admin</a>
                                    <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                                </div>
                                <a class="d-block">
                                    <h4>{{ $postblog->title }}</h4>
                                </a>
                                <div class="text-wrap">
                                    <p>{{ $postblog->exceprt }}</p>
                                </div>
                                <a href="{{ route('blogdetails.show', ['title' => $postblog->title]) }}"
                                    class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Blog Area =================-->
@endsection

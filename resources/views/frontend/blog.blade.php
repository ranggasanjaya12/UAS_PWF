@extends('frontend.layout')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Blog</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/blog') }}">Blog </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($postblogs as $postblog)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ Storage::url($postblog->thumbnail) }}"
                                    alt="">
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block"
                                    href="{{ route('blogdetails.show', ['title' => $postblog->title]) }}">
                                    <h2>{{ $postblog->title }}</h2>
                                </a>
                                <p>{{ $postblog->exceprt }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="ti-user"></i>{{ $postblog->catblog->name }}</a></li>
                                    <li><a><i class="ti-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item {{ $postblogs->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="{{ $postblogs->previousPageUrl() }}" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="ti-arrow-left"></span>
                                        </span>
                                    </a>
                                </li>

                                @foreach ($postblogs->getUrlRange(1, $postblogs->lastPage()) as $page => $url)
                                    <li class="page-item {{ $postblogs->currentPage() == $page ? 'active' : '' }}">
                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <li class="page-item {{ $postblogs->hasMorePages() ? '' : 'disabled' }}">
                                    <a href="{{ $postblogs->nextPageUrl() }}" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="ti-arrow-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search Keyword">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="main_btn rounded-0 w-100" type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li><a href="#" class="d-flex">
                                        <p>Restaurant food</p>
                                        <p>(37)</p>
                                    </a></li>
                                <li><a href="#" class="d-flex">
                                        <p>Travel news</p>
                                        <p>(10)</p>
                                    </a></li>
                                <li><a href="#" class="d-flex">
                                        <p>Modern technology</p>
                                        <p>(03)</p>
                                    </a></li>
                                <li><a href="#" class="d-flex">
                                        <p>Product</p>
                                        <p>(11)</p>
                                    </a></li>
                                <li><a href="#" class="d-flex">
                                        <p>Inspiration</p>
                                        <p>21</p>
                                    </a></li>
                                <li><a href="#" class="d-flex">
                                        <p>Health Care</p>
                                        <p>09</p>
                                    </a></li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($recentPosts as $post)
                                <div class="media post_item">
                                    <img src="{{ Storage::url($post->thumbnail) }}" width="80" alt="post">
                                    <div class="media-body">
                                        <a href="{{ route('blogdetails.show', ['title' => $post->title]) }}">
                                            <h3>{{ $post->title }}</h3>
                                        </a>
                                        <p>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection

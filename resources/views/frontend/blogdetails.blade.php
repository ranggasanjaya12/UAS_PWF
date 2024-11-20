@extends('frontend.layout')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Blog Details</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="blog.html">Blog </a>
                        <a href="single-blog.html">Blog Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ Storage::url($postblog->thumbnail) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $postblog->title }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a><i class="ti-user"></i>{{ $postblog->catblog->name }}</a></li>
                                <li><a><i class="ti-comments"></i> 03 Comments</a></li>
                            </ul>
                            <p class="excert">
                                {{ $postblog->description }}
                            </p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle"><i class="ti-heart"></i></span>4
                                people like this</p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <p class="comment-count"><span class="align-middle"><i class="ti-comment"></i></span> 06
                                    Comments</p>
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                <li><a href="#"><i class="ti-dribbble"></i></a></li>
                                <li><a href="#"><i class="ti-wordpress"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="comments-area">
                        @php
                        $commentsFile = storage_path('app/comments.json');
                        $comments = [];
                        if (file_exists($commentsFile)) {
                            $comments = json_decode(file_get_contents($commentsFile), true) ?? [];
                        }

                        $commentCount = count($comments);
                        @endphp
                        <h4>{{ $commentCount }} Comments</h4>
                        @php
                            $commentsFile = storage_path('app/comments.json');
                            $comments = [];
                            if (file_exists($commentsFile)) {
                                $comments = json_decode(file_get_contents($commentsFile), true) ?? [];
                            }
                        @endphp

                        <div class="comment-list">
                            @foreach ($comments as $comment)
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('user_assets/img/blog/user.jpg') }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">{{ $comment['comment'] }}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5><a href="#">{{ $comment['name'] }}</a></h5>
                                                    <p class="date">{{ $comment['date'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact comment_form" action="{{ route('post.comment.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="main_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Resaurant food</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Travel news</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Modern technology</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Product</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Inspiration</p>
                                        <p>(21)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Health Care</p>
                                        <p>(21)</p>
                                    </a>
                                </li>
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

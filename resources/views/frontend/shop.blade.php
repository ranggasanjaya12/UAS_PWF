@extends('frontend.layout')

@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
          <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
              <div class="mb-3 mb-md-0">
                <h2>Shop Category</h2>
                <p>Very us move be blessed multiply night</p>
              </div>
              <div class="page_link">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/shop') }}">Shop</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================End Home Banner Area =================-->
  
      <!--================Category Product Area =================-->
      <section class="cat_product_area section_gap">
        <div class="container">
          <div class="row flex-row-reverse">
            <div class="col-lg-9">
              <div class="product_top_bar">
                <div class="left_dorp">
                  {{-- <select class="sorting">
                    <option value="1">Default sorting</option>
                    <option value="2">Default sorting 01</option>
                    <option value="4">Default sorting 02</option>
                  </select>
                  <select class="show">
                    <option value="1">Show 12</option>
                    <option value="2">Show 14</option>
                    <option value="4">Show 16</option>
                  </select> --}}
                </div>
              </div>
              
              <div class="latest_product_inner">
                <div class="row">
                  @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 product-item" data-category="{{ $product->category->name }}">
                      <div class="single-product">
                        <div class="product-img">
                          <img class="card-img" src="{{ Storage::url($product->banner) }}" alt="" />
                          <div class="p_icon">
                            <a href="{{ route('productdetails.show', ['title' => $product->title]) }}">
                              <i class="ti-eye"></i>
                            </a>
                            <a href="">
                              <i class="ti-heart"></i>
                            </a>
                          </div>
                        </div>
                        <div class="product-btm">
                          <h4>{{ $product->title }}</h4>
                          <div class="mt-3">
                            <span class="mr-4">{{ $product->location }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              
            </div>
  
            <div class="col-lg-3">
              <div class="left_sidebar_area">
                <aside class="left_widgets p_filter_widgets">
                  <div class="l_w_title">
                      <h3>Categories</h3>
                  </div>
                  <div class="widgets_inner">
                      <ul class="list">
                          @foreach ($categories as $category)
                              <li>
                                  <a href="{{ route('products.filter', $category->id) }}">{{ $category->name }}</a>
                              </li>
                          @endforeach
                      </ul>
                  </div>
              </aside>
                
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================End Category Product Area =================-->
    
@endsection
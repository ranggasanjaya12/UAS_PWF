<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">OE Admin <sup></sup></div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    {{-- <li class="nav-item">
      <a class="nav-link" href="{{ route('products') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Product</span></a>
    </li> --}}
    
    {{-- <li class="nav-item">
      <a class="nav-link" href="/profile">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span></a>
    </li> --}}

    <!--================Homepage Area =================-->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHomepage"
          aria-expanded="true" aria-controls="collapseHomepage">
          <i class="fas fa-fw fa-home"></i>
          <span>Homepage</span>
      </a>
      <div id="collapseHomepage" class="collapse" aria-labelledby="headingHomepage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Homepage Submenu:</h6>
              <a class="collapse-item" href="{{ route('sliders.index') }}">Slider</a>
              <a class="collapse-item" href="{{ route('offers.index') }}">Offer</a>
          </div>
      </div>
    </li>
    <!--================Homepage Area =================-->

    <!--================Shop Area =================-->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShop"
          aria-expanded="true" aria-controls="collapseShop">
          <i class="fas fa-fw fa-home"></i>
          <span>Shop</span>
      </a>
      <div id="collapseShop" class="collapse" aria-labelledby="headingShop" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Shop Submenu:</h6>
              <a class="collapse-item" href="{{ route('categorys.index') }}">Category</a>
              <a class="collapse-item" href="{{ route('products.index') }}">Product</a>
          </div>
      </div>
    </li>
    <!--================Shop Area =================-->

    <!--================Shop Area =================-->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog"
          aria-expanded="true" aria-controls="collapseBlog">
          <i class="fas fa-fw fa-home"></i>
          <span>Blog</span>
      </a>
      <div id="collapseBlog" class="collapse" aria-labelledby="headingBlog" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Blog Submenu:</h6>
              <a class="collapse-item" href="{{ route('catblogs.index') }}">Category Blog</a>
              <a class="collapse-item" href="{{ route('postblogs.index') }}">Blog</a>
          </div>
      </div>
    </li>
    <!--================Shop Area =================-->
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    
  </ul>
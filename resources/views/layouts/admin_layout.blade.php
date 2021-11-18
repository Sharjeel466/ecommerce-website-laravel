<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel | @yield('page_title')</title>
  <link href="{{asset('public/admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('public/admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('public/admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="{{asset('public/admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('public/admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('public/admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body>
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
            <a class="logo" href="">
              <img src="{{asset('public/admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" width="100px" />
            </a>
            <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            <li class="@yield('dashboard_select')">
              <a href="">
                <i class="fas fa-tachometer-alt"></i>Dashboard
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <a href="javascript:void(0)">
          <img src="{{asset('public/admin_assets/images/icon/logo.png')}}" />
        </a>
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li class="@yield('dashboard_select')">
              <a href="{{ url('admin/dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>Dashboard
              </a>
            </li>
            <li class="@yield('category_select')">
              <a href="{{ url('admin/category') }}">
                <i class="fas fa-bars"></i>Categories
              </a>
            </li>
            <li class="@yield('product_select')">
              <a href="{{ url('admin/product') }}">
                <i class="fab fa-product-hunt"></i>Products
              </a>
            </li>
            <li class="@yield('customer_select')">
              <a href="{{ url('admin/customer') }}">
                <i class="fas fa-users"></i>Users
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              <h3>@yield('page_select')</h3>
              <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">
                    <div class="content">
                      <a class="js-acc-btn" href="#">Welcome, <strong>{{Auth::user()->name}}</strong></a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                      <div class="account-dropdown__footer">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          @section('container')
          @show
        </div>
      </div>
    </div>
  </div>
  <!-- END PAGE CONTAINER-->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="cat-form" action="" method="post">
          @csrf
          <div class="modal-body">
            <label for="category_name" class="control-label mb-1">Category Name</label>
            <input name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" autocomplete="off" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Update Modal -->
  <div class="modal fade" id="update-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="cat-update-form" action="" method="post">
          @csrf
          <div class="modal-body">
            <label for="category_name" class="control-label mb-1">Category Name</label>
            <input type="hidden" id="cat_id" value="">
            <input name="update_name" type="text" value="" id="cat_name" class="form-control" aria-required="true" aria-invalid="false" autocomplete="off" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


<script src="{{asset('public/admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('public/admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<script src="{{asset('public/admin_assets/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('public/admin_assets/js/main.js')}}"></script>
</body>
</html>
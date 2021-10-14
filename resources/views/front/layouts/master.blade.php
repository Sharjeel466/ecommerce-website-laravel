@php
use App\Http\Controllers\FrontController;

if (Auth::user()) {
  $cart_item = FrontController::showUserCart(); 
  $cart = FrontController::cart();
}
else{
  $cart_item = 0;
}
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">    

  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Ecommerce Website</title>
  <link href="{{asset('public/front_assets/css/font-awesome.css')}}" rel="stylesheet">
  <link href="{{asset('public/front_assets/css/bootstrap.css')}}" rel="stylesheet">   
  <link href="{{asset('public/front_assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/jquery.simpleLens.css')}}">    
  <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/css/nouislider.css')}}">
  <link id="switcher" href="{{asset('public/front_assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
  <link href="{{asset('public/front_assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('public/front_assets/css/style.css')}}" rel="stylesheet">   

  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

  <script>
    var PRODUCT_IMAGE="{{asset('storage/media/')}}";
  </script>

</head>
<body class="productPage">
  <!-- wpf loader Two -->
  <div id="wpf-loader-two">          
    <div class="wpf-loader-two-inner">
      <span>Loading</span>
    </div>
  </div> 
  <!-- / wpf loader Two -->       
  {{-- SCROLL TOP BUTTON --}}
  <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="{{ asset('public/front_assets/img/flag/english.jpg') }}" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="{{ asset('public/front_assets/img/flag/french.jpg') }}" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="{{ asset('public/front_assets/img/flag/english.jpg') }}" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  {{-- <li class="hidden-xs"><a href="{{ url('cart') }}">My Cart</a></li> --}}
                  {{-- <li class="hidden-xs"><a href="{{ url('checkout') }}">Checkout</a></li> --}}
                  @if (Auth::user())
                  <li>Welcome, <strong>{{Auth::user()->name}}</strong></li>
                  <li><a href="{{ url('home') }}">|&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
                  @else
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  <li><a href="" data-toggle="modal" data-target="#register-modal">Register</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{ url('/') }}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Ecommerce<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
              </div>
              <!-- / logo  -->

              {{-- @if (Session::has('user')) --}}
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="{{ url('cart') }}">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{$cart_item}}</span>
                </a>
                
              </div>
              {{-- @endif --}}

              <!-- search box -->
            {{-- <div class="aa-search-box">
              <form action="">
                <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                <button type="submit"><span class="fa fa-search"></span></button>
              </form>
            </div> --}}
            <!-- / search box -->             
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / header bottom  -->
</header>
<!-- / header section -->
<!-- menu -->
<section id="menu">
  <div class="container">
    <div class="menu-area">
      <!-- Navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>          
        </div>
        <div class="navbar-collapse collapse">
          <!-- Left nav -->
          <ul class="nav navbar-nav">
            <li><a href="{{ url('product_list') }}">Products</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>       
  </div>
</section>

@yield('container')

<!-- footer -->  
<footer id="aa-footer">
  <!-- footer bottom -->
  <div class="aa-footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer-bottom -->
  <div class="aa-footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- / footer -->

<!-- Login Modal -->  
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">                      
      <div class="modal-body" style="height: 303px;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Login</h4>
        {{-- <form class="aa-login-form" action="{{ url('login-user') }}" method="post">
          @csrf
          <label for="">Email address</label>
          <input type="email" name="email" placeholder="Email" autocomplete="off" required>
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Password" autocomplete="off" required>
          <button class="aa-browse-btn" type="submit">Login</button>
        </form> --}}
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group  px-3">
            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group ">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group ">
            <div class="offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>
          </div>

          <div class="form-group  mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
              </button>

              @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
              @endif
            </div>
          </div>
        </form>
      </div>                        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>    

<!-- Register Modal -->  
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">                      
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Register</h4>
        <hr>
        {{-- <form class="aa-login-form" action="{{ url('register-user') }}" method="post">
          @csrf
          <label for="">Username</label>
          <input type="text" name="name" placeholder="Username" class="form-control" autocomplete="off" required>
          <label for="">E-mail</label>
          <input type="email" name="email" placeholder="E-mail" class="form-control" autocomplete="off" required>
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" required>
          <label for="">Phone Number</label>
          <input type="text" name="number" placeholder="Phone Number" class="form-control" autocomplete="off" required>
          <label for="">Address</label>
          <input type="text" name="address" placeholder="Address" class="form-control" autocomplete="off" required>
          <button class="aa-browse-btn" type="submit">Register</button>
          <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
        </form> --}}

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
        </form>

      </div>                        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('public/front_assets/js/bootstrap.js')}}"></script>  
<script src="{{asset('public/front_assets/js/main.js')}}"></script>  
<script type="text/javascript" src="{{asset('public/front_assets/js/jquery.smartmenus.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front_assets/js/jquery.smartmenus.bootstrap.js')}}"></script>  
<script src="{{asset('public/front_assets/js/sequence.js')}}"></script>
<script src="{{asset('public/front_assets/js/sequence-theme.modern-slide-in.js')}}"></script>  
<script type="text/javascript" src="{{asset('public/front_assets/js/jquery.simpleGallery.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front_assets/js/jquery.simpleLens.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front_assets/js/slick.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front_assets/js/nouislider.js')}}"></script>
<script src="{{asset('public/front_assets/js/custom.js')}}"></script> 

{{-- @endif --}}
</body>
</html>
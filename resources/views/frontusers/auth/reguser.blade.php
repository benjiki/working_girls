<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from template.hasthemes.com/julie/julie/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jan 2024 20:45:29 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Account :: Julie – Minimal Fashion Bootstrap 5 Template</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{asset('frontassets/assets/img/favicon.ico')}}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,500i,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,600,700" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{asset('frontassets/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--== Headroom CSS ==-->
    <link href="{{asset('frontassets/assets/css/headroom.css')}}" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{asset('frontassets/assets/css/animate.css')}}" rel="stylesheet" />
    <!--== Ionicons CSS ==-->
    <link href="{{asset('frontassets/assets/css/ionicons.css')}}" rel="stylesheet" />
    <!--== Material Icon CSS ==-->
    <link href="{{asset('frontassets/assets/css/material-design-iconic-font.css')}}" rel="stylesheet" />
    <!--== Elegant Icon CSS ==-->
    <link href="{{asset('frontassets/assets/css/elegant-icons.css')}}" rel="stylesheet" />
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{asset('frontassets/assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{asset('frontassets/assets/css/swiper.min.css')}}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{asset('frontassets/assets/css/fancybox.min.css')}}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{asset('frontassets/assets/css/slicknav.css')}}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{asset('frontassets/assets/css/style.css')}}" rel="stylesheet" />

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!--wrapper start-->
<div class="wrapper">

  <!--== Start Preloader Content ==-->
  <!--== End Preloader Content ==-->

  <!--== Start Header Wrapper ==-->
  <header class="header-area header-default">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6 col-sm-4 col-lg-3">
          <div class="header-logo-area">
            <a href="">
              <img class="logo-main" src="{{asset('frontassets/assets/img/logo.png')}}" alt="Logo" />
              <img class="logo d-none" src="{{asset('frontassets/assets/img/logo-light.png')}}" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-sm-4 col-lg-7 d-none d-lg-block">
          <div class="header-navigation-area">
            <ul class="main-menu nav position-relative">
              <li class="has-submenu"><a href="#/">Request Account</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-7 col-lg-2 d-none d-sm-block text-end">
        </div>
        <div class="col-6 col-sm-1 d-block d-lg-none text-end">
          <button class="btn-menu" type="button"><i class="zmdi zmdi-menu"></i></button>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="page-header-content">
              <nav class="breadcrumb-area">
                <ul class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="breadcrumb-sep">/</li>
                  <li>Account</li>
                </ul>
              </nav>
              <h4 class="title">Account</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Account Area Wrapper ==-->
    <section class="account-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-8 m-auto">
            <div class="account-form-wrap">
              <!--== Start Login Form ==-->
              <div class="login-form">
                <div class="content">
                  <h4 class="title">Login</h4>
                  <p>Please login using account detail bellow.<br>
                  if u dont have one create one.</p>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('danger'))
                <div class="alert alert-danger">
          
                    {{ session('danger') }}
                </div>
            @endif
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                  </ul>
               </div>
            @endif

                <form action="{{route('c_req')}}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input class="form-control" type="number" placeholder="phonenumber like this 091134564358" name="phonenumber">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="login-form-group">
                        <button class="btn-sign" type="submit">Request Account</button>
                        <a class="btn-pass-forgot" href="#/">Forgot your password?</a>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="account-optional-group">
                        <a class="btn-create" href="{{route('login')}}">login</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!--== End Login Form ==-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Account Area Wrapper ==-->
  </main>

  <!--== Start Footer Area Wrapper ==-->
  <!--== End Footer Area Wrapper ==-->

  <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

  <!--== Start Quick View Menu ==-->
  <aside class="product-quick-view-modal">
    <div class="product-quick-view-inner">
      <div class="product-quick-view-content">
        <button type="button" class="btn-close">
          <span class="close-icon"><i class="fa fa-close"></i></span>
        </button>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="thumb">
              <img src="{{asset('frontassets/assets/img/shop/quick-view1.jpg')}}" alt="Alan-Shop">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="content">
              <h4 class="title">Meta Slevless Dress</h4>
              <div class="prices">
                <del class="price-old">$85.00</del>
                <span class="price">$70.00</span>
              </div>
              <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
              <div class="quick-view-select">
                <div class="quick-view-select-item">
                  <label for="forSizes" class="form-label">Size:</label>
                  <select class="form-select" id="forSizes" required>
                    <option selected value="">s</option>
                    <option>m</option>
                    <option>l</option>
                    <option>xl</option>
                  </select>
                </div>
                <div class="quick-view-select-item">
                  <label for="forColors" class="form-label">Color:</label>
                  <select class="form-select" id="forColors" required>
                    <option selected value="">red</option>
                    <option>green</option>
                    <option>blue</option>
                    <option>yellow</option>
                    <option>white</option>
                  </select>
                </div>
              </div>
              <div class="action-top">
                <div class="pro-qty">
                  <input type="text" id="quantity4" title="Quantity" value="1" />
                </div>
                <button class="btn btn-black">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="canvas-overlay"></div>
  </aside>
  <!--== End Quick View Menu ==-->

  <!--== Start Side Menu ==-->
  <aside class="off-canvas-wrapper">
    <div class="off-canvas-inner">
      <div class="off-canvas-overlay"></div>
      <!-- Start Off Canvas Content Wrapper -->
      <div class="off-canvas-content">
        <!-- Off Canvas Header -->
        <div class="off-canvas-header">
          <div class="close-action">
            <button class="btn-menu-close">menu <i class="fa fa-chevron-left"></i></button>
          </div>
        </div>

        <div class="off-canvas-item">
          <!-- Start Mobile Menu Wrapper -->
          <div class="res-mobile-menu menu-active-one">
            <!-- Note Content Auto Generate By Jquery From Main Menu -->
          </div>
          <!-- End Mobile Menu Wrapper -->
        </div>
      </div>
      <!-- End Off Canvas Content Wrapper -->
    </div>
  </aside>
  <!--== End Side Menu ==-->
</div>

<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="{{asset('frontassets/assets/js/modernizr.js')}}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{asset('frontassets/assets/js/jquery-main.js')}}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{asset('frontassets/assets/js/jquery-migrate.js')}}"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="{{asset('frontassets/assets/js/popper.min.js')}}"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="{{asset('frontassets/assets/js/bootstrap.min.js')}}"></script>
<!--=== jQuery Headroom Min Js ===-->
<script src="{{asset('frontassets/assets/js/headroom.min.js')}}"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="{{asset('frontassets/assets/js/swiper.min.js')}}"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="{{asset('frontassets/assets/js/fancybox.min.js')}}"></script>
<!--=== jQuery Slick Nav Js ===-->
<script src="{{asset('frontassets/assets/js/slicknav.js')}}"></script>

<!--=== jQuery Custom Js ===-->
<script src="{{asset('frontassets/assets/js/custom.js')}}"></script>

</body>


</html>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from template.hasthemes.com/julie/julie/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jan 2024 20:44:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Pimp Website</title>

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
  <header class="header-area header-default sticky-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6 col-sm-4 col-lg-3">
          <div class="header-logo-area">
            <a href="{{route('m_v')}}">
              {{-- <img class="logo-main" src="{{asset('frontassets/assets/img/logo.png')}}" alt="Logo" />
              <img class="logo d-none" src="{{asset('frontassets/assets/img/logo-light.png')}}" alt="Logo" /> --}}
            </a>
          </div>
        </div>
        <div class="col-sm-4 col-lg-7 d-none d-lg-block">
          <div class="header-navigation-area">
            <ul class="main-menu nav position-relative">
              <li><a href=""></a></li>
              <li><a href=""></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-7 col-lg-2 d-none d-sm-block text-end">
          <div class="header-action-area">
            <ul class="header-action">
              <li class="mini-cart">
                <a class="action-item" href="#/">
                  <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                  <span class="cart-quantity">{{$order_counter}}</span>
                </a>
                <div class="mini-cart-dropdown">
                  
                  @foreach ($order_table as $item)
                  <div class="cart-item">
                    <div class="thumb">
                      @foreach ($workers_list as $workp)
                      @if($workp->workerphone === $item->orderd_worker_phone)
                      <img class="w-100" src="{{asset('storage/images/worker_profile/'.$workp->workerphoto)}}" alt="Image-HasTech">
                    @endif     
                      @endforeach
                      
                    </div>
                    <div class="content">
                      <h5 class="title"><a href="#/">{{$item->orderd_worker_name}}</a></h5>
                      <a class="cart-trash" href="{{route('o_d',['order_id'=>$item->id])}}"><i class="fa fa-trash"></i></a>
                    </div>
                  </div>
                      
                  @endforeach
                  
                  <div class="cart-total-money">
                    <h5>Total: <span class="money">$159.00</span></h5>
                  </div>
                  <div class="cart-btn">
                    <a href="{{route('o_checkout')}}">Checkout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-6 col-sm-1 d-block d-lg-none text-end">
          <button class="btn-menu" type="button"><i class="zmdi zmdi-menu"></i></button>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @elseif (session('danger'))
  <div class="alert alert-danger">

      {{ session('danger') }}
  </div>
@endif

  <main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Feature Area Wrapper ==-->
    <!--== End Feature Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-inner-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="product-header-wrap d-md-flex justify-content-md-between align-items-center">
              <div class="grid-list-option">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="true"><i class="fa fa-th-list"></i></button>
                  </div>
                </nav>
              </div>
              <div class="nav-short-area d-md-flex align-items-center">
                <p class="show-product"></p>
                <div class="toolbar-shorter">
                </div>
              </div>
            </div>
            <div class="product-body-wrap">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                  <div class="row">
                      <!--== Start Shop Item ==-->
                      @foreach ($workers_list as $item)
                      <div class="col-lg-4">
                      <div class="product-item">
                        <div class="inner-content">
                          <div class="product-thumb">
                            <a href=""><!-- for the cart -->
                              <img class="w-100" src="{{asset('storage/images/worker_profile/'.$item->workerphoto)}}" alt="Image-HasTech">
                            </a>
                            <span class="sale-title sticker">Age {{$item->workerage}}</span>
                            <span class="percent-count sticker">{{$item->workerhight}} m</span>
                          
                            <div class="product-action">
                              <div class="addto-wrap">
                                <a class="add-cart" href="{{route('o_m',['worker_id'=>$item->id])}}"><!-- for the cart -->
                                  <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="product-desc">
                            <div class="product-info">
                              <h4 class="title"><a href="{{route('o_m',['worker_id'=>$item->id])}}"> {{$item->workername}}</a></h4>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      @endforeach
                  </div>
                  <!--== Start Pagination Wrap ==-->

                  <!--== Start Pagination Wrap ==-->
                  <!--== Start Pagination Wrap ==-->
                  <div class="row">
                    <div class="col-12">
                        <div class="pagination-content-wrap border-top">
                            <nav class="pagination-nav">
                                <ul class="pagination justify-content-center">
                                    @if ($workers_list->onFirstPage())
                                        <li class="disabled"><span class="prev">Prev</span></li>
                                    @else
                                        <li><a href="{{ $workers_list->previousPageUrl() }}" class="prev">Prev</a></li>
                                    @endif

                                    @foreach ($workers_list->getUrlRange(1, $workers_list->lastPage()) as $page => $url)
                                        <li class="{{ $page == $workers_list->currentPage() ? 'active' : '' }}">
                                            <a href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    @if ($workers_list->hasMorePages())
                                        <li><a href="{{ $workers_list->nextPageUrl() }}" class="next">Next</a></li>
                                    @else
                                        <li class="disabled"><span class="next">Next</span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                  </div>
            <!--== End Pagination Wrap ==-->
            <!--== End Pagination Wrap ==-->
                  
                  <!--== End Pagination Wrap ==-->
                </div>   
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <!--== Start Product Sidebar Wrapper ==-->
            <div class="product-sidebar-wrapper">
              <!--== Start Product Sidebar Item ==-->
              <div class="product-sidebar-item">
                <h4 class="product-sidebar-title">Search</h4>
                <div class="product-sidebar-body">
                  <div class="product-sidebar-search-form">
                    <form action="{{route('search_name')}}" method="POST">
                        @csrf
                      <div class="form-group">
                        <input class="form-control" type="search" name="username" placeholder="Search by name">
                        <button type="submit" class="btn-src"><i class="zmdi zmdi-search"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--== End Product Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <div class="product-sidebar-item">
                <h4 class="product-sidebar-title">By age</h4>
                <div class="product-sidebar-body">
                  <div class="product-sidebar-nav-menu">
                    <a href="{{route('m_v')}}">Home</a>
                    <a  href="{{route('fillternum',['num'=>1])}}">18-21</a>
                    <a href="{{route('fillternum',['num'=>2])}}">22-26</a>
                    <a href="{{route('fillternum',['num'=>3])}}">27-31</a>
                    <a href="{{route('fillternum',['num'=>4])}}">31-35</a>
                  </div>
                </div>
              </div>
              <!--== End Sidebar Item ==-->
              <!--== Start Sidebar Item ==-->
              <div class="product-sidebar-item">
                <h4 class="product-sidebar-title">By color</h4>
                <div class="product-sidebar-body">
                  <div class="product-sidebar-nav-menu">
                    <a href="{{route('m_v')}}">Home</a>
                    <a  href="{{route('filltercol',['col'=>'tekure'])}}">tekure</a>
                    <a href="{{route('filltercol',['col'=>'teyeme'])}}">teyeme</a>
                    <a href="{{route('filltercol',['col'=>'keye'])}}">keye</a>
                    <a href="{{route('filltercol',['col'=>'white'])}}">white</a>
                  </div>
                </div>
              </div>
              <!--== End Sidebar Item ==-->
              <!--== Start Sidebar Item ==-->
              <div class="product-sidebar-item">
                <h4 class="product-sidebar-title">By height</h4>
                <div class="product-sidebar-body">
                  <div class="product-sidebar-nav-menu">
                    <a href="{{route('m_v')}}">Home</a>
                    <a  href="{{route('fillterm',['m'=>1])}}">1.0 m -1.2 m</a>
                    <a href="{{route('fillterm',['m'=>2])}}">1.3 m-1.5 m</a>
                    <a href="{{route('fillterm',['m'=>3])}}">1.6 m-1.9 m</a>
                   </div>
                </div>
              </div>
              <!--== End Sidebar Item ==-->
              <!--== Start Sidebar Item ==-->
              <div class="product-sidebar-item">
                <h4 class="product-sidebar-title">By kg</h4>
                <div class="product-sidebar-body">
                  <div class="product-sidebar-nav-menu">
                    <a href="{{route('m_v')}}">Home</a>
                    <a  href="{{route('fillterkg',['kg'=>1])}}">45kg -50kg</a>
                    <a href="{{route('fillterkg',['kg'=>2])}}">51kg -55kg</a>
                    <a href="{{route('fillterkg',['kg'=>3])}}">56kg -60kg</a>
                    <a href="{{route('fillterkg',['kg'=>4])}}">61kg -65kg</a>
                    <a href="{{route('fillterkg',['kg'=>5])}}">66kg -70kg</a>
                    <a href="{{route('fillterkg',['kg'=>6])}}">71kg -76kg</a>
                    <a href="{{route('fillterkg',['kg'=>7])}}">77kg -80kg</a>
                    <a href="{{route('fillterkg',['kg'=>8])}}">81kg -86kg</a>
                    <a href="{{route('fillterkg',['kg'=>9])}}">87kg -90kg</a>
                    <a href="{{route('fillterkg',['kg'=>10])}}">91kg -100kg</a>
                  </div>
                </div>
              </div>
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->

              <!--== Start Sidebar Item ==-->
              <!--== End Sidebar Item ==-->
            </div>
            <!--== End Product Sidebar Wrapper ==-->
          </div>
        </div>
      </div>
    </section>
  <!--== End Product Area Wrapper ==-->

   
  
  
  </main>

  <!--== Start Footer Area Wrapper ==-->
  <!--== End Footer Area Wrapper ==-->

  <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

  <!--== Start Quick View Menu ==-->
  <!--== End Quick View Menu ==-->  

  <!--== Start Side Menu ==-->
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
<!--=== jQuery Countdown Js ===-->
<script src="{{asset('frontassets/assets/js/countdown.js')}}"></script>

<!--=== jQuery Custom Js ===-->
<script src="{{asset('frontassets/assets/js/custom.js')}}"></script>

</body>


<!-- Mirrored from template.hasthemes.com/julie/julie/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jan 2024 20:45:19 GMT -->
</html>
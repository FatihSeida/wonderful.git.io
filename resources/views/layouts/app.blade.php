<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Wonderful</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.ico">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


        <link rel="stylesheet" href="{{ url('assets/css/slick/slick.css') }}"> 
        <link rel="stylesheet" href="{{ url('assets/css/slick/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/iconfont.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootsnav.css') }}">

        <!-- xsslider slider css -->


        <!--<link rel="stylesheet" href="{{ url('assets/css/xsslider.css') }}">-->




        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href="{{ url('assets/css/plugins.css') }}" />-->

        <!--Theme custom css -->
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}" />

        <script src="{{ url('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

        @yield('style')

    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div><!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->


            <nav class="navbar navbar-default bootsnav navbar-fixed">
                

                <!-- Start Top Search -->
                
                <!-- End Top Search -->


                <div class="container"> 
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ url('assets/images/logo.png') }}" class="logo" alt="">
                            <!--<img src="assets/images/footer-logo.png" class="logo logo-scrolled" alt="">-->
                        </a>

                    </div>
                    <!-- End Header Navigation -->

                    <!-- navbar menu -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right">               
                            <li>
				                <form class="form-inline" action="{{ url('/search') }}" method="GET" role="search">
								    <div class="input-group" style="margin-top: 14px; margin-bottom: 10px;">
									    <input class="form-control" placeholder="Cari . . ." name="q" id="searchform" type="text">
									    <div class="input-group-btn">
										    <button type="submit" id="searchbtn"><i class="fa fa-search"></i></button>
									    </div>
								    </div>
							    </form>
                            </li>
                            
                            <li><a href="#" data-toggle="modal" data-target="#tambahkanWisata" data-backdrop="false"> Tambahkan Wisata </a></li>
                        
							@if (Route::has('login'))    
						        @auth
                                    <li class="dropdown magz-dropdown"><a href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @if(Auth::user()->role == 'admin')<li><a href="{{ url('/admin') }}"><i class="icon ion-person"></i> Dashboard</a></li>@endif
                                        
                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="icon ion-log-out"></i>
                                                Logout
                                            </a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                    </li>
						        @else
						            <li><a href="{{ route('login') }}">Login</a></li>
						            <li><a href="{{ route('register') }}">Register</a></li>
						        @endauth
							@endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div> 

            </nav>

            <div class="modal fade" id="tambahkanWisata" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4 class="modal-title">Tambahkan Wisata</h4></center>
                  </div>
                  <div class="modal-body">
                    <center>
                    <h2>Untuk Pengiklanan Wisata</h2>
                    <h3>Silahkan Menghubungi</h3>
                    <h3>+62 89615266856</h3>
                    <enter>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" form="#form_masukan">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <!--Home Sections-->

			@yield('content')

            <footer id="contact" class="footer bg-black" style="position: relative; bottom: 0px; min-width: 100%;">
                
                <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30">
                    <div class="col-md-12">
                        <p class="wow fadeInRight" data-wow-duration="1s">
                            Made with 
                            <i class="fa fa-heart"></i>
                            by 
                            <a href="#">Fajar Ichsan, Mz Fajar, Fatih Seida</a> 
                            2018. All Rights Reserved
                        </p>
                    </div>
                </div>
            </footer>

        </div>

        <!-- JS includes -->

        <script src="{{ url('assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ url('assets/js/vendor/bootstrap.min.js') }}"></script>

        <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ url('assets/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ url('assets/css/slick/slick.js') }}"></script>
        <script src="{{ url('assets/css/slick/slick.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.collapse.js') }}"></script>
        <script src="{{ url('assets/js/bootsnav.js') }}"></script>

        <script src="{{ url('assets/js/plugins.js') }}"></script>
        <script src="{{ url('assets/js/main.js') }}"></script>

		@yield('script')

    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Home')</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="7808db88-149f-40e1-947e-31c7fc81ff83";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="/front/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/front/css/magnific-popup.css" />
    <link rel="stylesheet" href="/front/css/font-icons.css" />
    <link rel="stylesheet" href="/front/css/sliders.css" />
    <link rel="stylesheet" href="/front/css/style.css" />

    <!-- Favicons -->
    @php
        $about = App\Models\About::first();
    @endphp
    <link rel="shortcut icon" href="/front/img/favicon.ico">
    <link rel="apple-touch-icon" href="/uploads/{{ $about->logo }}">
    <link rel="apple-touch-icon" sizes="72x72" href="/uploads/{{ $about->logo }}">
    <link rel="apple-touch-icon" sizes="114x114" href="/uploads/{{ $about->logo }}">

</head>

<body class="relative">

    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>

    <main class="main-wrapper">

        <header class="nav-type-1">

            <!-- Fullscreen search -->
            <div class="search-wrap">
                <div class="search-inner">
                    <div class="search-cell">
                        <form method="get">
                            <div class="search-field-holder">
                                <input type="search" class="form-control main-search-input" placeholder="Search for">
                                <i class="ui-close search-close" id="search-close"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end fullscreen search -->

            <nav class="navbar navbar-static-top">
                <div class="navigation" id="sticky-nav">
                    <div class="container relative">

                        <div class="row flex-parent">

                            <div class="navbar-header flex-child">
                                <!-- Logo -->
                                <div class="logo-container">
                                    <div class="logo-wrap">
                                        <a href="/">
                                            @php
                                                $about = App\Models\About::first();
                                            @endphp
                                            <img class="logo-dark2" src="/uploads/{{ $about->logo }}" alt="logo"
                                                width="60">
                                        </a>
                                    </div>
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Mobile cart -->
                                <div class="nav-cart mobile-cart hidden-lg hidden-md">
                                    <div class="nav-cart-outer">
                                        <div class="nav-cart-inner">
                                            <a href="/cart" class="nav-cart-icon">
                                                <span class="nav-cart-badge"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end navbar-header -->

                            <div class="nav-wrap flex-child">
                                <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                                    <ul class="nav navbar-nav">

                                        <li class="dropdown">
                                            <a href="/">Home</a>
                                        </li>

                                        @php
                                            $categories = App\Models\Category::all();
                                        @endphp

                                        <li class="dropdown">
                                            <a href="#">Shop</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>
                                            <ul class="dropdown-menu megamenu-wide">
                                                <li>
                                                    <div class="megamenu-wrap container">
                                                        <div class="row">
                                                            @foreach ($categories as $category)
                                                                <div class="col-md-3 megamenu-item">
                                                                    <ul class="menu-list">
                                                                        <li>
                                                                            <span><a
                                                                                    href="/products/{{ $category->id }}">{{ $category->nama_kategori }}</a></span>
                                                                        </li>
                                                                        {{-- @php
                                                                    $subcategories =
                                                                    App\Models\Subcategory::where('id_kategori',
                                                                    $category->id)->get();
                                                                    @endphp
                                                                    @foreach ($subcategories as $subcategory)
                                                                    <li>
                                                                        <a
                                                                            href="/products/{{$subcategory->id}}">{{$subcategory->nama_subkategori}}</a>
                                                                    </li>
                                                                    @endforeach --}}
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="dropdown">
                                            <a href="/contact">Tentang</a>
                                        </li>  

                                        <!-- Mobile search -->
                                        <li id="mobile-search" class="hidden-lg hidden-md">
                                            <form method="get" class="mobile-search">
                                                <input type="search" class="form-control" placeholder="Search...">
                                                <button type="submit" class="search-button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </form>
                                        </li>

                                    </ul> <!-- end menu -->
                                </div> <!-- end collapse -->
                            </div> <!-- end col -->

                            <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
                                <ul>
                                    <li class="nav-register">
                                        @if (Auth::guard('webmember')->check())
                                            <a href="/profile">{{ Auth::guard('webmember')->user()->nama_member }} </a>
                                        @else
                                            <a href="/login_member">Login </a>
                                        @endif
                                    </li>
                                    <li class="nav-cart">
                                        <div class="nav-cart-outer">
                                            <div class="nav-cart-inner">
                                                <a href="/cart" class="nav-cart-icon"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-register">
                                        @if (Auth::guard('webmember')->check())
                                            <a href="/logout_member">Logout</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div> <!-- end navigation -->
            </nav> <!-- end navbar -->
        </header>

        <div class="content-wrapper oh">

            @yield('content')

            <!-- Newsletter -->
            

            <!-- Footer Type-1 -->
            <footer class="footer footer-type-1"> <div class="bottom-footer">
                    <div class="container">
                        <div class="row"><div class="col-sm-6 copyright sm-text-center">
                                <span>
                                    &copy; 2023 Dealer Honda, Made by <a href="#">Agi</a>
                                </span>
                            </div>

                        </div>
                    </div>
                </div> <!-- end bottom footer -->
            </footer> <!-- end footer -->

            <div id="back-to-top">
                <a href="#top"><i class="fa fa-angle-up"></i></a>
            </div>

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- jQuery Scripts -->
    <script type="text/javascript" src="/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/front/js/plugins.js"></script>
    <script type="text/javascript" src="/front/js/scripts.js"></script>
    @stack('js')
</body>

</html>

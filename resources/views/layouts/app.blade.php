<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Sports Club, League and News HTML Template">
        <meta name="author" content="Dan Fisher">
        <meta name="keywords" content="sports club news HTML template">

        <title>{{ config('app.name', 'Alchemists Basketball Club &amp; Sports News HTML Template') }}</title>
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="{{asset('stuff/images/basketball/favicons/favicon.ico')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('stuff/images/basketball/favicons/favicon-120.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('stuff/images/basketball/favicons/favicon-152.png')}}">

        <!-- Google Web Fonts
        ================================================== -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&amp;family&#x3D;Source+Sans+Pro:wght@400;700&amp;display&#x3D;swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- CSS
        ================================================== -->
        <!-- Vendor CSS -->
        <link href="{{asset('stuff/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('stuff/fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('stuff/fonts/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
        <link href="{{asset('stuff/vendor/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
        <link href="{{asset('stuff/vendor/slick/slick.css')}}" rel="stylesheet">

        <!-- Template CSS-->
        <link href="{{asset('stuff/css/style-basketball.css')}}" rel="stylesheet">

        <!-- Custom CSS-->
        <link href="{{asset('stuff/css/custom.css')}}" rel="stylesheet">
        <link href="{{asset('stuff/bootstrap-imageupload.css')}}" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('country/dependancies/bootstrap-select-1.12.4/dist/css/bootstrap-select.min.css')}}">

    </head>
    <body data-template="template-basketball">
        <div class="clearfix site-wrapper">
            <div class="site-overlay"></div>

            <!-- Header
            ================================================== -->
            
            <!-- Header Mobile -->
            <div class="clearfix header-mobile" id="header-mobile">
                <div class="header-mobile__logo">
                    <a href="{{route('home')}}"><img src="{{asset('stuff/images/logo.png')}}" srcset="{{asset('stuff/images/logo@2x.png 2x')}}" alt="Alchemists" class="header-mobile__logo-img"></a>
                </div>
                <div class="header-mobile__inner">
                    <a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
                    <span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
                </div>
            </div>
            
            <!-- Header Desktop -->
            <header class="header header--layout-1">
            
                <!-- Header Top Bar -->
                <div class="clearfix header__top-bar">
                    <div class="container">
                        <div class="header__top-bar-inner">

                            <!-- Account Navigation -->
                            <ul class="nav-account">
                                @if (Route::has('login'))
                                        @auth
                                            <li class="nav-account__item "><a href="#">{{ Auth::user()->name }} </a></li>
                                            <li class="nav-account__item "><a href="{{ route('logout') }}">Logout</a></li>
                                            @else
                                            <li class="nav-account__item "><a href="{{ route('login') }}">LOGIN</a></li>
                                            @if (Route::has('register'))
                                                <li class="nav-account__item "><a href="{{ route('register') }}">REGISTER</a></li>
                                            @endif
                                        @endauth
                                @endif
                           </ul>
                            <!-- Account Navigation / End -->
            
                        </div>
                    </div>
                </div>
                <!-- Header Top Bar / End -->
            
                <!-- Header Secondary -->
                <div class="header__secondary">
                    <div class="container">
            
                        <!-- Header Search Form -->
                        <div class="header-search-form">
                            <form action="#" id="mobile-search-form" class="search-form">
                                <input type="text" class="form-control header-mobile__search-control" value="" placeholder="Enter your search here...">
                                <button type="submit" class="header-mobile__search-submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Header Search Form / End -->
            
                        <ul class="info-block info-block--header">
                            <li class="info-block__item info-block__item--contact-primary">
                                <svg role="img" class="df-icon df-icon--jersey">
                                    <use xlink:href="stuff/images/icons-basket.svg#jersey"/>
                                </svg>
                                <h6 class="info-block__heading">Join Our Team!</h6>
                                <a class="info-block__link" href="mailto:tryouts@alchemists.com">tryouts@alchemists.com</a>
                            </li>
                            <li class="info-block__item info-block__item--contact-secondary">
                                <svg role="img" class="df-icon df-icon--basketball">
                                    <use xlink:href="stuff/images/icons-basket.svg#basketball"/>
                                </svg>
                                <h6 class="info-block__heading">Contact Us</h6>
                                <a class="info-block__link" href="mailto:info@alchemists.com">info@alchemists.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header Secondary / End -->
            
                <!-- Header Primary -->
                <div class="header__primary">
                    <div class="container">
                        <div class="header__primary-inner">
                            <!-- Header Logo -->
                            <div class="header-logo">
                                <a href="{{route('home')}}"><img src="stuff/images/logo.png" alt="Alchemists" srcset="stuff/images/logo@2x.png 2x" class="header-logo__img"></a>
                            </div>
                            <!-- Header Logo / End -->
            
                            <!-- Main Navigation -->
                            <nav class="clearfix main-nav">
                                <ul class="main-nav__list">
                                    @auth
                                        @if (Auth::user()->permission == 1)                                           
                                            <li class=""><a href="#">Add &nbsp;Items</a>
                                                <ul class="main-nav__sub">
                                                    <li><a href="">Add &nbsp; Basic &nbsp; Data</a>
                                                        <ul class="main-nav__sub-2">
                                                            <li class=""><a href="{{route('addCompetition')}}">Add Competition</a></li>
                                                            <li class=""><a href="{{route('addVenue')}}">Add Venue</a></li>
                                                            <li><a href="{{route('addTeam')}}">Add &nbsp; Team</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="{{route('addResult')}}">Add &nbsp; Result</a></li>
                                                    <li><a href="{{route('addSchedule')}}">Add &nbsp; Schedule</a></li>
                                                    <li><a href="{{route('addPbyp')}}">Add &nbsp; Play-By-Play</a></li>
                                                    <li><a href="{{route('addTeamMembers')}}">Add &nbsp; Member</a></li>
                                                    <li><a href="{{route('addNews')}}">Add &nbsp; News</a></li>
                                                    <li><a href="{{route('addTournament')}}">Add &nbsp; Tournament</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    @endauth
                                    <li class="@yield('home')"><a href="{{route('home')}}">Home</a></li>
                                    <li class="@yield('team')"><a href="#">The Team</a>
                                        <ul class="main-nav__sub">
                                            <li><a href="{{route('roster')}}">Team</a>
                                                <ul class="main-nav__sub-2">
                                                    <li class=""><a href="{{route('roster')}}">Roster</a></li>
                                                    <li class=""><a href="{{route('result')}}">Latest Result</a></li>
                                                    <li class=""><a href="{{route('schedule')}}">Schedule</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="">Event</a>
                                                <ul class="main-nav__sub-2">
                                                    <li class=""><a href="{{route('pbyp')}}">Play-by-Play</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{route('tournament')}}">Tournament</a></li>
                                        </ul>
                                    </li>
                                    <li class="@yield('news')"><a href="{{route('news')}}">News</a></li>
                                </ul>
            
                                <!-- Social Links -->
                                <ul class="social-links social-links--inline social-links--main-nav">
            
                                    <li class="social-links__item">
                                        <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="social-links__item">
                                        <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="social-links__item">
                                        <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fab fa-instagram"></i></a>
                                    </li>
            
                                </ul>
                                <!-- Social Links / End -->
            
                                <!-- Pushy Panel Toggle -->
                                <a href="#" class="pushy-panel__toggle">
                                    <span class="pushy-panel__line"></span>
                                </a>
                                <!-- Pushy Panel Toggle / Eng -->
                            </nav>
                            <!-- Main Navigation / End -->
                        </div>
                    </div>
                </div>
                <!-- Header Primary / End -->
            
            </header>
            <!-- Header / End -->
            
            <!-- Pushy Panel -->
            <aside class="pushy-panel ">
                <div class="pushy-panel__inner">
                    <header class="pushy-panel__header">
                        <div class="pushy-panel__logo">
                            <a href="{{route('home')}}"><img src="stuff/images/logo.png" srcset="stuff/images/logo@2x.png 2x" alt="Alchemists"></a>
                        </div>
                    </header>
                    <div class="pushy-panel__content">
            
                        <!-- Widget: Posts -->
                        <aside class="widget widget--side-panel">
                            <div class="widget__content">
                                <ul class="posts posts--simple-list posts--simple-list--lg">
                                    <li class="posts__item posts__item--category-1">
                                        <div class="posts__inner">
                                            <div class="posts__cat">
                                                <span class="label posts__cat-label">The Team</span>
                                            </div>
                                            <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                                            <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                                            <div class="posts__excerpt">
                                                Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                                            </div>
                                        </div>
                                        <footer class="posts__footer card__footer">
                                            <div class="post-author">
                                                <figure class="post-author__avatar">
                                                    <img src="stuff/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                                                </figure>
                                                <div class="post-author__info">
                                                    <h4 class="post-author__name">James Spiegel</h4>
                                                </div>
                                            </div>
                                            <ul class="post__meta meta">
                                                <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                                                <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                            </ul>
                                        </footer>
                                    </li>
                                    <li class="posts__item posts__item--category-2">
                                        <div class="posts__inner">
                                            <div class="posts__cat">
                                                <span class="label posts__cat-label">Injuries</span>
                                            </div>
                                            <h6 class="posts__title"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                                            <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                                            <div class="posts__excerpt">
                                                Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                                            </div>
                                        </div>
                                        <footer class="posts__footer card__footer">
                                            <div class="post-author">
                                                <figure class="post-author__avatar">
                                                    <img src="stuff/images/samples/avatar-2.jpg" alt="Post Author Avatar">
                                                </figure>
                                                <div class="post-author__info">
                                                    <h4 class="post-author__name">Jessica Hoops</h4>
                                                </div>
                                            </div>
                                            <ul class="post__meta meta">
                                                <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                                                <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                            </ul>
                                        </footer>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <!-- Widget: Posts / End -->
            
                        <!-- Widget: Tag Cloud -->
                        <aside class="widget widget--side-panel widget-tagcloud">
                            <div class="widget__title">
                                <h4>Tag Cloud</h4>
                            </div>
                            <div class="widget__content">
                                <div class="tagcloud">
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYOFFS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">ALCHEMISTS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INJURIES</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">TEAM</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INCORPORATIONS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">UNIFORMS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">CHAMPIONS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PROFESSIONAL</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">COACH</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">STADIUM</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">NEWS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYERS</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">WOMEN DIVISION</a>
                                    <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">AWARDS</a>
                                </div>
                            </div>
                        </aside>
                        <!-- Widget: Tag Cloud / End -->
            
                        <!-- Widget: Banner -->
                        <aside class="widget widget--side-panel widget-banner">
                            <div class="widget__content">
                                <figure class="widget-banner__img">
                                    <a href="#"><img src="assets/images/samples/banner.jpg" alt="Banner"></a>
                                </figure>
                            </div>
                        </aside>
                        <!-- Widget: Banner / End -->
            
                    </div>
                    <a href="#" class="pushy-panel__back-btn"></a>
                </div>
            </aside>
            <!-- Pushy Panel / End -->



            
            <!-- Content
            ================================================== -->
                @yield('content')
            
            <!-- Content / End -->
            

            <!-- Footer
            ================================================== -->
            <footer id="footer" class="footer">
            
                <!-- Footer Widgets -->
                <div class="footer-widgets">
                    <div class="footer-widgets__inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-lg-3">
                                    <div class="footer-col-inner">
            
                                        <!-- Footer Logo -->
                                        <div class="footer-logo">
                                            <a href="{{route('home')}}"><img src="assets/images/logo.png" srcset="assets/images/logo@2x.png 2x" alt="Alchemists" class="footer-logo__img"></a>
                                        </div>
                                        <!-- Footer Logo / End -->
            
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-3">
                                    <div class="footer-col-inner">
                                        <!-- Widget: Contact Info -->
                                        <div class="widget widget--footer widget-contact-info">
                                            <h4 class="widget__title">Contact Info</h4>
                                            <div class="widget__content">
                                                <div class="widget-contact-info__desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                                </div>
                                                <div class="widget-contact-info__body info-block">
                                                    <div class="info-block__item">
                                                        <svg role="img" class="df-icon df-icon--basketball">
                                                            <use xlink:href="assets/images/icons-basket.svg#basketball"/>
                                                        </svg>
                                                        <h6 class="info-block__heading">Contact Us</h6>
                                                        <a class="info-block__link" href="mailto:tryouts@alchemists.com">tryouts@alchemists.com</a>
                                                    </div>
                                                    <div class="info-block__item">
                                                        <svg role="img" class="df-icon df-icon--jersey">
                                                            <use xlink:href="assets/images/icons-basket.svg#jersey"/>
                                                        </svg>
                                                        <h6 class="info-block__heading">Join Our Team!</h6>
                                                        <a class="info-block__link" href="mailto:info@alchemists.com">info@alchemists.com</a>
                                                    </div>
                                                    <div class="info-block__item info-block__item--nopadding">
                                                        <ul class="social-links">
            
                                                            <li class="social-links__item">
                                                                <a href="#" class="social-links__link"><i class="fab fa-facebook"></i> Facebook</a>
                                                            </li>
                                                            <li class="social-links__item">
                                                                <a href="#" class="social-links__link"><i class="fab fa-twitter"></i> Twitter</a>
                                                            </li>
                                                            <li class="social-links__item">
                                                                <a href="#" class="social-links__link"><i class="fab fa-instagram"></i> Instagram</a>
                                                            </li>
            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Widget: Contact Info / End -->
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-3">
                                    <div class="footer-col-inner">
                                        <!-- Widget: Popular Posts / End -->
                                        <div class="widget widget--footer widget-popular-posts">
                                            <h4 class="widget__title">Popular News</h4>
                                            <div class="widget__content">
                                                <ul class="posts posts--simple-list">
            
                                                    <li class="posts__item posts__item--category-2">
                                                        <div class="posts__cat">
                                                            <span class="label posts__cat-label">Injuries</span>
                                                        </div>
                                                        <h6 class="posts__title posts__title--color-hover"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                                                        <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                                                    </li>
                                                    <li class="posts__item posts__item--category-1">
                                                        <div class="posts__cat">
                                                            <span class="label posts__cat-label">The Team</span>
                                                        </div>
                                                        <h6 class="posts__title posts__title--color-hover"><a href="#">Jay Rorks is only 24 points away from breaking the record</a></h6>
                                                        <time datetime="2017-08-23" class="posts__date">August 22nd, 2018</time>
                                                    </li>
                                                    <li class="posts__item posts__item--category-1">
                                                        <div class="posts__cat">
                                                            <span class="label posts__cat-label">The Team</span>
                                                        </div>
                                                        <h6 class="posts__title posts__title--color-hover"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                                                        <time datetime="2017-08-23" class="posts__date">June 8th, 2018</time>
                                                    </li>
            
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Widget: Popular Posts / End -->
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-3">
                                    <div class="footer-col-inner">
            
                                        <!-- Widget: Instagram -->
                                        <div class="widget widget--footer widget-instagram">
                                            <h4 class="widget__title">Gallery Widget</h4>
                                            <div class="widget__content">
                                                <ul id="instagram-feed" class="widget-instagram__list">
                                                    <li class="widget-instagram__item">
                                                        <a href="#" class="widget-instagram__link-wrapper" target="_blank">
                                                            <span class="widget-instagram__plus-sign">
                                                                <img src="assets/images/samples/instagram-img1.jpg" class="widget-instagram__img" alt="" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="widget-instagram__item">
                                                        <a href="#" class="widget-instagram__link-wrapper" target="_blank">
                                                            <span class="widget-instagram__plus-sign">
                                                                <img src="assets/images/samples/instagram-img2.jpg" class="widget-instagram__img" alt="" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="widget-instagram__item">
                                                        <a href="#" class="widget-instagram__link-wrapper" target="_blank">
                                                            <span class="widget-instagram__plus-sign">
                                                                <img src="assets/images/samples/instagram-img3.jpg" class="widget-instagram__img" alt="" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="widget-instagram__item">
                                                        <a href="#" class="widget-instagram__link-wrapper" target="_blank">
                                                            <span class="widget-instagram__plus-sign">
                                                                <img src="assets/images/samples/instagram-img4.jpg" class="widget-instagram__img" alt="" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="widget-instagram__item">
                                                        <a href="#" class="widget-instagram__link-wrapper" target="_blank">
                                                            <span class="widget-instagram__plus-sign">
                                                                <img src="assets/images/samples/instagram-img5.jpg" class="widget-instagram__img" alt="" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="widget-instagram__item">
                                                        <a href="#" class="widget-instagram__link-wrapper" target="_blank">
                                                            <span class="widget-instagram__plus-sign">
                                                                <img src="assets/images/samples/instagram-img6.jpg" class="widget-instagram__img" alt="" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <a href="#" class="btn btn-sm btn-instagram btn-icon-right">Follow Our Profile <i class="icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- Widget: Instagram / End -->
            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Widgets / End -->
            
                <!-- Footer Secondary -->
                <div class="footer-secondary footer-secondary--has-decor">
                    <div class="container">
                        <div class="footer-secondary__inner">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <ul class="footer-nav">
                                        <li class="footer-nav__item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="footer-nav__item"><a href="#">The Team</a></li>
                                        <li class="footer-nav__item"><a href="{{route('news')}}">News</a></li>            
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Secondary / End -->
            </footer>
            <!-- Footer / End -->
            
            <!-- Login/Register Modal -->

            <!-- Login/Register Modal / End -->

        </div>

        <!-- Javascript Files
        ================================================== -->
        <!-- Core JS -->
        <script src="{{asset('stuff/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('stuff/vendor/jquery/jquery-migrate.min.js')}}"></script>
        <script src="{{asset('stuff/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('stuff/js/core.js')}}"></script>
        <!-- Vendor JS -->
        <!-- <script src="{{asset('assets/vendor/twitter/jquery.twitter.js')}}"></script> -->
        
        <!-- Template JS -->
        <script src="{{asset('stuff/js/init.js')}}"></script>
        <script src="{{asset('stuff/js/custom.js')}}"></script>
        <script src="{{asset('stuff/bootstrap-imageupload.js')}}"></script>
        <script src="{{asset('country/dependancies/bootstrap-select-1.12.4/dist/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('country/countrypicker.min.js')}}"></script>
        <script src="{{asset('stuff/js/stuff.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
        <script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload({ imgSrc: "" });
        </script>
    </body>
</html>

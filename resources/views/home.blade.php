@extends('layouts.app')
@section('home','active')
@section('content')
            <!-- Hero Unit
            ================================================== -->
            <div class="hero-unit">
                <div class="container hero-unit__container">
                    <div class="hero-unit__content hero-unit__content--left-center">
                        <span class="hero-unit__decor">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </span>
                        <h5 class="hero-unit__subtitle">Elric Bros School</h5>
                        <h1 class="hero-unit__title">The <span class="text-primary">Alchemists</span></h1>
                        <div class="hero-unit__desc">Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore .</div>
                        <a href="#" class="btn btn-inverse btn-sm btn-outline btn-icon-right btn-condensed hero-unit__btn">Read More <i class="fas fa-plus text-primary"></i></a>
                    </div>
            
                    <figure class="hero-unit__img">
                        <img src="assets/images/samples/header_player.png" alt="Hero Unit Image">
                    </figure>
                </div>
            </div>

            <!-- Header Featured News
            ================================================== -->
            <div class="posts posts--carousel-featured featured-carousel">
            
                <div class="posts__item posts__item--category-1">
                    <a href="#" class="posts__link-wrapper">
                        <figure class="posts__thumb">
                            <img src="assets/images/samples/featured-carousel-2.jpg" alt="">
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h3 class="posts__title">Alchemists women team tryouts will start in January</h3>
                            <time datetime="2017-08-23" class="posts__date">June 8th, 2018</time>
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--views">2369</li>
                                <li class="meta__item meta__item--likes"><i class="meta-like icon-heart"></i> 530</li>
                                <li class="meta__item meta__item--comments">18</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="posts__item posts__item--category-1">
                    <a href="#" class="posts__link-wrapper">
                        <figure class="posts__thumb">
                            <img src="assets/images/samples/featured-carousel-3.jpg" alt="">
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h3 class="posts__title">Checkout the new ride of our best player of the season</h3>
                            <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--views">2369</li>
                                <li class="meta__item meta__item--likes"><i class="meta-like icon-heart"></i> 530</li>
                                <li class="meta__item meta__item--comments">18</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="posts__item posts__item--category-1">
                    <a href="#" class="posts__link-wrapper">
                        <figure class="posts__thumb">
                            <img src="assets/images/samples/featured-carousel-1.jpg" alt="">
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h3 class="posts__title">All the players are taking a team trip this summer</h3>
                            <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--views">2369</li>
                                <li class="meta__item meta__item--likes"><i class="meta-like icon-heart"></i> 530</li>
                                <li class="meta__item meta__item--comments">18</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="posts__item posts__item--category-1">
                    <a href="#" class="posts__link-wrapper">
                        <figure class="posts__thumb">
                            <img src="assets/images/samples/featured-carousel-2.jpg" alt="">
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h3 class="posts__title">Alchemists women team tryouts will start in January</h3>
                            <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--views">2369</li>
                                <li class="meta__item meta__item--likes"><i class="meta-like icon-heart"></i> 530</li>
                                <li class="meta__item meta__item--comments">18</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="posts__item posts__item--category-1">
                    <a href="#" class="posts__link-wrapper">
                        <figure class="posts__thumb">
                            <img src="assets/images/samples/featured-carousel-1.jpg" alt="">
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">The Team</span>
                            </div>
                            <h3 class="posts__title">All the players are taking a team trip this summer</h3>
                            <time datetime="2017-08-23" class="posts__date">August 23rd, 2018</time>
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--views">2369</li>
                                <li class="meta__item meta__item--likes"><i class="meta-like icon-heart"></i> 530</li>
                                <li class="meta__item meta__item--comments">18</li>
                            </ul>
                        </div>
                    </a>
                </div>
            
            </div>
            <div class="site-content">
			    <div class="container">
		
				    <div class="row">
                        <!-- @if(isset($message))
                            <script>alert('{{$message}}')</script>
                        @endif -->
                        @if(isset($newsData))
                            @foreach ($newsData as $newsItem)                    

                                <div class='col-md-6'>
                                    <div class="posts posts--cards posts--cards-thumb-lg post-list">
                    
                                        <div class="posts__item posts__item--card posts__item--category-1 card">
                                            <figure class="posts__thumb">
                                                <a href="#"><img src="assets/images/samples/post-img4-lg.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner card__content">
                                                <a href="#" class="posts__cta"></a>
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label">The Team</span>
                                                </div>
                                                <h6 class="posts__title"><a href="#">{{$newsItem->title}}</a></h6>
                                                <time datetime="2016-08-23" class="posts__date">{{$newsItem->created_at}}</time>
                                                <div class="posts__excerpt">
                                                    {{$newsItem->content}}
                                                </div>
                                            </div>
                                            <footer class="posts__footer card__footer">
                                                <div class="post-author">
                                                    <figure class="post-author__avatar">
                                                        <img src="assets/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                                                    </figure>
                                                    <div class="post-author__info">                                            
                                                        @auth
                                                            <h4 class="post-author__name">{{Auth::user()->name}}</h4>
                                                        @endauth
                                                    </div>
                                                </div>
                                                <ul class="post__meta meta">
                                                    <li class="meta__item meta__item--views">2369</li>
                                                    <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                                                    <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                                </ul>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            
                            @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
@endsection
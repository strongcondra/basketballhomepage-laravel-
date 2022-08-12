@extends('layouts.app')
@section('news','active')
@section('content')
		<!-- Page Heading
		================================================== -->
		<div class="page-heading">
			<div class="container">
				<div class="row">
					<div class="col-md-10 offset-md-1">
                        <a href="{{route('news')}}"><h1 class="page-heading__title">News</h1></a>

					</div>
				</div>
			</div>
		</div>
		<!-- Page Heading / End -->
        <div class="site-content">
			<div class="container">
                    <div class="posts posts--cards post-grid row">
                        @foreach ($newsData as $newsItem)                    
                        <div class="post-grid__item col-md-4">
                            <div class="posts__item posts__item--card posts__item--category-1 card">
                                <figure class="posts__thumb">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">The Team</span>
                                    </div>
                                    <a href="#"><img src="assets/images/samples/post-img6.jpg" alt=""></a>
                                </figure>
                                <div class="posts__inner card__content">
                                    <a href="#" class="posts__cta"></a>
                                    <time datetime="2016-08-23" class="posts__date">{{$newsItem->created_at}}</time>
                                    <h6 class="posts__title"><a href="#">{{$newsItem->title}}</a></h6>
                                    <div class="posts__excerpt">
                                        {{$newsItem->content}}
                                    </div>
                                </div>
                                <footer class="posts__footer card__footer">
                                    <div class="post-author">
                                        <figure class="post-author__avatar">
                                            <img src="assets/images/samples/avatar-4.jpg" alt="Post Author Avatar">
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
                        @endforeach
                </div>
            </div>
        </div>
@endsection
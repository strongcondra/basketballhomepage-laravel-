/**
	* @package Alchemists HTML
	*
	* Template Scripts
	* Created by Dan Fisher
*/

;(function($){
	"use strict";

	$('body:not(.page-loader-disable)').jpreLoader({
		showSplash: false,
		loaderVPos: "50%",
	});

	$.fn.exists = function () {
		return this.length > 0;
	};

	/* ----------------------------------------------------------- */
	/*  Predefined Variables
	/* ----------------------------------------------------------- */
	var $template_var = $('body').data('template');
	var $color_primary = '#ffdc11';
	var $main_nav     = $('.main-nav');
	var $circular_bar = $('.circular__bar');
	var $gmap         = $('.gm-map');
	var $mp_single    = $('.mp_single-img');
	var $mp_gallery   = $('.mp_gallery');
	var $mp_iframe    = $('.mp_iframe');
	var $post_fitRows = $('.post-grid--fitRows');
	var $post_masonry = $('.post-grid--masonry');
	var $post_masonry_filter = $('.post-grid--masonry-filter');
	var $team_album   = $('.js-album-masonry');
	var $slick_featured_slider   = $('.posts--slider-featured');
	var $slick_featured_carousel = $('.featured-carousel');
	var $slick_video_carousel = $('.video-carousel');
	var $slick_team_roster = $('.team-roster--slider');
	var $slick_awards = $('.awards--slider');
	var $slick_player_info = $('.player-info');
	var $slick_product = $('.product__slider');
	var $slick_product_soccer = $('.product__slider-soccer');
	var $slick_team_roster_card = $('.team-roster--card-slider');
	var $slick_team_roster_with_nav = $('.js-team-roster--slider-with-nav');
	var $slick_team_roster_case = $('.team-roster--case-slider');
	var $slick_team_roster_grid_slider = $('.js-team-roster--grid-sm');
	var $slick_team_roster_card_compact = $('.js-team-roster--card-compact');
	var $slick_team_tournaments_carousel = $('.js-team-tournaments-carousel');
	var $slick_player_news_carousel = $('.js-posts-carousel');
	var $slick_player_achievements_carousel = $('.js-alc-achievements-carousel');
	var $slick_hero_slider = $('.hero-slider');
	var $slick_hero_slider_football = $('.posts--slider-top-news');
	var $slick_slider_var_width = $('.posts--slider-var-width');
	var $slick_team_video_player = $('.js-alc-video-player');
	var $slick_event_carousel = $('.js-alc-event-stats-carousel');
	var $chart_games_history = $('#games-history');
	var $chart_games_history_soccer = $('#games-history-soccer');
	var $chart_games_history_esports = $('#games-history-esports');
	var $chart_points_history = $('#points-history');
	var $chart_points_history_soccer = $('#points-history-soccer');
	var $chart_points_history_football = $('#points-history-football');
	var $chart_yearly_history_esports = $('#yearly-history-esports');
	var $chart_horizontal_bars_esports = $('#chart-horizontal-bars-esports');
	var $chart_doughnut_esports = $('#chart-doughnut-esports');
	var $chart_doughnut_soccer1 = $('#chart-doughnut-soccer-1');
	var $chart_doughnut_soccer2 = $('#chart-doughnut-soccer-2');
	var $chart_player_stats = $('#player-stats');
	var $chart_event_cols = $('#alc-event-chart-cols');
	var $content_filter = $('.content-filter');
	var $marquee = $('.marquee');
	var $range_slider = $('#slider-range');
	var posts_filterable = $('.js-posts--filterable');

	if ( $template_var == 'template-soccer' ) {
		$color_primary = '#1892ed';
	} else if ( $template_var == 'template-esports') {
		$color_primary = '#00ff5b';
	} else if ( $template_var == 'template-football' ) {
		$color_primary = '#f92552';
	}

	var Core = {

		initialize: function() {

			this.SvgPolyfill();

			this.headerNav();

			this.countDown();

			this.circularBar();

			this.circleProgress();

			this.MagnificPopup();

			this.isotope();

			this.SlickCarousel();

			this.swiperSlider();

			this.ContentFilter();

			this.ChartJs();

			this.RangeSlider();

			this.GoogleMap();

			this.miscScripts();

		},

		SvgPolyfill: function() {
			svg4everybody();
		},

		headerNav: function() {

			if ( $main_nav.exists() ) {

				var $top_nav     = $('.nav-account');
				var $top_nav_li  = $('.nav-account > li');
				var $social      = $('.social-links--main-nav');
				var $info_nav_li = $('.info-block--header > li');
				var $info_nav_li_onclick = $('.js-info-block__item--onclick');
				var $wrapper     = $('.site-wrapper');
				var $nav_list    = $('.main-nav__list');
				var $nav_list_li = $('.main-nav__list > li');
				var $toggle_btn  = $('#header-mobile__toggle');
				var $pushy_btn   = $('.pushy-panel__toggle, .search__toggle');

				// Clone Search Form
				var $header_search_form = $('.header-search-form').clone();
				$('#header-mobile').append($header_search_form);

				// Clone Shopping Cart to Mobile Menu
				var $shop_cart = $('.info-block__item--shopping-cart > .info-block__link-wrapper').clone();
				$shop_cart.appendTo($nav_list).wrap('<li class="main-nav__item--shopping-cart"></li>');

				// Add arrow and class if Top Bar menu ite has submenu
				$top_nav_li.has('ul').addClass('has-children').prepend('<span class="main-nav__toggle"></span>');

				// Clone Top Bar menu to Main Menu
				if ( $top_nav.exists() ) {
					var children = $top_nav.children().clone();
					$nav_list.append(children);
				}

				// Clone Header Logo to Mobile Menu
				var $logo_mobile = $('.header-mobile__logo').clone();
				$nav_list.prepend($logo_mobile);
				$logo_mobile.prepend('<span class="main-nav__back"></span>');

				// Clone Header Info to Mobile Menu
				var header_info1 = $('.info-block__item--contact-primary').clone();
				var header_info2 = $('.info-block__item--contact-secondary').clone();
				$nav_list.append(header_info1).append(header_info2);

				// Clone Social Links to Main Menu
				if ( $social.exists() ) {
					var social_li = $social.children().clone();
					var social_li_new = social_li.contents().unwrap();
					social_li_new.appendTo($nav_list).wrapAll('<li class="main-nav__item--social-links"></li>');
				}

				// Add arrow and class if Info Header Nav has submenu
				$info_nav_li.has('ul').addClass('has-children');

				if ( $info_nav_li_onclick.exists() ){
					$info_nav_li_onclick.prepend('<span class="info-block__menu-icon"></span>');
					$info_nav_li_onclick.on('click', '.info-block__menu-icon', function() {
						$(this).toggleClass('active');
					});
				}

				// Mobile Menu Toggle
				$toggle_btn.on('click', function(){
					$wrapper.toggleClass('site-wrapper--has-overlay');
				});

				$('.site-overlay, .main-nav__back').on('click', function(){
					$wrapper.toggleClass('site-wrapper--has-overlay');
				});

				// Pushy Panel Toggle
				$pushy_btn.on('click', function(e){
					e.preventDefault();
					$wrapper.toggleClass('site-wrapper--has-overlay-pushy');
				});

				$('.site-overlay, .pushy-panel__back-btn').on('click', function(e){
					e.preventDefault();
					$wrapper.removeClass('site-wrapper--has-overlay-pushy site-wrapper--has-overlay');
				});

				// Add toggle button and class if menu has submenu
				$nav_list_li.has('.main-nav__sub').addClass('has-children').prepend('<span class="main-nav__toggle"></span>');
				$nav_list_li.has('.main-nav__megamenu').addClass('has-children').prepend('<span class="main-nav__toggle"></span>');

				$('.main-nav__toggle').on('click', function(){
					$(this).toggleClass('main-nav__toggle--rotate')
					.parent().siblings().children().removeClass('main-nav__toggle--rotate');

					$(".main-nav__sub, .main-nav__megamenu").not($(this).siblings('.main-nav__sub, .main-nav__megamenu')).slideUp('normal');
					$(this).siblings('.main-nav__sub').slideToggle('normal');
					$(this).siblings('.main-nav__megamenu').slideToggle('normal');
				});

				// Add toggle button and class if submenu has sub-submenu
				$('.main-nav__list > li > ul > li').has('.main-nav__sub-2').addClass('has-children').prepend('<span class="main-nav__toggle-2"></span>');
				$('.main-nav__list > li > ul > li > ul > li').has('.main-nav__sub-3').addClass('has-children').prepend('<span class="main-nav__toggle-2"></span>');

				$('.main-nav__toggle-2').on('click', function(){
					$(this).toggleClass('main-nav__toggle--rotate');
					$(this).siblings('.main-nav__sub-2').slideToggle('normal');
					$(this).siblings('.main-nav__sub-3').slideToggle('normal');
				});

				// Mobile Search
				$('#header-mobile__search-icon').on('click', function(){
					$(this).toggleClass('header-mobile__search-icon--close');
					$('.header-mobile').toggleClass('header-mobile--expanded');
				});
			}
		},

		countDown: function() {

			var countdown = $('.countdown-counter');
			var countdownPlain = $('.js-countdown-plain');

			if (countdown.exists()){
				var count_time = countdown.data('date');

				countdown.countdown({
					date: count_time,
					render: function(data) {
						$(this.el).html("<div class='countdown-counter__item countdown-counter__item--days'>" + this.leadingZeros(data.days, 2) + " <span class='countdown-counter__label'>days</span></div><div class='countdown-counter__item countdown-counter__item--hours'>" + this.leadingZeros(data.hours, 2) + " <span class='countdown-counter__label'>hours</span></div><div class='countdown-counter__item countdown-counter__item--mins'>" + this.leadingZeros(data.min, 2) + " <span class='countdown-counter__label'>mins</span></div><div class='countdown-counter__item countdown-counter__item--secs'>" + this.leadingZeros(data.sec, 2) + " <span class='countdown-counter__label'>secs</span></div>");
					}
				});
			}

			if (countdownPlain.exists()){
				var countdownPlainTime = countdownPlain.data('date');
				var finalDate = new Date(countdownPlainTime);

				countdownPlain.countdown({
					date: countdownPlainTime,
					render: function(date) {
						var diffInDays = (finalDate.getTime() - Date.now()) / 1000 / 86400;
						var progressBarValue = 100 - diffInDays ? 100 - diffInDays : 10;
						$(this.el).html("<div class='alc-countdown-plain__item alc-countdown-plain__item--title'>Starts In:</div><div class='alc-countdown-plain__item alc-countdown-plain__item--days'>" + this.leadingZeros(date.days, 2) + " <span class='alc-countdown-plain__item-label'>days</span></div><div class='alc-countdown-plain__item alc-countdown-plain__item--hours'>" + this.leadingZeros(date.hours, 2) + " <span class='alc-countdown-plain__item-label'>hours</span></div><div class='alc-countdown-plain__item alc-countdown-plain__item--mins'>" + this.leadingZeros(date.min, 2) + " <span class='alc-countdown-plain__item-label'>mins</span></div><div class='alc-countdown-plain__item alc-countdown-plain__item--secs'>" + this.leadingZeros(date.sec, 2) + " <span class='alc-countdown-plain__item-label'>secs</span></div><div class='alc-countdown-plain__progress progress-grid-wrapper'><div class='progress progress--lines progress--lines-sm'><div class='progress__bar progress__bar--gradient-primary-success' style='width: " + progressBarValue + "%;' role='progressbar' aria-valuenow='" + progressBarValue + "' aria-valuemin='0' aria-valuemax='100'></div></div></div>");
					}
				});
			}
		},

		circularBar: function() {

			var $track_color = '#ecf0f6';
			var $track_line_cap = 'square';

			if ( $template_var == 'template-esports' ) {
				$track_line_cap = 'round';
			}

			if ( $template_var == 'template-football' ) {
				$track_color = '#4e4d73';
			} else if ( $template_var == 'template-esports' ) {
				$track_color = '#4b3b60';
			}

			if ( $circular_bar.exists() ) {
				$circular_bar.easyPieChart({
					barColor: $color_primary,
					trackColor: $track_color,
					lineCap: $track_line_cap,
					lineWidth: 8,
					size: 90,
					scaleLength: 0
				});
			}

		},

		circleProgress: function() {
			var circle_progress = $('.js-alc-circle-progress');

			if ( circle_progress.exists() ) {
				circle_progress.each(function() {
					var circle_progress_el = $(this);
					var valueEl = circle_progress_el.attr('data-value');
					var percentSymbol = circle_progress_el.attr('data-percent-symbol');
					var hideValue = circle_progress_el.attr('data-hide-value');

					circle_progress_el.circleProgress({
						max: 100,
						value: valueEl,
						textFormat: function() {
							if (hideValue) {
								return '';
							}
							if (percentSymbol) {
								return (this.value !== undefined ? this.value : this.indeterminateText) + '%';
							}
							return (this.value !== undefined ? this.value : this.indeterminateText);
						},
					});
				});
			}

		},

		MagnificPopup: function(){

			if ($mp_single.exists() ) {
				// Single Image
				$('.mp_single-img').magnificPopup({
					type:'image',
					removalDelay: 300,

					gallery:{
						enabled:false
					},
					mainClass: 'mfp-fade',
					autoFocusLast: false,

				});
			}

			if ($mp_gallery.exists() ) {
				// Multiple Images (gallery)
				$('.mp_gallery').magnificPopup({
					type:'image',
					removalDelay: 300,

					gallery:{
						enabled:true
					},
					mainClass: 'mfp-fade',
					autoFocusLast: false,

				});
			}

			if ($mp_iframe.exists() ) {
				// Iframe (video, maps)
				$('.mp_iframe').magnificPopup({
					type:'iframe',
					removalDelay: 300,
					mainClass: 'mfp-fade',
					autoFocusLast: false,

					patterns: {
						youtube: {
							index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

							id: 'v=', // String that splits URL in a two parts, second part should be %id%
							// Or null - full URL will be returned
							// Or a function that should return %id%, for example:
							// id: function(url) { return 'parsed id'; }

							src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
						},
						vimeo: {
							index: 'vimeo.com/',
							id: '/',
							src: '//player.vimeo.com/video/%id%?autoplay=1'
						},
						twitch: {
							index: 'twitch.tv/',
							id: 'videos/',
							src: '//player.twitch.tv/?autoplay=false&video=v%id%'
						},
						gmaps: {
							index: '//maps.google.',
							src: '%id%&output=embed'
						}
					},

					srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".

				});
			}
		},


		isotope: function() {

			if ( $post_fitRows.exists() ) {
				var $grid = $post_fitRows.imagesLoaded( function() {
					// init Isotope after all images have loaded
					$grid.isotope({
						itemSelector: '.post-grid__item',
						layoutMode: 'fitRows',
						masonry: {
							columnWidth: '.post-grid__item'
						}
					});
				});
			}

			if ( $post_masonry.exists() ) {
				var masonry = $post_masonry.imagesLoaded( function() {
					// init Isotope after all images have loaded
					masonry.isotope({
						itemSelector: '.post-grid__item',
						layoutMode: 'masonry',
						percentPosition: true,
						masonry: {
							columnWidth: '.post-grid__item'
						}
					});
				});
			}

			if ( $team_album.exists() ) {
				var masonryTeamAlbum = $team_album.imagesLoaded( function() {
					// init Isotope after all images have loaded
					masonryTeamAlbum.isotope({
						itemSelector: '.album__item',
						layoutMode: 'masonry',
						percentPosition: true,
						masonry: {
							columnWidth: '.album__item',
						}
					});
				});
			}


			if ( $post_masonry_filter.exists() ) {
				var masonry_grid = $post_masonry_filter.imagesLoaded( function() {

					var $filter = $('.js-category-filter');

					// init Isotope after all images have loaded
					masonry_grid.isotope({
						filter      : '*',
						itemSelector: '.post-grid__item',
						layoutMode: 'masonry',
						masonry: {
							columnWidth: '.post-grid__item'
						}
					});

					// filter items on button click
					$filter.on( 'click', 'button', function() {
						var filterValue = $(this).attr('data-filter');
						$filter.find('button').removeClass('category-filter__link--active');
						$(this).addClass('category-filter__link--active');
						masonry_grid.isotope({
							filter: filterValue
						});
					});
				});
			}

			if (posts_filterable.exists() ) {
				var isotopeGrid = posts_filterable.imagesLoaded(function () {

					var filter = $('.js-isotope-filter');

					// init Isotope after all images have loaded
					isotopeGrid.isotope({
						filter: '*',
						itemSelector: '.post-grid__item',
						layoutMode: 'fitRows',
						masonry: {
							columnWidth: '.post-grid__item'
						}
					});

					// filter items on button click
					filter.on('click', '.isotope-filter__link', function () {
						var filterValue = $(this).attr('data-filter');
						filter.find('.isotope-filter__link').removeClass('isotope-filter__link--active');
						$(this).addClass('isotope-filter__link--active');
						isotopeGrid.isotope({
							filter: filterValue
						});
					});
				});
			}

		},


		SlickCarousel: function() {

			// Featured News Carousel
			if ( $slick_featured_carousel.exists() ) {

				$slick_featured_carousel.slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 5000,
					centerMode: true,
					centerPadding: 0,
					rows: 0,

					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
								centerMode: true,
								centerPadding: 0,
								slidesToShow: 3
							}
						},
						{
							breakpoint: 768,
							settings: {
								arrows: false,
								centerMode: true,
								centerPadding: 0,
								slidesToShow: 2
							}
						},
						{
							breakpoint: 480,
							settings: {
								arrows: false,
								centerMode: true,
								centerPadding: 0,
								slidesToShow: 1,
								dots: true
							}
						}
					]
				});

			}

			// Video Slideshow Carousel
			if ( $slick_video_carousel.exists() ) {

				$slick_video_carousel.slick({
					slidesToShow: 4,
					slidesToScroll: 1,
					infinite: true,
					autoplay: false,
					autoplaySpeed: 5000,
					rows: 0,

					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
								slidesToShow: 3,
								infinite: true
							}
						},
						{
							breakpoint: 768,
							settings: {
								arrows: false,
								slidesToShow: 2,
								infinite: false
							}
						},
						{
							breakpoint: 480,
							settings: {
								arrows: false,
								slidesToShow: 1,
								infinite: false
							}
						}
					]
				});

				// Filter by Categories
				var filtered = false;

				$('.category-filter--carousel .category-filter__link').on('click', function(e){
					var category = $(this).data('category');
					$slick_video_carousel.slick('slickUnfilter');
					$slick_video_carousel.slick('slickFilter', '.' + category);
					$('.category-filter--carousel .category-filter__link--active').removeClass('category-filter__link--active');
					$(this).addClass('category-filter__link--active');
					e.preventDefault();
				});

				// Reset Filter (Show All posts)
				$('.category-filter--carousel .category-filter__link--reset').on('click', function(e){
					$slick_video_carousel.slick('slickUnfilter');
					$('.category-filter--carousel .category-filter__link').removeClass('category-filter__link--active');
					$(this).addClass('category-filter__link--active');
					filtered = false;
					e.preventDefault();
				});

			}

			// Featured News Slider
			if ( $slick_featured_slider.exists() ) {

				$slick_featured_slider.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 5000,
					rows: 0,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								arrows: false
							}
						}
					]
				});


				// Featured Posts (.posts--slider-featured)

				// Filter by Categories
				var filtered2 = false;

				$('.category-filter--featured .category-filter__link').on('click', function(e){
					var category = $(this).data('category');
					$slick_featured_slider.slick('slickUnfilter');
					$slick_featured_slider.slick('slickFilter', '.' + category);
					$('.category-filter--featured .category-filter__link--active').removeClass('category-filter__link--active');
					$(this).addClass('category-filter__link--active');
					e.preventDefault();
				});

				// Reset Filter (Show All posts)
				$('.category-filter--featured .category-filter__link--reset').on('click', function(e){
					$slick_featured_slider.slick('slickUnfilter');
					$('.category-filter--featured .category-filter__link').removeClass('category-filter__link--active');
					$(this).addClass('category-filter__link--active');
					filtered2 = false;
					e.preventDefault();
				});
			}


			// Team Roster Carousel
			if ( $slick_team_roster.exists() ) {

				$slick_team_roster.slick({
					centerMode: true,
					centerPadding: 0,
					slidesToShow: 3,
					autoplay: true,
					autoplaySpeed: 3000,
					rows: 0,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								arrows: false,
								centerMode: true,
								centerPadding: 0,
								slidesToShow: 3
							}
						},
						{
							breakpoint: 480,
							settings: {
								arrows: false,
								centerMode: true,
								centerPadding: 0,
								slidesToShow: 1
							}
						}
					]
				});
			}


			// Awards Carousel
			if ( $slick_awards.exists() ) {

				if ( $template_var == 'template-football' ) {

					// Filter by Categories
					var filtered3 = false;

					$('.awards-filter .awards-filter__link').on('click', function(e){
						var category = $(this).data('category');
						$slick_awards.slick('slickUnfilter');
						$slick_awards.slick('slickFilter', '.' + category);
						$('.awards-filter .awards-filter__link--active').removeClass('awards-filter__link--active');
						$(this).addClass('awards-filter__link--active');
						e.preventDefault();
					});

					// Reset Filter (Show All posts)
					$('.awards-filter .awards-filter__link--reset').on('click', function(e){
						$slick_awards.slick('slickUnfilter');
						$('.awards-filter .awards-filter__link').removeClass('awards-filter__link--active');
						$(this).addClass('awards-filter__link--active');
						filtered3 = false;
						e.preventDefault();
					});


					// Awards Slider
					$slick_awards.slick({
						slidesToShow: 1,
						arrows: false,
						dots: true,
						vertical: true,
						verticalSwiping: true,
						rows: 0,
					});


				} else {

					$slick_awards.slick({
						slidesToShow: 1,
						arrows: true,
						dots: true,
						rows: 0,
						responsive: [
							{
								breakpoint: 768,
								settings: {
									arrows: false
								}
							}
						]
					});
				}

			}


			// Player Info
			if ( $slick_player_info.exists() ) {

				$(window).on('load', function() {
					$slick_player_info.slick({
						slidesToShow: 3,
						arrows: false,
						dots: false,
						infinite: false,
						variableWidth: true,
						rows: 0,
						responsive: [
							{
								breakpoint: 992,
								settings: {
									slidesToShow: 1,
									dots: true,
									variableWidth: false
								}
							}
						]
					});
				});
			}


			// Products Slider
			if ( $slick_product.exists() ) {

				if ( $template_var == 'template-esports' ) {

					var $status = $('.product__slider-paging');
					$slick_product.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
						//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
						var i = (currentSlide ? currentSlide : 0) + 1;
						$status.text(i + ' / ' + slick.slideCount);
					});

					$slick_product.slick({
						slidesToShow: 1,
						dots: false,
						rows: 0,
						appendArrows: $('.js-product__slider-arrows')
					});

				} else {
					$slick_product.slick({
						slidesToShow: 1,
						arrows: false,
						dots: true,
						rows: 0,
					});
				}
			}


			// Products Slider - Thumbs
			if ( $slick_product_soccer.exists() ) {

				$slick_product_soccer.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					rows: 0,
					asNavFor: '.product__slider-thumbs'
				});
				$('.product__slider-thumbs').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					asNavFor: $slick_product_soccer,
					focusOnSelect: true,
					vertical: true,
					rows: 0,
				});
			}


			// Team Roster - Card Slider
			if ( $slick_team_roster_card.exists() ) {

				$slick_team_roster_card.slick({
					slidesToShow: 1,
					arrows: true,
					dots: false,
					rows: 0,
					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
							}
						}
					]
				});
			}


			// Team Roster - with Nav
			if ( $slick_team_roster_with_nav.exists() ) {

				$slick_team_roster_with_nav.slick({
					slidesToShow: 1,
					arrows: true,
					dots: false,
					speed: 600,
					rows: 0,
					cssEase: 'cubic-bezier(0.23, 1, 0.32, 1)',
					asNavFor: '.js-team-roster-nav',
					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
							}
						}
					]
				});

				$('.js-team-roster-nav').slick({
					slidesToShow: 6,
					slidesToScroll: 1,
					asNavFor: $slick_team_roster_with_nav,
					focusOnSelect: true,
					arrows: false,
					rows: 0,
					responsive: [
						{
							breakpoint: 1200,
							settings: {
								slidesToShow: 5,
							}
						},
						{
							breakpoint: 992,
							settings: {
								slidesToShow: 4,
							}
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 3,
							}
						},
						{
							breakpoint: 540,
							settings: {
								slidesToShow: 2,
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
							}
						}
					]
				});
			}


			// Team Roster - Case Slider
			if ( $slick_team_roster_case.exists() ) {

				$slick_team_roster_case.slick({
					slidesToShow: 3,
					autoplay: true,
					autoplaySpeed: 3000,
					arrows: true,
					dots: false,
					rows: 0,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								arrows: false,
								slidesToShow: 2
							}
						},
						{
							breakpoint: 480,
							settings: {
								arrows: false,
								slidesToShow: 1
							}
						}
					]
				});
			}


			// Team - Tournaments Carousel
			if ( $slick_team_tournaments_carousel.exists() ) {

				$slick_team_tournaments_carousel.slick({
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
					autoplay: false,
					autoplaySpeed: 5000,
					rows: 0,
					appendArrows: $('.js-team-tournaments-carousel-header'),

					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
								slidesToShow: 2,
								infinite: true
							}
						},
						{
							breakpoint: 768,
							settings: {
								arrows: false,
								slidesToShow: 2,
								infinite: false
							}
						},
						{
							breakpoint: 576,
							settings: {
								arrows: false,
								slidesToShow: 1,
								infinite: false
							}
						}
					]
				});
			}


			// Player - Related News
			if ( $slick_player_news_carousel.exists() ) {

				$slick_player_news_carousel.slick({
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
					autoplay: false,
					autoplaySpeed: 5000,
					rows: 0,
					appendArrows: $('.js-posts-carousel-header'),

					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
								slidesToShow: 2,
								infinite: true
							}
						},
						{
							breakpoint: 768,
							settings: {
								arrows: false,
								slidesToShow: 2,
								infinite: false
							}
						},
						{
							breakpoint: 576,
							settings: {
								arrows: false,
								slidesToShow: 1,
								infinite: false
							}
						}
					]
				});
			}


			// Achievement Carousel
			if ( $slick_player_achievements_carousel.exists() ) {

				$slick_player_achievements_carousel.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					infinite: true,
					autoplay: true,
					autoplaySpeed: 5000,
					rows: 0,
					appendArrows: $('.js-alc-achievements-carousel-header')
				});
			}


			// Hero Slider
			if ( $slick_hero_slider.exists() ) {

				$slick_hero_slider.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					fade: true,
					autoplay: true,
					autoplaySpeed: 8000,
					rows: 0,
					asNavFor: '.hero-slider-thumbs',

					responsive: [
						{
							breakpoint: 992,
							settings: {
								fade: false,
							}
						}
					]
				});
				$('.hero-slider-thumbs').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					asNavFor: $slick_hero_slider,
					focusOnSelect: true,
					rows: 0,
				});
			}



			// Hero Slider - Football
			if ( $slick_hero_slider_football.exists() ) {

				$slick_hero_slider_football.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					fade: true,
					dots: true,
					autoplay: true,
					autoplaySpeed: 8000,
					adaptiveHeight: true,
					rows: 0,
				});
			}


			// Featured News Slider - variable width
			if ( $slick_slider_var_width.exists() ) {

				$slick_slider_var_width.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: false,
					autoplaySpeed: 5000,
					adaptiveHeight: true,
					rows: 0,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								arrows: false
							}
						}
					]
				});
			}


			// Team Roster - Grid Small Slider
			if ( $slick_team_roster_grid_slider.exists() ) {

				$slick_team_roster_grid_slider.slick({
					slidesToShow: 3,
					autoplay: false,
					autoplaySpeed: 3000,
					arrows: true,
					dots: false,
					infinite: false,
					rows: 0,
					responsive: [
						{
							breakpoint: 1199,
							settings: {
								slidesToShow: 2
							}
						},
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 1
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1
							}
						}
					]
				});
			}


			// Team Cards Compact - Slider
			if ( $slick_team_roster_card_compact.exists() ) {

				$slick_team_roster_card_compact.slick({
					slidesToShow: 3,
					autoplay: false,
					autoplaySpeed: 3000,
					arrows: true,
					dots: false,
					infinite: false,
					rows: 0,
					responsive: [
						{
							breakpoint: 1199,
							settings: {
								slidesToShow: 2
							}
						},
						{
							breakpoint: 768,
							settings: {
								arrows: false,
								slidesToShow: 1
							}
						},
						{
							breakpoint: 480,
							settings: {
								arrows: false,
								slidesToShow: 1
							}
						}
					]
				});
			}



			// Team - Video Player
			if ( $slick_team_video_player.exists() ) {

				$slick_team_video_player.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					fade: true,
					rows: 0,
					asNavFor: '.alc-video-player__video-list'
				});

				$('.alc-video-player__video-list').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 8000,
					asNavFor: $slick_team_video_player,
					dots: false,
					appendArrows: $('.js-alc-video-player__header'),
					focusOnSelect: true,
					centerMode: false,
					vertical: true,
					verticalSwiping: true,
					rows: 0,
					responsive: [
						{
							breakpoint: 1200,
							settings: {
								slidesToShow: 2
							}
						},
						{
							breakpoint: 992,
							settings: {
								arrows: false,
								slidesToShow: 3
							}
						}
					]
				});

			}


			// Event Carousel
			if ( $slick_event_carousel.exists() ) {

				$slick_event_carousel.slick({
					slidesToShow: 1,
					arrows: true,
					dots: true,
					rows: 0,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								arrows: false
							}
						}
					]
				});

			}

		},

		swiperSlider: function() {

			var swiperCareerStatsSlider = $('.js-alc-career-stats-slides');
			var swiperLeaguePlayersSlider = $('.js-alc-league-players-slides');
			var swiperTeamStatsSlider = $('.js-alc-team-stats-slides');
			var swiperSponsorsSlider = $('.js-alc-sponsors-slider');
			var swiperPlayerAwardsSlider = $('.js-alc-player-awards-slider');
			var swiperPlayerCardsSlider = $('.js-alc-player-cards-slider');
			var swiperScoreboardSlider = $('.js-alc-events-scoreboard-slider');
			var swiperRelatedProductsSlider = $('.js-alc-related-products-slides');
			var swiperProductSlider = $('.js-alc-product-single-slides');
			var swiperHeroGallerySlider = $('.js-alc-hero-gallery__slides');
			var swiperPlayerNewsSlider = $('.js-alc-post-news-slides');
			var swiperHeroCarouselSlider = $('.js-alc-hero-carousel__slides');

			// Player News - Hockey
			if ( swiperPlayerNewsSlider.exists() ) {

				var swiperHeroCarousel = new Swiper('.js-alc-hero-carousel__slides', {
					slidesPerView: 1,
					loop: true,
					spaceBetween: 0,
					navigation: {
						nextEl: '.js-alc-hero-carousel-button-next',
						prevEl: '.js-alc-hero-carousel-button-prev',
					},
					breakpoints: {
						768: {
							slidesPerView: 2,
						},
						992: {
							slidesPerView: 3,
						},
						1920: {
							slidesPerView: 4,
						},
					}
				});
			}

			// Player News - Hockey
			if ( swiperPlayerNewsSlider.exists() ) {

				var swiperPlayerNews = new Swiper('.js-alc-post-news-slides', {
					slidesPerView: 1,
					loop: true,
					spaceBetween: 0,
					navigation: {
						nextEl: '.js-alc-post-news-button-next',
						prevEl: '.js-alc-post-news-button-prev',
					},
				});
			}

			// Hero Gallery - Hockey
			if ( swiperHeroGallerySlider.exists() ) {

				var swiperHeroGalleryNav = new Swiper('.js-alc-hero-gallery__thumbs', {
					loop: true,
					slidesPerView: 3,
					direction: 'vertical',
					spaceBetween: 0,
					breakpoints: {
						576: {
							slidesPerView: 3,
						},
						768: {
							slidesPerView: 4,
						},
						992: {
							slidesPerView: 5,
						},
					}
				});

				var swiperHeroGallery = new Swiper('.js-alc-hero-gallery__slides', {
					loop: true,
					slidesPerView: 1,
					spaceBetween: 0,
					autoplay: {
						delay: 6000,
						disableOnInteraction: true,
					},
					thumbs: {
						autoScrollOffset: 0,
						swiper: swiperHeroGalleryNav,
					},
				});
			}

			// Single Product - Hockey
			if ( swiperProductSlider.exists() ) {

				var swiperProductNav = new Swiper('.js-alc-product-single-slides-nav', {
					slidesPerView: 8,
					direction: 'vertical',
					spaceBetween: 12,
					autoHeight: true,
				});

				var swiperProduct = new Swiper('.js-alc-product-single-slides', {
					slidesPerView: 1,
					thumbs: {
						swiper: swiperProductNav,
					},
				});
			}

			// Related Products - Hockey
			if ( swiperRelatedProductsSlider.exists() ) {

				var swiperRelatedProducts = new Swiper('.js-alc-related-products-slides', {
					slidesPerView: 1,
					loop: true,
					spaceBetween: 16,
					navigation: {
						nextEl: '.js-alc-related-products-button-next',
						prevEl: '.js-alc-related-products-button-prev',
					},
					breakpoints: {
						768: {
							slidesPerView: 2,
						},
						992: {
							slidesPerView: 3,
						},
						1200: {
							slidesPerView: 4,
						},
					}
				});
			}

			// Sponsors Slider - Hockey
			if ( swiperSponsorsSlider.exists() ) {

				var swiperSponsors = new Swiper('.js-alc-sponsors-slider', {
					slidesPerView: 1,
					loop: true,
					spaceBetween: 20,
					navigation: {
						nextEl: '.js-alc-sponsors-slider__button-next',
						prevEl: '.js-alc-sponsors-slider__button-prev',
					},
					breakpoints: {
						480: {
							slidesPerView: 2,
							spaceBetween: 10
						},
						768: {
							slidesPerView: 3,
							spaceBetween: 20
						},
						992: {
							slidesPerView: 2,
							spaceBetween: 10
						},
						1200: {
							slidesPerView: 3,
							spaceBetween: 20
						},
					}
				});
			}

			// Career Stats Slider - Hockey
			if ( swiperCareerStatsSlider.exists() ) {

				var swiperCareerStatsNav = new Swiper('.js-alc-career-stats-nav', {
					slidesPerView: 4,
					freeMode: true,
					watchSlidesProgress: true,
				});
				var swiperCareerStatsSlides = new Swiper('.js-alc-career-stats-slides', {
					spaceBetween: 10,
					navigation: {
						nextEl: ".js-alc-career-stats-button-next",
						prevEl: ".js-alc-career-stats-button-prev",
					},
					thumbs: {
						swiper: swiperCareerStatsNav,
					},
				});
			}

			// League Players Slider - Hockey
			if ( swiperLeaguePlayersSlider.exists() ) {

				var swiperLeaguePlayersNav = new Swiper('.js-alc-league-players-nav', {
					slidesPerView: 4,
					freeMode: true,
					watchSlidesProgress: true,
				});
				var swiperLeaguePlayersSlides = new Swiper('.js-alc-league-players-slides', {
					spaceBetween: 10,
					navigation: {
						nextEl: ".js-alc-league-players-button-next",
						prevEl: ".js-alc-league-players-button-prev",
					},
					thumbs: {
						swiper: swiperLeaguePlayersNav,
					},
				});
			}

			// Team Stats Slider - Hockey
			if ( swiperTeamStatsSlider.exists() ) {

				var swiperTeamStatsNav = new Swiper('.js-alc-team-stats-nav', {
					slidesPerView: 1,
					freeMode: true,
					watchSlidesProgress: true,
					effect: 'fade',
					fadeEffect: {
						crossFade: true
					},
				});
				var swiperTeamStatsSlides = new Swiper('.js-alc-team-stats-slides', {
					spaceBetween: 10,
					navigation: {
						nextEl: ".js-alc-team-stats-button-next",
						prevEl: ".js-alc-team-stats-button-prev",
					},
					thumbs: {
						swiper: swiperTeamStatsNav,
					},
				});
			}

			// Player Awards Slider - Hockey
			if ( swiperPlayerAwardsSlider.exists() ) {

				var swiperPlayerAwards = new Swiper('.js-alc-player-awards-slider', {
					slidesPerView: 1,
					direction: 'vertical',
					loop: true,
					autoplay: true,
					navigation: {
						nextEl: '.js-alc-player-awards-slider__button-next',
						prevEl: '.js-alc-player-awards-slider__button-prev',
					}
				});
			}

			// Player Cards Slider - Hockey
			if ( swiperPlayerCardsSlider.exists() ) {

				var swiperPlayerCards = new Swiper('.js-alc-player-cards-slider', {
					slidesPerView: 3,
					direction: 'horizontal',
					loop: false,
					autoplay: false,
					spaceBetween: 16,
					navigation: {
						nextEl: '.js-alc-player-cards-slider__button-next',
						prevEl: '.js-alc-player-cards-slider__button-prev',
					},
					breakpoints: {
						320: {
							slidesPerView: 1
						},
						768: {
							slidesPerView: 2
						},
						992: {
							slidesPerView: 2
						},
						1200: {
							slidesPerView: 3
						},
					}
				});
			}

			// Scoreboard Slider - Hockey
			if ( swiperScoreboardSlider.exists() ) {

				var swiperScoreboard = new Swiper('.js-alc-events-scoreboard-slider', {
					slidesPerView: 1,
					loop: false,
					spaceBetween: 0,
					navigation: {
						nextEl: '.alc-events-scoreboard__button-next',
						prevEl: '.alc-events-scoreboard__button-prev',
					},
					breakpoints: {
						480: {
							slidesPerView: 1,
						},
						730: {
							slidesPerView: 2,
						},
						992: {
							slidesPerView: 2,
						},
						1200: {
							slidesPerView: 2,
						},
						1330: {
							slidesPerView: 3,
						},
						1680: {
							slidesPerView: 4,
						},
						1900: {
							slidesPerView: 5,
						},
					}
				});
			}

		},


		ContentFilter: function() {

			if ( $content_filter.exists() ) {
				$('.content-filter__toggle').on('click', function(e){
					e.preventDefault();
					$(this).toggleClass('content-filter__toggle--active');
					$('.content-filter__list').toggleClass('content-filter__list--expanded');
				});
			}

		},


		ChartJs: function() {

			if ( $chart_games_history.exists() ) {
				var data = {
					type: 'bar',
					data: {
						labels: ["2010", "2011", "2012", "2013", "2014", "2015"],
						datasets: [{
							label: 'WON',
							data: [70, 67, 78, 87, 69, 76],
							backgroundColor: "#ffdc11",
						}, {
							label: 'LOST',
							data: [40, 45, 36, 28, 43, 35],
							backgroundColor: "#ff8429"
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(49,64,75,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								barThickness: 14,
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctx = $chart_games_history;
				var gamesHistory = new Chart(ctx, data);
				document.getElementById('gamesHistoryLegend').innerHTML = gamesHistory.generateLegend();
			}



			if ( $chart_games_history_soccer.exists() ) {
				var data2 = {
					type: 'bar',
					data: {
						labels: ["2010", "2011", "2012", "2013", "2014", "2015"],
						datasets: [{
							label: 'WON',
							data: [40, 45, 36, 28, 42, 35],
							backgroundColor: "#c2ff1f",
						}, {
							label: 'LOST',
							data: [70, 67, 75, 86, 68, 76],
							backgroundColor: "#38a9ff",
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(49,64,75,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								stacked: true,
								barThickness: 34,
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								stacked: true,
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
									padding: 20,
								}
							}]
						}
					},
				};

				var ctx2 = $chart_games_history_soccer;
				var gamesHistory2 = new Chart(ctx2, data2);
				document.getElementById('gamesHistoryLegendSoccer').innerHTML = gamesHistory2.generateLegend();
			}



			if ( $chart_games_history_esports.exists() ) {
				var dataEsports = {
					type: 'bar',
					data: {
						labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
						datasets: [{
							label: 'WON',
							data: [680, 528, 592, 616, 720, 496, 640, 568, 600, 598, 607, 558],
							backgroundColor: "#00ff5b",
						}, {
							label: 'LOST',
							data: [610, 487, 569, 671, 622, 554, 610, 514, 674, 487, 657, 511],
							backgroundColor: "#6a3bc0"
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#a59cae',
								fontFamily: 'Open Sans, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "#6a3bc0",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Open Sans, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								barThickness: 14,
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#9a9da2',
									fontFamily: 'Open Sans, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								gridLines: {
									display: false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#9a9da2',
									fontFamily: 'Open Sans, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctxEsports = $chart_games_history_esports;
				var gamesHistoryEsports = new Chart(ctxEsports, dataEsports);
				document.getElementById('gamesHistoryLegendEsports').innerHTML = gamesHistoryEsports.generateLegend();
			}


			var chart_goals_history_hockey = $('#js-alc-goals-history-hockey');

			if ( chart_goals_history_hockey.exists() ) {
				var dataGoalsHockey = {
					type: 'horizontalBar',
					data: {
						labels: ["2021 - 20", "2020 - 19", "2019 - 18", "2018 - 17"],
						datasets: [{
							label: 'Goals Made',
							data: [69, 112, 55, 88],
							backgroundColor: "#6c4dee",
						}, {
							label: 'Goals Againts',
							data: [34, 52, 64, 24],
							backgroundColor: "#00e6e3"
						}]
					},
					options: {
						legend: {
							display: false,
						},
						tooltips: {
							backgroundColor: "#37353c",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Ubuntu, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
							callbacks: {
								title: function() {} // removes title inside label
							}
						},
						scales: {
							xAxes: [{
								gridLines: {
									color: "#e7e6ee",
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#37353c',
									fontFamily: 'Ubuntu, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								barThickness: 14,
								gridLines: {
									display: false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#37353c',
									fontFamily: 'Ubuntu, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctxGoalsHockey = chart_goals_history_hockey;
				var goalsHistoryHockey = new Chart(ctxGoalsHockey, dataGoalsHockey);
				document.getElementById('js-alc-goals-history-legend-hockey').innerHTML = goalsHistoryHockey.generateLegend();
			}



			if ( $chart_points_history.exists() ) {
				var data3 = {
					type: 'line',
					data: {
						labels: ["Aug 8", "Aug 15", "Aug 21", "Aug 28", "Sep 4", "Sep 19", "Sep 26", "Oct 3", "Oct 10", "Oct 16", "Oct 23", "Oct 30"],
						datasets: [{
							label: 'POINTS',
							fill: false,
							lineTension: 0,
							backgroundColor: "#ffdc11",
							borderWidth: 2,
							borderColor: "#ffdc11",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 0,
							pointBorderWidth: 0,
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#ffcc00",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [104, 70, 115, 105, 45, 94, 84, 100, 82, 125, 78, 86, 110],
							spanGaps: false,
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(49,64,75,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								gridLines: {
									color: "#e4e7ed",
								},
								ticks: {
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctx3 = $chart_points_history;
				var gamesHistory3 = new Chart(ctx3, data3);
			}


			if ( $chart_points_history_soccer.exists() ) {
				var data4 = {
					type: 'line',
					data: {
						labels: ["Aug 8", "Aug 15", "Aug 21", "Aug 28", "Sep 4", "Sep 19", "Sep 26", "Oct 3", "Oct 10", "Oct 16", "Oct 23", "Oct 30"],
						datasets: [{
							label: 'PREV RECORD',
							fill: true,
							lineTension: 0.5,
							backgroundColor: "rgba(194,255,31,0.8)",
							borderWidth: 2,
							borderColor: "#c2ff1f",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 0,
							pointBorderWidth: 0,
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#c2ff1f",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [52, 71, 40, 53, 62, 40, 44, 58, 38, 64, 46, 70, 75],
							spanGaps: false,
						}, {
							label: 'THIS YEAR',
							fill: true,
							lineTension: 0.5,
							backgroundColor: "rgba(56,169,255,0.8)",
							borderWidth: 2,
							borderColor: "#38a9ff",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 0,
							pointBorderWidth: 0,
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#38a9ff",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [71, 52, 87, 53, 17, 62, 56, 37, 91, 48, 75, 64, 78],
							spanGaps: false,
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(49,64,75,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								gridLines: {
									color: "#e4e7ed",
								},
								ticks: {
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctx4 = $chart_points_history_soccer;
				var gamesHistory4 = new Chart(ctx4, data4);

				document.getElementById('gamesPoinstsLegendSoccer').innerHTML = gamesHistory4.generateLegend();
			}


			if ( $chart_points_history_football.exists() ) {
				var data5 = {
					type: 'line',
					data: {
						labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
						datasets: [{
							label: '2016',
							fill: false,
							lineTension: 0,
							borderWidth: 4,
							backgroundColor: "#3ffeca",
							borderColor: "#3ffeca",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 5,
							pointBorderWidth: 5,
							pointBackgroundColor: "#fff",
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#3ffeca",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [115, 145, 110, 125, 165, 140, 145, 110, 145, 125, 135, 190],
							spanGaps: false,
						}, {
							label: '2015',
							fill: false,
							lineTension: 0,
							borderWidth: 4,
							backgroundColor: "#9e69ee",
							borderColor: "#9e69ee",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 5,
							pointBorderWidth: 5,
							pointBackgroundColor: "#fff",
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#9e69ee",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [95, 65, 130, 75, 113, 85, 102, 85, 103, 58, 48, 138],
							spanGaps: false,
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(50,49,80,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								gridLines: {
									color: "#3c3b5b",
									zeroLineColor: '#3c3b5b'
								},
								ticks: {
									fontColor: '#9e9caa',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								gridLines: {
									color: "#3c3b5b",
									zeroLineColor: '#3c3b5b'
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#9e9caa',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctx5 = $chart_points_history_football;
				var gamesHistory5 = new Chart(ctx5, data5);

				document.getElementById('gamesPoinstsLegendFootball').innerHTML = gamesHistory5.generateLegend();
			}


			if ( $chart_yearly_history_esports.exists() ) {
				var data6 = {
					type: 'line',
					data: {
						labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
						datasets: [{
							label: 'Kills',
							fill: false,
							lineTension: 0,
							borderWidth: 4,
							backgroundColor: "#00fe5b",
							borderColor: "#00fe5b",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 5,
							pointBorderWidth: 5,
							pointBackgroundColor: "#fff",
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#00fe5b",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [311, 447, 290, 367, 562, 420, 468, 290, 444, 343, 420, 592],
							spanGaps: false,
						},
						{
							label: 'Deaths',
							fill: false,
							lineTension: 0,
							borderWidth: 4,
							backgroundColor: "#6a3bc0",
							borderColor: "#6a3bc0",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 5,
							pointBorderWidth: 5,
							pointBackgroundColor: "#fff",
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#6a3bc0",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [287, 145, 388, 189, 373, 231, 320, 225, 311, 109, 62, 346],
							spanGaps: false,
						},
						{
							label: 'Assists',
							fill: false,
							lineTension: 0,
							borderWidth: 4,
							backgroundColor: "#fff600",
							borderColor: "#fff600",
							borderCapStyle: 'butt',
							borderDashOffset: 0.0,
							borderJoinStyle: 'bevel',
							pointRadius: 5,
							pointBorderWidth: 5,
							pointBackgroundColor: "#fff",
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "#fff",
							pointHoverBorderColor: "#fff600",
							pointHoverBorderWidth: 5,
							pointHitRadius: 10,
							data: [613, 503, 527, 693, 636, 619, 539, 542, 364, 497, 693, 675],
							spanGaps: false,
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Open Sans, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(0,0,0,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Open Sans, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								gridLines: {
									color: "#3f3251",
									zeroLineColor: '#3f3251'
								},
								ticks: {
									fontColor: '#8c8297',
									fontFamily: 'Open Sans, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								gridLines: {
									color: "#3f3251",
									zeroLineColor: '#3f3251'
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#8c8297',
									fontFamily: 'Open Sans, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctx6 = $chart_yearly_history_esports;
				var gamesHistory6 = new Chart(ctx6, data6);

				document.getElementById('gamesYearlyLegendEsports').innerHTML = gamesHistory6.generateLegend();
			}


			if ( $chart_horizontal_bars_esports.exists() ) {
				var data7 = {
					type: 'horizontalBar',
					data: {
						labels: ["2018", "2017", "2016", "2015", "2014"],
						datasets: [{
							label: 'Assists',
							data: [85, 32, 63, 76, 45],
							backgroundColor: "#fff600",
							hoverBackgroundColor: "#fff600",
							fill: true,
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Open Sans, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(0,0,0,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Open Sans, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								gridLines: {
									display: false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#8c8297',
									fontFamily: 'Open Sans, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								barThickness: 24,
								gridLines: {
									display: false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#8c8297',
									fontFamily: 'Open Sans, sans-serif',
									fontSize: 10,
									padding: 20,
								}
							}]
						}
					},
				};

				var ctx7 = $chart_horizontal_bars_esports;
				var gamesHistory7 = new Chart(ctx7, data7);
			}


			if ( $chart_doughnut_esports.exists() ) {

				Chart.pluginService.register({
					beforeDraw: function (chart) {
						if (chart.config.options.elements.center) {
							//Get ctx from string
							var ctx = chart.chart.ctx;

							//Get options from the center object in options
							var centerConfig = chart.config.options.elements.center;
							var fontStyle = centerConfig.fontStyle || 'Roboto Condensed, sans-serif';
							var txt = centerConfig.text;
							var color = centerConfig.color || '#fff';
							var fontWeight = centerConfig.fontWeight || 'bold';
							var sidePadding = centerConfig.sidePadding || 20;
							var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2);
							//Start with a base font of 56px
							ctx.font = "56px " + fontStyle;

							//Get the width of the string and also the width of the element minus 10 to give it 5px side padding
							var stringWidth = ctx.measureText(txt).width;
							var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

							// Find out how much the font can grow in width.
							var widthRatio = elementWidth / stringWidth;
							var newFontSize = Math.floor(30 * widthRatio);
							var elementHeight = (chart.innerRadius * 2);

							// Pick a new font size so it will not be larger than the height of label.
							var fontSizeToUse = Math.min(newFontSize, elementHeight);

							//Set font settings to draw it correctly.
							ctx.textAlign = 'center';
							ctx.textBaseline = 'middle';
							var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
							var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
							ctx.font = fontWeight + " " + fontSizeToUse + "px " + fontStyle;
							ctx.fillStyle = color;

							//Draw text in center
							ctx.fillText(txt, centerX, centerY);
						}
					}
				});

				var data8 = {
					type: 'doughnut',
					data: {
						labels: ["Statistic 01", "Statistic 02", "Statistic 03"],
						datasets: [{
							label: 'Assists',
							data: [118, 120, 55],
							backgroundColor: ["#6a3bc0", "#00ff5b", "#fff600"],
							hoverBackgroundColor: ["#6a3bc0", "#00ff5b", "#fff600"],
							borderWidth: 0
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 12,
								fontColor: '#fff',
								fontStyle: 'bold',
								fontFamily: 'Roboto Condensed, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(0,0,0,0.8)",
							bodyFontFamily: 'Roboto Condensed, sans-serif',
							bodyFontSize: 10,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						cutoutPercentage: 90,
						elements: {
							center: {
								text: '293K',
								fontStyle: 'Roboto Condensed, sans-serif', // Default is Arial
								sidePadding: 20,
								fontWeight: 'bold',
							}
						}
					}
				};

				var ctx8 = $chart_doughnut_esports;
				var gamesHistory8 = new Chart(ctx8, data8);

				document.getElementById('chartDoughnutLegendEsports').innerHTML = gamesHistory8.generateLegend();
			}

			if ( $chart_doughnut_soccer1.exists() ) {

				Chart.pluginService.register({
					beforeDraw: function (chart) {
						if (chart.config.options.elements.center) {
							//Get ctx from string
							var ctx = chart.chart.ctx;

							//Get options from the center object in options
							var centerConfig = chart.config.options.elements.center;
							var fontStyle = centerConfig.fontStyle || 'Montserrat, sans-serif';
							var txt = centerConfig.text;
							var color = centerConfig.color || '#31404b';
							var fontWeight = centerConfig.fontWeight || 'bold';
							var sidePadding = centerConfig.sidePadding || 20;
							var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2);
							//Start with a base font of 56px
							ctx.font = "76px " + fontStyle;

							//Get the width of the string and also the width of the element minus 10 to give it 5px side padding
							var stringWidth = ctx.measureText(txt).width;
							var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

							// Find out how much the font can grow in width.
							var widthRatio = elementWidth / stringWidth;
							var newFontSize = Math.floor(30 * widthRatio);
							var elementHeight = (chart.innerRadius * 2);

							// Pick a new font size so it will not be larger than the height of label.
							var fontSizeToUse = Math.min(newFontSize, elementHeight);

							//Set font settings to draw it correctly.
							ctx.textAlign = 'center';
							ctx.textBaseline = 'middle';
							var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
							var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
							ctx.font = fontWeight + " " + fontSizeToUse + "px " + fontStyle;
							ctx.fillStyle = color;

							//Draw text in center
							ctx.fillText(txt, centerX, centerY);
						}
					}
				});

				var dataSoccer1 = {
					type: 'doughnut',
					data: {
						labels: ["On Goal", "Woodwork", "Off Goal"],
						datasets: [{
							label: 'Total Shots',
							data: [14, 3, 8],
							backgroundColor: ["#00e3d0", "#ffd200", "#ff5d0e"],
							hoverBackgroundColor: ["#00e3d0", "#ffd200", "#ff5d0e"],
							borderWidth: 0
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 12,
								fontColor: '#fff',
								fontStyle: 'bold',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(0,0,0,0.8)",
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 10,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						cutoutPercentage: 90,
						elements: {
							center: {
								text: '25',
								fontStyle: 'Montserrat, sans-serif', // Default is Arial
								sidePadding: 20,
								fontWeight: 'bold',
							}
						}
					}
				};

				var ctxdoughnut_soccer_1 = $chart_doughnut_soccer1;
				var gamesHistorySoccer1 = new Chart(ctxdoughnut_soccer_1, dataSoccer1);

				document.getElementById('chartDoughnutLegendSoccer1').innerHTML = gamesHistorySoccer1.generateLegend();
			}

			if ( $chart_doughnut_soccer2.exists() ) {

				Chart.pluginService.register({
					beforeDraw: function (chart) {
						if (chart.config.options.elements.center) {
							//Get ctx from string
							var ctx = chart.chart.ctx;

							//Get options from the center object in options
							var centerConfig = chart.config.options.elements.center;
							var fontStyle = centerConfig.fontStyle || 'Montserrat, sans-serif';
							var txt = centerConfig.text;
							var color = centerConfig.color || '#31404b';
							var fontWeight = centerConfig.fontWeight || 'bold';
							var sidePadding = centerConfig.sidePadding || 20;
							var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2);
							//Start with a base font of 56px
							ctx.font = "76px " + fontStyle;

							//Get the width of the string and also the width of the element minus 10 to give it 5px side padding
							var stringWidth = ctx.measureText(txt).width;
							var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

							// Find out how much the font can grow in width.
							var widthRatio = elementWidth / stringWidth;
							var newFontSize = Math.floor(30 * widthRatio);
							var elementHeight = (chart.innerRadius * 2);

							// Pick a new font size so it will not be larger than the height of label.
							var fontSizeToUse = Math.min(newFontSize, elementHeight);

							//Set font settings to draw it correctly.
							ctx.textAlign = 'center';
							ctx.textBaseline = 'middle';
							var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
							var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
							ctx.font = fontWeight + " " + fontSizeToUse + "px " + fontStyle;
							ctx.fillStyle = color;

							//Draw text in center
							ctx.fillText(txt, centerX, centerY);
						}
					}
				});

				var dataSoccer2 = {
					type: 'doughnut',
					data: {
						labels: ["On Goal", "Woodwork", "Off Goal"],
						datasets: [{
							label: 'Total Shots',
							data: [6, 1, 9],
							backgroundColor: ["#00e3d0", "#ffd200", "#ff5d0e"],
							hoverBackgroundColor: ["#00e3d0", "#ffd200", "#ff5d0e"],
							borderWidth: 0
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 12,
								fontColor: '#fff',
								fontStyle: 'bold',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(0,0,0,0.8)",
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 10,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						cutoutPercentage: 90,
						elements: {
							center: {
								text: '16',
								fontStyle: 'Montserrat, sans-serif', // Default is Arial
								sidePadding: 20,
								fontWeight: 'bold',
							}
						}
					}
				};

				var ctxdoughnut_soccer_2 = $chart_doughnut_soccer2;
				var gamesHistorySoccer2 = new Chart(ctxdoughnut_soccer_2, dataSoccer2);

				document.getElementById('chartDoughnutLegendSoccer2').innerHTML = gamesHistorySoccer2.generateLegend();
			}


			if ( $chart_player_stats.exists() ) {
				var radar_data = {
					type: 'radar',
					data: {
						labels: ["OFF", "AST", "3PT", "2PT", "DEF"],
						datasets: [{
							data: [72, 25, 40, 72, 50],
							backgroundColor: "rgba(255,220,17,0.8)",
							borderColor: "#ffdc11",
							pointBorderColor: "rgba(255,255,255,0)",
							pointBackgroundColor: "rgba(255,255,255,0)",
							pointBorderWidth: 0
						}]
					},
					options: {
						legend: {
							display: false,
						},
						tooltips: {
							backgroundColor: "rgba(49,64,75,0.8)",
							titleFontSize: 10,
							titleSpacing: 2,
							titleMarginBottom: 4,
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scale: {
							angleLines: {
								color: "rgba(255,255,255,0.025)",
							},
							pointLabels: {
								fontColor: "#9a9da2",
								fontFamily: 'Montserrat, sans-serif',
							},
							ticks: {
								beginAtZero: true,
								display: false,
							},
							gridLines: {
								color: "rgba(255,255,255,0.05)",
								lineWidth: 2,
							},
							labels: {
								display: false
							}
						}
					},
				};

				var ctx_player_stats = $chart_player_stats;
				var playerInfo = new Chart(ctx_player_stats, radar_data);
			}


			if ( $chart_event_cols.exists() ) {
				var data9 = {
					type: 'bar',
					data: {
						labels: ["1st Q", "2nd Q", "3rd Q", "4th Q"],
						datasets: [{
							label: 'ALC',
							data: [24, 15, 20, 25],
							backgroundColor: "#ffdc11",
						}, {
							label: 'SHR',
							data: [21, 23, 17, 21],
							backgroundColor: "#0cb2e2"
						}]
					},
					options: {
						legend: {
							display: false,
							labels: {
								boxWidth: 8,
								fontSize: 9,
								fontColor: '#31404b',
								fontFamily: 'Montserrat, sans-serif',
								padding: 20,
							}
						},
						tooltips: {
							backgroundColor: "rgba(49,64,75,0.8)",
							titleFontSize: 0,
							titleSpacing: 0,
							titleMarginBottom: 0,
							bodyFontFamily: 'Montserrat, sans-serif',
							bodyFontSize: 9,
							bodySpacing: 0,
							cornerRadius: 2,
							xPadding: 10,
							displayColors: false,
						},
						scales: {
							xAxes: [{
								barThickness: 14,
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
								},
							}],
							yAxes: [{
								gridLines: {
									display:false,
									color: "rgba(255,255,255,0)",
								},
								ticks: {
									beginAtZero: true,
									fontColor: '#9a9da2',
									fontFamily: 'Montserrat, sans-serif',
									fontSize: 10,
									padding: 20
								}
							}]
						}
					},
				};

				var ctx9 = $chart_event_cols;
				var gamesHistory9 = new Chart(ctx9, data9);
				document.getElementById('gamesHistoryLegend').innerHTML = gamesHistory9.generateLegend();
			}

		},

		RangeSlider: function(){

			if ( $range_slider.exists() ) {

				var rangeSlider = document.getElementById('slider-range');

				noUiSlider.create(rangeSlider, {
					start: [ 0, 350 ],
					connect: true,
					range: {
						'min': [ 0 ],
						'max': [ 450 ]
					}
				});

				var snapValues = [
					document.getElementById('slider-range-value-min'),
					document.getElementById('slider-range-value-max')
				];

				rangeSlider.noUiSlider.on('update', function( values, handle ) {
					snapValues[handle].innerHTML = values[handle];
				});
			}

		},


		GoogleMap: function() {

			// Google Map
			if ( $gmap.exists()) {
				$gmap.each(function() {

					var $elem = $(this),
							mapAddress        = $elem.attr('data-map-address') ? $elem.attr('data-map-address') : "New York, USA",
							mapZoom           = $elem.attr('data-map-zoom') ? $elem.attr('data-map-zoom') : "15",
							mapStyle          = $elem.attr('data-map-style'),
							mapTypeControl    = $elem.attr('data-map-type-control') ? $elem.attr('data-map-type-control') : true,
							streetViewControl = $elem.attr('data-street-view-control') ? $elem.attr('data-street-view-control') : true,
							fullscreenControl = $elem.attr('data-fullscreen-control') ? $elem.attr('data-fullscreen-control') : true,
							zoomControl       = $elem.attr('data-zoom-control') ? $elem.attr('data-zoom-control') : true;

					var styles_output = [];

					// Skins
					if ( mapStyle == 'default') {
						// Skin: Default
						styles_output = [{"featureType": "administrative.country", "elementType": "geometry", "stylers": [{"visibility": "simplified"}, {"hue": "#ff0000"}]}];

					} else if ( mapStyle == 'light-dream') {
						// Skin: Light Dream
						styles_output = [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994			},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{				"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}];

					} else if ( mapStyle == 'shades-of-grey') {
						// Skin: Shades of Grey
						styles_output = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];

					} else if ( mapStyle == 'blue-water') {
						// Skin: Blue Water
						styles_output = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}];

					} else if ( mapStyle == 'midnight-commander') {
						// Skin: Blue Water
						styles_output = [
							{
									"featureType": "all",
									"elementType": "labels.text.fill",
									"stylers": [
											{
													"color": "#ffffff"
											}
									]
							},
							{
									"featureType": "all",
									"elementType": "labels.text.stroke",
									"stylers": [
											{
													"color": "#000000"
											},
											{
													"lightness": 13
											}
									]
							},
							{
									"featureType": "administrative",
									"elementType": "geometry.fill",
									"stylers": [
											{
													"color": "#000000"
											}
									]
							},
							{
									"featureType": "administrative",
									"elementType": "geometry.stroke",
									"stylers": [
											{
													"color": "#144b53"
											},
											{
													"lightness": 14
											},
											{
													"weight": 1.4
											}
									]
							},
							{
									"featureType": "landscape",
									"elementType": "all",
									"stylers": [
											{
													"color": "#08304b"
											}
									]
							},
							{
									"featureType": "poi",
									"elementType": "geometry",
									"stylers": [
											{
													"color": "#0c4152"
											},
											{
													"lightness": 5
											}
									]
							},
							{
									"featureType": "road.highway",
									"elementType": "geometry.fill",
									"stylers": [
											{
													"color": "#000000"
											}
									]
							},
							{
									"featureType": "road.highway",
									"elementType": "geometry.stroke",
									"stylers": [
											{
													"color": "#0b434f"
											},
											{
													"lightness": 25
											}
									]
							},
							{
									"featureType": "road.arterial",
									"elementType": "geometry.fill",
									"stylers": [
											{
													"color": "#000000"
											}
									]
							},
							{
									"featureType": "road.arterial",
									"elementType": "geometry.stroke",
									"stylers": [
											{
													"color": "#0b3d51"
											},
											{
													"lightness": 16
											}
									]
							},
							{
									"featureType": "road.local",
									"elementType": "geometry",
									"stylers": [
											{
													"color": "#000000"
											}
									]
							},
							{
									"featureType": "transit",
									"elementType": "all",
									"stylers": [
											{
													"color": "#146474"
											}
									]
							},
							{
									"featureType": "water",
									"elementType": "all",
									"stylers": [
											{
													"color": "#021019"
											}
									]
							}
					];

					} else {
						// Skin: Ultra Light
						styles_output = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];
					}

					var mapTypeControlBoolean = mapTypeControl == 'false' ? false : true;
					var streetViewControlBoolean = streetViewControl == 'false' ? false : true;
					var fullscreenControlBoolean = fullscreenControl == 'false' ? false : true;
					var zoomControlBoolean = zoomControl == 'false' ? false : true;

					$elem.gmap3({
						zoom: Number(mapZoom),
						mapTypeId : google.maps.MapTypeId.ROADMAP,
						scrollwheel: false,
						address: mapAddress,
						styles: styles_output,
						mapTypeControl: mapTypeControlBoolean,
						streetViewControl: streetViewControlBoolean,
						fullscreenControl: fullscreenControlBoolean,
						zoomControl: zoomControlBoolean
					})
					.marker({
						address: mapAddress,
					});
				});
			}
		},


		miscScripts: function() {
			// Tooltips
			$('[data-toggle="tooltip"]').tooltip();

			[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
				new SelectFx(el);
			} );

			// Marquee
			if ( $marquee.exists() ) {
				$marquee.marquee({
					allowCss3Support: true,
					pauseOnHover: true
				});
			}

			// Game Result Widget - Expand
			if ( $template_var == 'template-football' ) {

				// Switch Toggle
			$('.widget-game-result').each(function() {
				var $this = $(this);

				if ( $this.find('.switch-toggle').exists() ) {
					var txtHolder = $this.find('.switch__label-txt');
					var txtExpand = txtHolder.data('text-expand');
					var txtShrink = txtHolder.data('text-shrink');

					$this.on('change', function(){
						$this.find('.widget-game-result__extra-stats').toggleClass('active');
						txtHolder.text(function(i, text){
							return text === txtShrink ? txtExpand : txtShrink;
						});
					});
				}
			});

			} else {

				// Switch Toggle (Basketball, Soccer)
				$('.widget-game-result .js-switch-toggle').each(function() {
					$(this).on('click', function(){

						var text_expand = $(this).find('.js-switch-txt').data('text-expand');
						var text_shrink = $(this).find('.js-switch-txt').data('text-shrink');

						$(this).parent().parent().find('.widget-game-result__extra-stats').toggleClass('active');
						$(this).find('.js-switch-txt').text(function(i, text){
							return text === text_shrink ? text_expand : text_shrink;
						});
					});
				});

			}

			// Duotone effect
			$('.effect-duotone').prepend('<div class="effect-duotone__layer"><div class="effect-duotone__layer-inner"></div></div>');

		},

	};

	$(document).on('ready', function() {
		Core.initialize();
	});

})(jQuery);

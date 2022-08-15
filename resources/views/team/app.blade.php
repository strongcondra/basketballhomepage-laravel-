@extends('layouts.app')
@section('content')

		<!-- Page Heading
		================================================== -->
		<div class="page-heading">
			<div class="container">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<h1 class="page-heading__title">@yield('subtitle')</h1>
						<ol class="page-heading__breadcrumb breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">The Team</a></li>
							<li class="breadcrumb-item"><a href="team-overview.html">Team</a></li>
							<li class="breadcrumb-item active" aria-current="page">@yield('subtitle')</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- Page Heading / End -->
		

		
		<!-- Team Pages Filter -->
		<!-- <nav class="content-filter">
			<div class="container">
				<a href="#" class="content-filter__toggle"></a>
				<ul class="content-filter__list">
					<li class="content-filter__item @yield('roster')"><a href="{{route('roster')}}" class="content-filter__link"><small>The Team</small>Roster</a></li>
					<li class="content-filter__item @yield('result')"><a href="{{route('result')}}" class="content-filter__link"><small>The Team</small>Latest Result</a></li>
					<li class="content-filter__item @yield('schedule')"><a href="{{route('schedule')}}" class="content-filter__link"><small>The Team</small>Schedule</a></li>
				</ul>
			</div>
		</nav> -->
		<!-- Team Pages Filter / End -->

        @yield('rosterContent')
@endsection
@extends('team.app')
@section('subtitle','Latest Result')
@section('result','content-filter__item--active')
@section('rosterContent')
    <div class="site-content">
        <div class="container">
            				<!-- Team Roster: Slider -->

				<!-- Team Roster: Slider / End -->
                    <div class='col-md-12'>
		
				<!-- Team Latest Results -->
				<div class="card card--has-table">
					<div class="card__header card__header--has-btn">
						<h4>Latest Results</h4>
						<!-- Result Filter -->
						<ul class="team-result-filter">
							<li class="team-result-filter__item">
								<select class="form-control input-xs">
									<option>Playoffs 2016</option>
									<option>Playoffs 2015</option>
									<option>Playoffs 2014</option>
								</select>
							</li>
							<li class="team-result-filter__item">
								<select class="form-control input-xs">
									<option>December 2016</option>
									<option>November 2016</option>
									<option>October 2016</option>
									<option>September 2016</option>
									<option>August 2016</option>
									<option>July 2016</option>
									<option>June 2016</option>
									<option>May 2016</option>
									<option>April 2016</option>
									<option>March 2016</option>
									<option>February 2016</option>
									<option>January 2016</option>
								</select>
							</li>
							<li class="team-result-filter__item">
								<select class="form-control input-xs">
									<option>Ascending</option>
									<option>Descending</option>
								</select>
							</li>
							<li class="team-result-filter__item">
								<button type="submit" class="btn btn-default btn-outline btn-xs card-header__button">Filter Latest Results</button>
							</li>
						</ul>
						<!-- Result Filter / End -->
					</div>
					<div class="card__content">
						<div class="table-responsive">
							<table class="table table-hover team-result">
								<thead>
									<tr>
										<th class="team-result__date">Date</th>
										<th class="team-result__vs">Versus</th>
										<th class="team-result__score">Score</th>
										<th class="team-result__points">HI Points</th>
										<th class="team-result__rebounds">HI Rebounds</th>
										<th class="team-result__assists">HI Assists</th>
										<th class="team-result__steals">HI Steals</th>
									</tr>
								</thead>
								<tbody>
                                    @if($resultData)
                                        @foreach($resultData as $resultItem)
                                            <tr>
                                                <td class="team-result__date">{{$resultItem->play_date}}</td>
                                                <td class="team-result__vs">
                                                    <div class="team-meta">
                                                        <figure class="team-meta__logo">
                                                            <img src="assets/images/samples/logos/sharks_shield.png" alt="">
                                                        </figure>
                                                        <div class="team-meta__info">
                                                            <h6 class="team-meta__name">{{$resultItem->versus}}</h6>
                                                            <span class="team-meta__place">Marine College</span>
                                                        </div>
                                                    </div>   
                                                </td> 
                                                <td class="team-result__score"><span class="team-result__game">W</span> {{$resultItem->score_in}}-{{$resultItem->score_out}}</td>
                                                <td class="team-result__points">{{$resultItem->h_point}}</td>
                                                <td class="team-result__rebounds">{{$resultItem->h_rebound}}</td>
                                                <td class="team-result__assists">{{$resultItem->h_assist}}</td>
                                                <td class="team-result__steals">{{$resultItem->h_steal}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Team Latest Results / End -->
                    </div>
        </div>
    </div>
@endsection
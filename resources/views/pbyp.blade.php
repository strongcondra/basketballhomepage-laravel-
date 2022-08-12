@extends('layouts.app')
@section('content')
    @if($resultData)

    @foreach($resultData as $resultItem)

    <div class="alc-event-header alc-event-header--layout-1">
        <div class="alc-event-header__top">
            <div class="container">
                <h6 class="title" id='competition'>{{$resultItem->competition}}</h6>
                <span class="subtitle" id='subtitle'>{{$resultItem->play_date}}</span>
            </div>
        </div>
        <div class="alc-event-header__content">
            <div class="container">
                <div class="alc-event-header__content-inner">
    
                    <!-- Competitors -->
                    <div class="alc-event-competitors">
                        <!-- Team #1 -->
                        <div id='in_class' class="alc-event-competitors__item alc-event-team @if($resultItem->score_in>$resultItem->score_out)alc-event-team--winner @endif">
                            <div class="alc-event-team__details">
                                <h4 class="alc-event-team__name">Alchemists</h4>
                                <div class="alc-event-team__info">Elric Bros School</div>
                            </div>
                            <figure class="alc-event-team__logo">
                                <img src="assets/images/samples/logos/alchemists-n.png" alt="">
                            </figure>
                            <div class="alc-event-team__score-wrap">
                                <div class="alc-event-team__score" id="score_in">{{$resultItem->score_in}}</div>
                            </div>
                        </div>
                        <!-- Team #1 / End -->
    
                        <!-- Team #2 -->
                        <div id='out_class' class="alc-event-competitors__item alc-event-team @if($resultItem->score_in<$resultItem->score_out)alc-event-team--winner @endif">
                            <div class="alc-event-team__details">
                                <h4 class="alc-event-team__name">{{$resultItem->versus}}</h4>
                                <div class="alc-event-team__info">{{$resultItem->company}}</div>
                            </div>
                            <figure class="alc-event-team__logo">
                                <img src="uploads/{{$resultItem->logopath}}" alt="">
                            </figure>
                            <div class="alc-event-team__score-wrap">
                                <div class="alc-event-team__score" id="score_out">{{$resultItem->score_out}}</div>
                            </div>
                        </div>
                        <!-- Team #2 / End -->
    
                        <!-- Scoreboard -->
                        <div class="alc-event-competitors__status">
                            <div class="table-responsive">
                                <table class="table table__cell-center table-wrap-bordered table-thead-color">
                                    <thead>
                                        <tr>
                                            <th>Scoreboard</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>T</th>
                                        </tr>
                                    </thead>
                                    <tbody id='result_table'>
                                        <tr>
                                            <th>Alchemists</th>
                                            <td>{{$resultItem->first_score_in}}</td>
                                            <td>{{$resultItem->second_score_in}}</td>
                                            <td>{{$resultItem->third_score_in}}</td>
                                            <td>{{$resultItem->fourth_score_in}}</td>
                                            <td>{{$resultItem->score_in}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{$resultItem->versus}}</th>
                                            <td>{{$resultItem->first_score_out}}</td>
                                            <td>{{$resultItem->second_score_out}}</td>
                                            <td>{{$resultItem->third_score_out}}</td>
                                            <td>{{$resultItem->fourth_score_out}}</td>
                                            <td>{{$resultItem->score_out}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Scoreboard / End -->
    
                    </div>
                    <!-- Competitors / End -->
    
                </div>
            </div>
            <div class="alc-event-header__content-team-decor alc-event-header__content-team-decor--color1"></div>
            <div class="alc-event-header__content-team-decor alc-event-header__content-team-decor--color2"></div>
        </div>
    </div>
   
    @endforeach
    @endif
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
                <div class="form-group">
                    <label for="play_year">Play Date<abbr class="required" title="required">*</abbr></label>

                    <select name="pbypDate" id="pbypDate" class="form-control" onchange='changeDate()'>
                        @if($dateData)
                            @foreach ($dateData as $dateItem)
                                <option value='{{$dateItem->play_date}}'>{{$dateItem->play_date}}</option>
                                
                            @endforeach
                        @endif
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    </select>
                </div>
				<div class="row">
		
					<!-- Content -->
					<div class="content col-lg-12">
		
						<!-- Play-by-Play Tabbed Content -->
						<div class="alc-tabs card card--has-table">
		
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified alc-nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" href="#tab1" role="tab" data-toggle="tab">
										<small class="d-none d-sm-block">Play-by-play</small>
										<span class="d-block d-sm-none">1st Q</span>
										<span class="d-none d-sm-block">1st Quarter</span>
									</a></li>
								<li class="nav-item">
									<a class="nav-link " href="#tab2" role="tab" data-toggle="tab">
										<small class="d-none d-sm-block">Play-by-play</small>
										<span class="d-block d-sm-none">2nd Q</span>
										<span class="d-none d-sm-block">2nd Quarter</span>
									</a></li>
								<li class="nav-item">
									<a class="nav-link " href="#tab3" role="tab" data-toggle="tab">
										<small class="d-none d-sm-block">Play-by-play</small>
										<span class="d-block d-sm-none">3rd Q</span>
										<span class="d-none d-sm-block">3rd Quarter</span>
									</a></li>
								<li class="nav-item">
									<a class="nav-link " href="#tab4" role="tab" data-toggle="tab">
										<small class="d-none d-sm-block">Play-by-play</small>
										<span class="d-block d-sm-none">4th Q</span>
										<span class="d-none d-sm-block">4th Quarter</span>
									</a></li>
							</ul>

 
                                <!-- Tab panes -->
                                <div class="tab-content card__content">
            
                                    <!-- Tab: #0 -->
                                    <div role="tabpanel" class="tab-pane active" id="tab1">
            
                                    <div class="table-responsive">
                                        <table class="table table-hover alc-table-stats alc-table-stats__play-by-play">
                                            <thead>
                                                <tr>
                                                    <th class="alc-align-start">Time</th>
                                                    <th class="alc-align-start">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody id="first_table">
                                                @if($firstData)
                                                @foreach($firstData as $firstItem)
                                                <tr>
                                                    <td class="alc-align-start alc-highlight-sm alc-highlight">{{$firstItem->news_time}}</td>
                                                    <td class="alc-align-start alc-highlight">
                                                        <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">
                                                        {{$firstItem->team}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
            
                                    </div>
                                    <!-- Tab: #0 / End -->
                                    <!-- Tab: #1 -->
                                    <div role="tabpanel" class="tab-pane " id="tab2">
            
                                    <div class="table-responsive">
                                        <table class="table table-hover alc-table-stats alc-table-stats__play-by-play">
                                            <thead>
                                                <tr>
                                                    <th class="alc-align-start">Time</th>
                                                    <th class="alc-align-start">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody id="second_table">
                                                @if($secondData)
                                                @foreach($secondData as $secondItem)
                                                <tr>
                                                    <td class="alc-align-start alc-highlight-sm alc-highlight">{{$secondItem->news_time}}</td>
                                                    <td class="alc-align-start alc-highlight">
                                                        <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">
                                                        {{$secondItem->team}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
            
                                    </div>
                                    <!-- Tab: #1 / End -->
                                    <!-- Tab: #2 -->
                                    <div role="tabpanel" class="tab-pane " id="tab3">
            
                                    <div class="table-responsive">
                                        <table class="table table-hover alc-table-stats alc-table-stats__play-by-play">
                                            <thead>
                                                <tr>
                                                    <th class="alc-align-start">Time</th>
                                                    <th class="alc-align-start">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody id="third_table">
                                                @if($thirdData)
                                                @foreach($thirdData as $thirdItem)
                                                <tr>
                                                    <td class="alc-align-start alc-highlight-sm alc-highlight">{{$thirdItem->news_time}}</td>
                                                    <td class="alc-align-start alc-highlight">
                                                        <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">
                                                        {{$thirdItem->team}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
            
                                    </div>
                                    <!-- Tab: #2 / End -->
                                    <!-- Tab: #3 -->
                                    <div role="tabpanel" class="tab-pane " id="tab4">
            
                                    <div class="table-responsive">
                                        <table class="table table-hover alc-table-stats alc-table-stats__play-by-play">
                                            <thead>
                                                <tr>
                                                    <th class="alc-align-start">Time</th>
                                                    <th class="alc-align-start">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody id="fourth_table">
                                                @if($fourthData)
                                                @foreach($fourthData as $fourthItem)
                                                <tr>
                                                    <td class="alc-align-start alc-highlight-sm alc-highlight">{{$fourthItem->news_time}}</td>
                                                    <td class="alc-align-start alc-highlight">
                                                        <img src="assets/images/samples/logos/alchemists_b_shield.png" alt="" class="alc-team-img">
                                                        {{$fourthItem->team}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
            
                                    </div>
                                    <!-- Tab: #3 / End -->
            
                                </div>
		
						</div>
						<!-- Play-by-Play Tabbed Content / End -->
		
					</div>
					<!-- Content / End -->

				</div>
			</div>
		</div>
		
		<!-- Content / End -->
@endsection
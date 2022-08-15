@extends('team.app')
@section('subtitle','Tournament')
@section('competitions', 'active')
@section('rosterContent')

		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
				<!-- Tournament Brackets -->
				<div class="card card--clean">
					<header class="card__header">
						<h4>Tournament Bracket</h4>
					</header>

                    @if (isset($tournamentData))
					<div class="card__content">		
						<!-- Brackets -->
						<div class="tournament-bracket">
							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Quarterfinals</h6>
								<ul class="tournament-bracket__list">
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
                                                    
													<tr class="tournament-bracket__team @if ($tournamentData->score11 > $tournamentData->score12)tournament-bracket__team--winner @endif">

														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/pirates_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team11}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">United States</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score11}}</span>
														</td>
													</tr>
													<tr class="tournament-bracket__team  @if ($tournamentData->score12 > $tournamentData->score11)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/icarus_wings_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team12}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">Portugal</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score12}}</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team @if ($tournamentData->score13 > $tournamentData->score14)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/draconians_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team13}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">Russia</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score13}}</span>
														</td>
													</tr>
													<tr class="tournament-bracket__team @if ($tournamentData->score14 > $tournamentData->score13)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/red_wings_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team14}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">Canada</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score14}}</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team @if ($tournamentData->score15 > $tournamentData->score16)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/sharks_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team15}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">South Korea</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score15}}</span>
														</td>
													</tr>
													<tr class="tournament-bracket__team @if ($tournamentData->score16 > $tournamentData->score15)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/alchemists_b_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team16}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">United States</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score16}}</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team @if ($tournamentData->score17> $tournamentData->score18)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/ocean_kings_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team17}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">Japan</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score17}}</span>
														</td>
													</tr>
													<tr class="tournament-bracket__team @if ($tournamentData->score18 > $tournamentData->score17)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/lucky_clovers_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team18}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">Ireland</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score18}}</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								</ul>
							</div>
							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Semifinals</h6>
								<ul class="tournament-bracket__list">
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team @if ($tournamentData->score21 > $tournamentData->score22)tournament-bracket__team--winner @endif ">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/pirates_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team21}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">United States</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score21}}</span>
														</td>
													</tr>
													<tr class="tournament-bracket__team @if ($tournamentData->score22 > $tournamentData->score21)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/red_wings_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team22}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">Canada</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score22}}</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team @if ($tournamentData->score23 > $tournamentData->score24)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/alchemists_b_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team23}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">United States</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score23}}</span>
														</td>
													</tr>
													<tr class="tournament-bracket__team @if ($tournamentData->score24 > $tournamentData->score23)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/ocean_kings_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team24}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">Japan</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score24}}</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								</ul>
							</div>
							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Finals</h6>
								<ul class="tournament-bracket__list">
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team @if ($tournamentData->score31 > $tournamentData->score32)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/pirates_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team31}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">United States</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score31}}</span>
														</td>
													</tr>
													<tr class="tournament-bracket__team @if ($tournamentData->score32 > $tournamentData->score31)tournament-bracket__team--winner @endif">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="assets/images/samples/logos/alchemists_b_shield.png" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team32}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">United States</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number">{{$tournamentData->score32}}</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								</ul>
							</div>
							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Champion</h6>
								<ul class="tournament-bracket__list">
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team tournament-bracket__team--champ">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
                                                                <h6 class="tournament-bracket__team-name text-truncate">{{$tournamentData->team41}}</h6>
																<span class="tournament-bracket__team-desc text-truncate">United States</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<div class="tournament-bracket__number tournament-bracket__champ-icon">
																<svg role="img" class="df-icon df-icon--trophy">
																	<use xlink:href="assets/images/icons.svg#trophy"/>
																</svg>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								</ul>
							</div>
		
						</div>
						<!-- Brackets -->
		
					</div>
                    @endif
				</div>
				<!-- Tournament Brackets / End -->
		
			</div>
		</div>
		
		<!-- Content / End -->
		
        
@endsection
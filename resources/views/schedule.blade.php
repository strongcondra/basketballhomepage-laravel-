@extends('team.app')
@section('subtitle','Schedule')
@section('schedule','content-filter__item--active')
@section('rosterContent')
    <div class="site-content">
        <div class="container">
            				<!-- Team Roster: Slider -->

				<!-- Team Roster: Slider / End -->
                    <div class='col-md-12'>
                        <!-- Schedule & Tickets -->
                        <div class="card card--has-table">
                            <div class="card__header">
                                <h4>Schedule</h4>
                            </div>
                            <div class="card__content">
                                <div class="table-responsive">
                                    <table class="table table-hover team-schedule team-schedule--full">
                                        <thead>
                                            <tr>
                                                <th class="team-schedule__date">Date</th>
                                                <th class="team-schedule__versus">Versus</th>
                                                <th class="team-schedule__time">Time</th>
                                                <th class="team-schedule__compet">Competition</th>
                                                <th class="team-schedule__venue">Venue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($scheduleData)
                                                @foreach($scheduleData as $scheduleItem)
                                                    <tr>
                                                        <td class="team-schedule__date">{{$scheduleItem->play_date}}</td>
                                                        <td class="team-schedule__versus">
                                                            <div class="team-meta">
                                                                <figure class="team-meta__logo">
                                                                    <img src="assets/images/samples/logos/lucky_clovers_shield.png" alt="">
                                                                </figure>
                                                                <div class="team-meta__info">
                                                                    <h6 class="team-meta__name">{{$scheduleItem->versus}}</h6>
                                                                    <span class="team-meta__place">St. Patrick’s Institute</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="team-schedule__time">{{$scheduleItem->play_time}}</td>
                                                        <td class="team-schedule__compet">{{$scheduleItem->competition}}</td>
                                                        <td class="team-schedule__venue">{{$scheduleItem->venue}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Schedule & Tickets / End -->
                    </div>
        </div>
    </div>
@endsection
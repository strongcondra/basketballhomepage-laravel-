@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6"> 
                    <form action="{{route('insertSchedule')}}" class="df-checkout" method="POST">
                    @csrf                       
                    <!-- Billing Details -->
                    <div class="card card--lg">
                        <div class="card__header">
                            <h4>Add Schedule</h4>
                        </div>
                        <div class="card__content">
                            <div class="df-billing-fields">
                                <div class="form-group">
                                    <label for="play_year">Competition Name<abbr class="required" title="required">*</abbr></label>
                                    <select name="competition" id="competition" class="form-control">
                                        @if($competitionData)
                                            @foreach ($competitionData as $competitionItem)
                                                <option value='{{$competitionItem->title}}'>{{$competitionItem->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>  
                                </div> 
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label for="playDate">Date</label>
                                            <input type="Date" name="playDate" id="playDate" class="form-control">
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label for="playTime">Time</label>
                                            <input type="time" name="playTime" id="playTime" class="form-control">
                                        </div>                                        
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="play_year">Versus Name<abbr class="required" title="required">*</abbr></label>

                                    <select name="versus" id="versus" class="form-control">
                                        @if($teamData)
                                            @foreach ($teamData as $teamItem)
                                                <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="play_year">Venue<abbr class="required" title="required">*</abbr></label>

                                    <select name="venue" id="venue" class="form-control">
                                        @if($venueData)
                                            @foreach ($venueData as $venueItem)
                                                <option value='{{$venueItem->venue}}'>{{$venueItem->venue}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Billing Details / End -->
                    <div class="place-order">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="insertSchedule" id="insertSchedule" value="Add Schedule!">
                    </div>
                    </form>
                </div>
                <div class='col-lg-6'>
                    <div class="card card--has-table">
                        <div class="card__header">
                            <h4>Schedule</h4>
                        </div>
                        <div class="card__content">
                        <div class="table-responsive">
                        <table class="table table-hover team-schedule team-schedule--full">
                            <thead>
                                <tr>
                                    <th class="team-schedule__date">No</th>
                                    <th class="team-schedule__versus">Competition</th>
                                    <th class="team-schedule__tickets">Date</th>
                                    <th class="team-schedule__date">Time</th>
                                    <th class="team-schedule__versus">Versus</th>
                                    <th class="team-schedule__versus">Venue</th>
                                    <th class="team-schedule__tickets">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                @if($scheduleData)
                                    <input type='hidden' value='{{$i=0}}'>
                                    @foreach($scheduleData as $scheduleItem)
                                        <input type='hidden' value='{{$i=$i+1}}'>
                                        <tr>
                                            <td class="team-schedule__date">{{$i}}</td>
                                            <td class="team-schedule__versus">
                                                {{$scheduleItem->competition}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$scheduleItem->play_date}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$scheduleItem->play_time}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$scheduleItem->versus}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$scheduleItem->venue}}
                                            </td>
                                            <td class="team-schedule__tickets">
                                                <a href="#" class="btn btn-xs btn-danger btn-block " onclick="removeSchedule({{$scheduleItem->id}})">
                                                    Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"> 
                    <form action="{{route('insertResult')}}" class="df-checkout" method="POST">
                    @csrf                       
                    <!-- Billing Details -->
                    <div class="card card--lg">
                        <div class="card__header">
                            <h4>Add Result</h4>
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
                                    </div>
                                </div> 
                                <div class='row'>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playDate">First Quarter</label>
                                            <input type="number" name="firstScoreIn" id="firstScoreIn" class="form-control">
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playTime">Second Quarter</label>
                                            <input type="number" name="secondScoreIn" id="ScondscoreIn" class="form-control">
                                        </div>                                        
                                    </div>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playTime">Third Quarter</label>
                                            <input type="number" name="thirdScoreIn" id="thirdScoreIn" class="form-control">
                                        </div>                                        
                                    </div>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playTime">Fourth Quarter</label>
                                            <input type="number" name="fourthScoreIn" id="fourthScoreIn" class="form-control">
                                        </div>                                        
                                    </div>
                                </div> 
                                <div class='row'>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playDate">First Quarter</label>
                                            <input type="number" name="firstScoreOut" id="firstScoreOut" class="form-control">
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playTime">Second Quarter</label>
                                            <input type="number" name="secondScoreOut" id="ScondscoreOut" class="form-control">
                                        </div>                                        
                                    </div>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playTime">Third Quarter</label>
                                            <input type="number" name="thirdScoreOut" id="thirdScoreOut" class="form-control">
                                        </div>                                        
                                    </div>
                                    <div class='col-md-3'>
                                        <div class="form-group">
                                            <label for="playTime">Fourth Quarter</label>
                                            <input type="number" name="fourthScoreOut" id="fourthScoreOut" class="form-control">
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
                                    <label for="play_year">Hight Points<abbr class="required" title="required">*</abbr></label>

                                    <select name="hPoint" id="hPoint" class="form-control">
                                        @if($memberData)
                                            @foreach ($memberData as $memberItem)
                                                <option value='{{$memberItem->name}},{{$memberItem->no}}'>{{$memberItem->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="play_year">Hight Reboud<abbr class="required" title="required">*</abbr></label>

                                    <select name="hRebound" id="hRebound" class="form-control">
                                        @if($memberData)
                                            @foreach ($memberData as $memberItem)
                                                <option value='{{$memberItem->name}},{{$memberItem->no}}'>{{$memberItem->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="play_year">Hight Assist<abbr class="required" title="required">*</abbr></label>

                                    <select name="hAssist" id="hAssist" class="form-control">
                                        @if($memberData)
                                            @foreach ($memberData as $memberItem)
                                                <option value='{{$memberItem->name}},{{$memberItem->no}}'>{{$memberItem->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="play_year">Hight Steal<abbr class="required" title="required">*</abbr></label>

                                    <select name="hSteal" id="hSteal" class="form-control">
                                        @if($memberData)
                                            @foreach ($memberData as $memberItem)
                                                <option value='{{$memberItem->name}},{{$memberItem->no}}'>{{$memberItem->name}}</option>
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
                <div class='col-lg-8'>
                    <div class="card card--has-table">
                        <div class="card__header">
                            <h4>Results</h4>
                        </div>
                        <div class="card__content">
                        <div class="table-responsive">
                        <table class="table table-hover team-schedule team-schedule--full">
                            <thead>
                                <tr>
                                    <th class="team-schedule__date">No</th>
                                    <th class="team-schedule__versus">Competition</th>
                                    <th class="team-schedule__tickets">Date</th>
                                    <th class="team-schedule__date">Versus</th>
                                    <th class="team-schedule__versus">Team Score</th>
                                    <th class="team-schedule__tickets">Versus Score</th>
                                    <th class="team-schedule__tickets">Hi Point</th>
                                    <th class="team-schedule__date">Hi Rebound</th>
                                    <th class="team-schedule__versus">Hi Assist</th>
                                    <th class="team-schedule__tickets">Hi Steal</th>
                                    <th class="team-schedule__tickets">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                @if($resultData)
                                    <input type='hidden' value='{{$i=0}}'>
                                    @foreach($resultData as $resultItem)
                                        <input type='hidden' value='{{$i=$i+1}}'>
                                        <tr>
                                            <td class="team-schedule__date">{{$i}}</td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->competition}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->play_date}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->versus}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->score_in}}                                               
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->score_out}}                                               
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->h_point}}                                               
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->h_rebound}}                                               
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->h_assist}}                                               
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$resultItem->h_steal}}                                               
                                            </td>
                                            <td class="team-schedule__tickets">
                                                <a href="#" class="btn btn-xs btn-danger btn-block " onclick="removeResult({{$resultItem->id}})">
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
@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <div class="card card--lg">
                <form action="{{route('insertTournament')}}" class="df-checkout" method="POST">
                    @csrf
                    <header class="card__header">
                            <div class='col-md-3'>
                                <div class="form-group">
                                    <label for="play_year">Year<abbr class="required" title="required">*</abbr></label>
                                    <input type="number" name="play_year" id="play_year" class="form-control" placeholder="">
                                </div>                                
                            </div>
                            <div class='col-md-9'>
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
                            </div>
					</header>
                    <div class="card__content">	
                        <div class="df-billing-fields">
                            <h4>Quarterfinals<h4>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team11" id="team11" class="form-control">
                                                @if (isset($tournamentData))
                                                    <option value='{{$tournamentData->team11}}'>{{$tournamentData->team11}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score11" id="score11" class="form-control" @if (isset($tournamentData)) value="{{$tournamentData->score11}}" @endif>
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team12" id="team12" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team12}}'>{{$tournamentData->team12}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score12" id="score12" class="form-control" @if (isset($tournamentData)) value="{{$tournamentData->score12}}" @endif>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team13" id="team13" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team13}}'>{{$tournamentData->team13}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score13" id="score13" class="form-control" @if (isset($tournamentData)) value="{{$tournamentData->score13}}" @endif placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team14" id="team14" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team14}}'>{{$tournamentData->team14}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score14" id="score14" class="form-control" @if (isset($tournamentData)) value="{{$tournamentData->score14}}" @endif placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team15" id="team15" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team15}}'>{{$tournamentData->team15}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score15" id="score15" class="form-control" @if (isset($tournamentData)) value="{{$tournamentData->score15}}" @endif placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team16" id="team16" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team16}}'>{{$tournamentData->team16}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score16" id="score16" @if (isset($tournamentData)) value="{{$tournamentData->score16}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team17" id="team17" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team17}}'>{{$tournamentData->team11}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score17" id="score17" @if (isset($tournamentData)) value="{{$tournamentData->score17}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team18" id="team18" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team18}}'>{{$tournamentData->team18}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score18" id="score18" @if (isset($tournamentData)) value="{{$tournamentData->score18}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <h4>Semifinals<h4>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team21" id="team21" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team21}}'>{{$tournamentData->team21}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score21" id="score21" @if (isset($tournamentData)) value="{{$tournamentData->score21}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team22" id="team22" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team22}}'>{{$tournamentData->team22}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score22" id="score22" class="form-control" @if (isset($tournamentData)) value="{{$tournamentData->score22}}" @endif placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team23" id="team23" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team23}}'>{{$tournamentData->team23}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score23" id="score23" @if (isset($tournamentData)) value="{{$tournamentData->score23}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team24" id="team24" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team24}}'>{{$tournamentData->team24}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score24" id="score24" @if (isset($tournamentData)) value="{{$tournamentData->score24}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <h4>Finals</h4>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team31" id="team31" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team31}}'>{{$tournamentData->team31}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score31" id="score31" @if (isset($tournamentData)) value="{{$tournamentData->score31}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team32" id="team32" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team32}}'>{{$tournamentData->team32}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score32" id="score32" @if (isset($tournamentData)) value="{{$tournamentData->score32}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <h4>Champions</h4>
                            <div class="row">
                                <div class='col-md-3'></div>
                                <div class='col-md-6'>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select name="team41" id="team41" class="form-control">
                                                @if (isset($tournamentData))
                                                <option value='{{$tournamentData->team41}}'>{{$tournamentData->team41}}</option>
                                                @endif
                                                @if($teamData)
                                                    @foreach ($teamData as $teamItem)
                                                        <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="number" name="score41" id="score41" @if (isset($tournamentData)) value="{{$tournamentData->score41}}" @endif class="form-control" placeholder="Score">
                                        </div> 
                                    </div>
                                </div>
                                <div class='col-md-3'></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group--sm">
                        <button type="submit" class="btn btn-primary-inverse btn-lg btn-block">{{ __('Add Tournament') }}</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
@endsection
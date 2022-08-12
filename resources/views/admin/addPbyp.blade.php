@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8"> 
                    <form action="{{route('insertPbyp')}}" class="df-checkout" method="POST">
                    @csrf                       
                    <!-- Billing Details -->
                    <div class="card card--lg">
                        <div class="card__header">
                            <h4>Add Play-by-Play</h4>
                        </div>
                        <div class="card__content">
                            <div class="df-billing-fields">
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="play_year">Date<abbr class="required" title="required">*</abbr></label>

                                        <select name="playDate" id="playDate" class="form-control">
                                            @if($dateData)
                                                @foreach ($dateData as $dateItem)
                                                    <option value='{{$dateItem->play_date}}'>{{$dateItem->play_date}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label for="turn">Turn<abbr class="required" title="required">*</abbr></label>
                                            <input type="number" name="turn" id="turn" class="form-control" min='1' max='4'>
                                        </div>          
                                    </div>
                                    <div class='col-md-2'>
                                        <div class="form-group">
                                            <label for="turn">Min<abbr class="required" title="required">*</abbr></label>
                                            <input type="number" name="newMinute" id="newMinute" class="form-control" min="0" max="12">
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class="form-group">
                                            <label for="turn">Sec<abbr class="required" title="required">*</abbr></label>
                                            <input type="number" name="newSecond" id="newSecond" class="form-control" min='0' max='60'>
                                        </div>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="play_year">Team<abbr class="required" title="required">*</abbr></label>

                                    <select name="team" id="team" class="form-control">
                                        @if($teamData)
                                            @foreach ($teamData as $teamItem)
                                                <option value='{{$teamItem->name}}'>{{$teamItem->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="turn">Note<abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="note" id="note" class="form-control">                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Billing Details / End -->
                    <div class="place-order">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="insertPbyp" id="insertPbyp" value="Add Play-by-Play!">
                    </div>
                    </form>
                </div>
                <div class='col-lg-2'></div>
            </div>
        </div>
    </div>
@endsection
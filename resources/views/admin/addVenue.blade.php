@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6"> 
                    <form action="{{route('insertVenue')}}" class="df-checkout" method="POST">
                    @csrf                       
                    <!-- Billing Details -->
                    <div class="card card--lg">
                        <div class="card__header">
                            <h4>Add Venue</h4>
                        </div>
                        <div class="card__content">
                            <div class="df-billing-fields">
                                <div class="form-group">
                                    <label for="venue">Add Venue</label>
                                    <input type="text" name="venue" id="venue" class="form-control" placeholder="Enter Venue">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Billing Details / End -->
                    <div class="place-order">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="insertVenue" id="insertVenue" value="Add Venue!">
                    </div>
                    </form>
                </div>
                <div class='col-lg-6'>
                    <div class="table-responsive">
                        <table class="table table-hover team-schedule team-schedule--full">
                            <thead>
                                <tr>
                                    <th class="team-schedule__date">No</th>
                                    <th class="team-schedule__versus">Venue</th>
                                    <th class="team-schedule__tickets">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                                @if($venueData)
                                    <input type='hidden' value='{{$i=0}}'>
                                    @foreach($venueData as $venueItem)
                                        <input type='hidden' value='{{$i=$i+1}}'>
                                        <tr>
                                            <td class="team-schedule__date">{{$i}}</td>
                                            <td class="team-schedule__versus">
                                                {{$venueItem->venue}}
                                            </td>
                                            <td class="team-schedule__tickets">
                                                <a href="#" class="btn btn-xs btn-danger btn-block " onclick="removeVenue({{$venueItem->id}})">
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
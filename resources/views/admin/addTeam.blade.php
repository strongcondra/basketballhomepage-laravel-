@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <form action="{{route('insertTeam')}}" class="df-checkout" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">

                        <!-- Billing Details -->
                        <div class="card card--lg">
                            <div class="card__header">
                                <h4>Add Team</h4>
                            </div>
                            <div class="card__content">
                                <div class="df-billing-fields">
                                    <div class='form-group'>
                                        <div class="container">
                                            <label for="country">Add Team Logo</label>
                                            <div class="imageupload panel panel-default">
                                                <div class="file-tab panel-body">
                                                    <label class="btn btn-default btn-file">
                                                        <span>Browse</span>
                                                        <!-- The file is stored here. -->
                                                        <input type="file" name="imagefile" id='image'>
                                                    </label>
                                                    <button type="button" class="btn btn-default">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select name="country" id="country" class="form-control selectpicker countrypicker" data-live-search="true">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="teamname">Team Name</label>
                                        <input type="text" name="teamname" id="teamname" class="form-control" placeholder="Team Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="teamcompany">Team Company</label>
                                        <input type="text" name="teamcompany" id="Teamcompany" class="form-control" placeholder="Company">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Billing Details / End -->
                        <div class="place-order">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" name="insertNews" id="insertNews" value="Add Team">
                        </div>
                    </div>
                    <div class='col-lg-6'>
                        <div class="card card--has-table">
                            <div class="card__header">
                                <h4>Teams</h4>
                            </div>
                            <div class="card__content">
                            <div class="table-responsive">
                            <table class="table table-hover team-schedule team-schedule--full">
                                <thead>
                                    <tr>
                                        <th class="team-schedule__date">No</th>
                                        <th class="team-schedule__versus">Name</th>
                                        <th class="team-schedule__tickets">Country</th>
                                        <th class="team-schedule__date">College</th>
                                        <th class="team-schedule__versus">Team Logo</th>
                                        <th class="team-schedule__tickets">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    @if($teamData)
                                        <input type='hidden' value='{{$i=0}}'>
                                        @foreach($teamData as $teamItem)
                                            <input type='hidden' value='{{$i=$i+1}}'>
                                            <tr>
                                                <td class="team-schedule__date">{{$i}}</td>
                                                <td class="team-schedule__versus">
                                                    {{$teamItem->name}}
                                                </td>
                                                <td class="team-schedule__versus">
                                                    {{$teamItem->country}}
                                                </td>
                                                <td class="team-schedule__versus">
                                                    {{$teamItem->company}}
                                                </td>
                                                <td class="team-schedule__versus">
                                                    <img src="uploads/{{$teamItem->logopath}}" alt="" with="40" height="40"  style="width:40px;">
                                                </td>
                                                <td class="team-schedule__tickets">
                                                    <a href="#" class="btn btn-xs btn-danger btn-block " onclick="removeTeam({{$teamItem->id}})">
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
            </form>
        </div>
    </div>
@endsection

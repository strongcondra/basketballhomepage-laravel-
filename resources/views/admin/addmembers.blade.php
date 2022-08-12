@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <div class='row'>
                <div class="col-lg-6">
                    <form action="{{route('insertMembers')}}" class="df-checkout" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Billing Details -->
                        <div class="card card--lg">
                            <div class="card__header">
                                <h4>Add Member</h4>
                            </div>
                            <div class="card__content">
                                <div class="df-billing-fields">
                                    <div class="row">
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
                                        <div class='row'>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="playernumber">Player Number</label>
                                                    <input type="number" name="playernumber" id="playernumber" class="form-control" placeholder="Player Number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="playername">Player Name</label>
                                                    <input type="text" name="playername" id="playername" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" name="position" id="position" class="form-control" placeholder="Position">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="college">College</label>
                                            <input type="text" name="college" id="college" class="form-control" placeholder="College">
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class=col-md-4>
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" name="age" id="age" class="form-control" placeholder="Age">
                                            </div>                                            
                                        </div>
                                        <div class=col-md-4>
                                            <div class="form-group">
                                                <label for="height">Height</label>
                                                <input type="number" name="height" id="height" class="form-control" placeholder="Height" step="0.01">
                                            </div>   
                                        </div>
                                        <div class=col-md-4>
                                            <div class="form-group">
                                                <label for="weight">Weight</label>
                                                <input type="number" name="weight" id="weight" class="form-control" placeholder="Weight" step="0.01">
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Billing Details / End -->
                        <div class="place-order">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" name="insertNews" id="insertNews" value="Add Member">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="card card--has-table">
                        <div class="card__header">
                            <h4>Member</h4>
                        </div>
                        <div class="card__content">
                        <div class="table-responsive">
                        <table class="table table-hover team-schedule team-schedule--full">
                            <thead>
                                <tr>
                                    <th class="team-schedule__date">No</th>
                                    <th class="team-schedule__versus">Player No</th>
                                    <th class="team-schedule__versus">Name</th>
                                    <th class="team-schedule__tickets">Position</th>
                                    <th class="team-schedule__date">College</th>
                                    <th class="team-schedule__versus">Age</th>
                                    <th class="team-schedule__tickets">Weight</th>
                                    <th class="team-schedule__date">Height</th>
                                    <th class="team-schedule__versus">Logo</th>
                                    <th class="team-schedule__tickets">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                @if($memberData)
                                    <input type='hidden' value='{{$i=0}}'>
                                    @foreach($memberData as $memberItem)
                                        <input type='hidden' value='{{$i=$i+1}}'>
                                        <tr>
                                            <td class="team-schedule__date">{{$i}}</td>
                                            <td class="team-schedule__versus">
                                                {{$memberItem->no}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$memberItem->name}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$memberItem->position}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$memberItem->college}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$memberItem->age}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$memberItem->height}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                {{$memberItem->weight}}
                                            </td>
                                            <td class="team-schedule__versus">
                                                <img src="uploads/players/{{$memberItem->logo}}" alt="" with="40" height="40"  style="width:40px;">
                                            </td>
                                            <td class="team-schedule__tickets">
                                                <a href="#" class="btn btn-xs btn-danger btn-block " onclick="removeMember({{$memberItem->id}})">
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
@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6"> 
                    <form action="{{route('insertCompetition')}}" class="df-checkout" method="POST">
                    @csrf                       
                    <!-- Billing Details -->
                    <div class="card card--lg">
                        <div class="card__header">
                            <h4>Add Competition</h4>
                        </div>
                        <div class="card__content">
                            <div class="df-billing-fields">
                                <div class="form-group">
                                    <label for="title">Add Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Competition title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Billing Details / End -->
                    <div class="place-order">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="insertCompetition" id="insertCompetition" value="Add Competition!">
                    </div>
                    </form>
                </div>
                <div class='col-lg-6'>
				<div class="card card--has-table">
					<div class="card__header">
						<h4>Competition</h4>
					</div>
					<div class="card__content">
						<div class="table-responsive">
							<table class="table table-hover team-schedule team-schedule--full">
								<thead>
									<tr>
										<th class="team-schedule__date">No</th>
										<th class="team-schedule__versus">Title</th>
										<th class="team-schedule__tickets">Note</th>
									</tr>
								</thead>
								<tbody>
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                                    @if($competitionData)
                                        <input type='hidden' value='{{$i=0}}'>
                                        @foreach($competitionData as $competitionItem)
                                            <input type='hidden' value='{{$i=$i+1}}'>
                                            <tr>
                                                <td class="team-schedule__date">{{$i}}</td>
                                                <td class="team-schedule__versus">
                                                    {{$competitionItem->title}}
                                                </td>
                                                <td class="team-schedule__tickets">
                                                    <a href="#" class="btn btn-xs btn-danger btn-block " onclick="removeCompetition({{$competitionItem->id}})">
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
        </div>
    </div>
@endsection
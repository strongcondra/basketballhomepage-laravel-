@extends('layouts.app')
@section('content')
    <div class="site-content">
        <div class="container">
            <form action="{{route('insertNews')}}" class="df-checkout" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        
                        <!-- Billing Details -->
                        <div class="card card--lg">
                            <div class="card__header">
                                <h4>Add news</h4>
                            </div>
                            <div class="card__content">
                                <div class="df-billing-fields">
                                    <div class="form-group">
                                        <label for="newsTitle">Add Title</label>
                                        <input type="text" name="newsTitle" id="newsTitle" class="form-control" placeholder="Enter news title">
                                    </div>
                                    <div class="mb-0 form-group">
                                        <label for="newsContent">Additional Comments</label>
                                        <textarea name="newsContent" id="newsContent" rows="7" class="form-control" placeholder="Write news contents"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Billing Details / End -->
                        <div class="place-order">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" name="insertNews" id="insertNews" value="Add News!">
                        </div>
                    </div>
                    <div class='col-lg-2'></div>
                </div>
            </form>
        </div>
    </div>
@endsection
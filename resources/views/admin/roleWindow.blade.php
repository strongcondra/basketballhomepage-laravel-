@extends('layouts.admin')
@section('content')

<div class="page-bar">
        <ul class="page-breadcrumb">
                <li>
                <i class="fa fa-home"></i>
                <a href="">Admin</a>
                <i class="fa fa-angle-right"></i>
                </li>
                <li>
                <a href="#">Role</a>
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                </li>
        </ul>
        <div class="page-toolbar">
                <div class="btn-group pull-right">
                        <button type="button" class="btn btn-success "  onclick="changeRole()">
                                Save
                        </button>
                        
                </div>
        </div>       
</div>
<h3 class="page-title">
        User Role 
</h3>
<div class='row'>
        <div class='col-md-12'>
                <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-globe"></i>Change Role
                                </div>
                                <div class="tools">
                                </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                            <div class="col-md-6">
                              
                                <div id="tree_2" class="tree-demo">
                                </div>
                            </div>
                            </div> 
                        </div>
                </div>  
        </div>
</div>

@endsection
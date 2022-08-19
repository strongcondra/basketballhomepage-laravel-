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
                <a href="#">UserAccount</a>
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                </li>
        </ul>
        <div class="page-toolbar">
                <div class="btn-group pull-right">
                        <a type="button" class="btn btn-success "  href="{{route('createWindow')}}">
                                Create an Account
                        </a>
                </div>
        </div>       
</div>
<h3 class="page-title">
        Change Permission
</h3>
<div class='row'>
        <div class='col-md-12'>
                <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-globe"></i>Users and Administrators
                                </div>
                                <div class="tools">
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                        <th>
                                                        No
                                        </th>
                                        <th>
                                                        User Name
                                        </th>
                                        <th>
                                                        Email
                                        </th>
                                        <th>
                                                        Created At
                                        </th>
                                        <th>
                                                        Position
                                        </th>
                                        <th>
                                                        Operation
                                        </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($user_data)
                                        <input type='hidden' value='{{$i=0}}'>
                                        @foreach($user_data as $user_item)
                                            <input type='hidden' value='{{$i=$i+1}}'>
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    {{$user_item->name}}
                                                </td>
                                                <td>
                                                    {{$user_item->email}}
                                                </td>
                                                <td>
                                                    {{$user_item->created_at}}
                                                </td>
                                                <td>
                                                    
                                                        <div>
                                                                <?php 
                                                                        $permissionData=array('user', 'admin', 'super admin');
                                                                ?>
                                                                <select class="form-control" id="{{$user_item->id}}" onchange="changePermission({{$user_item->id}})" >
                                                                        <option value=""><?php echo $permissionData[$user_item->permission]; ?></option>
                                                                        <option value="0">user</option>
                                                                        <option value="1">admin</option>
                                                                        <option value="2">super admin</option>
                                                                </select>                                                                                
                                                        </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-icon-only red" onclick="removeUser({{$user_item->id}})"><i class="fa fa-trash"></i></button>
                                                    <button class="btn btn-icon-only btn-success" onclick="saveUser({{$user_item->id}})"><i class="fa fa-pencil"></i></button>
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

@endsection
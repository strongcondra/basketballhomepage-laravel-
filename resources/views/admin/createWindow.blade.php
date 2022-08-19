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
                <a href="#">Pages</a>
            </li>
        </ul>
    </div>
    <h3 class="page-title">
    Create Acount 
    </h3>
    <div class="row">
        <div class="col-md-12">

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Create Account
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="register-form" action="createAccount" method="post">
                        @csrf
                        <h3>Sign Up</h3>
                        <p class="hint">
                            Enter your personal details below:
                        </p>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">First Name</label>
                            <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="firstname"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                            <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="lastname"/>
                        </div>
                        <div class="form-group">
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            <label class="control-label visible-ie8 visible-ie9">Email</label>
                            <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
                        </div>

                        <p class="hint">
                            Enter your account details below:
                        </p>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Username</label>
                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
                        </div>
                        <div class='form-group'>
                            <select class="form-control" id="permission" name="permission">
                                <option value="">Select Role</option>
                                <option value="0">user</option>
                                <option value="1">admin</option>
                            </select>    
                        </div>
                        <div class="form-actions">
                            <a type="button"  class="btn btn-default" href="userAccount">Back</a>
                            <button type="submit" id="register-submit-btn" class="uppercase btn btn-success pull-right">Create</button>
                        </div>
                    </form>
                        

                </div>
            </div>

        </div>
    </div>
@endsection
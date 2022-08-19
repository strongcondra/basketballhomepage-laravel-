<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="Sports Club, League and News HTML Template">
<meta name="author" content="Dan Fisher">
<meta name="keywords" content="sports club news HTML template">
<title>Admin page</title>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{{asset('theme/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('theme/global/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('theme/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
<!-- BEGIN PAGE STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('theme/global/plugins/jstree/dist/themes/default/style.min.css')}}"/>

<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{asset('theme/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{asset('theme/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('theme/admin/pages/css/login.css" rel="stylesheet')}}" type="text/css"/>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="{{route('home')}}">
			<img src="{{asset('stuff/images/logo.png')}}" alt="logo" class="logo-default" style="height:40px; width:auto"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">

					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        @if(Auth::user()->user_photo)<img alt="" class="img-circle" src="uploads/players/{{Auth::user()->user_photo}}" />
                        @else <img alt="" class="img-circle" src="{{asset('uploads/players/player-placeholder-26x26.png')}}" />      
                        @endif                
					<span class="username username-hide-on-mobile">
					{{ Auth::user()->name }} </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="{{ route('logout') }}">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu disabled-link" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
			<!-- BEGIN ANGULARJS LINK -->

				<!-- END ANGULARJS LINK -->
				<li class="heading">
					<h3 class="uppercase">Pages</h3>
				</li>
				
				<li>
					<a href="javascript:;">
					<i class="icon-globe"></i>
					<span class="title">Constituents</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">National Teams</span>
					</a>
				</li>
				<li class="">
					<a href="javascript:;">
					<i class="fa fa-thumbs-o-up"></i>
					<span class="title">Competitions</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="" >
							<a href="#">
							Leagues</a>
						</li>
						<li>
							<a href="#">
							Tournaments</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-edit (alias)"></i>
					<span class="title">Technical</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="">
							<a href="#">
							Coaches</a>
						</li>
						<li>
							<a href="#">
							Table officials</a>
						</li>
                        <li>
							<a href="#">
							Referees</a>
						</li>
					</ul>
				</li>
				<li class=''>
					<a href="javascript:;">
					<i class="fa fa-institution (alias)" ></i>
					<span class="title">Infrastructure</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="">
							<a href="#">
							
							League Center</a>
						</li>
						<li>
							<a href="#l">
							
							Training Center</a>
						</li>
						<li>
							<a href="#">
							
							Schools</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-target"></i>
					<span class="title">Events</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-envelope-o"></i>
					<span class="title">News</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class=" icon-picture"></i>
					<span class="title">Gallery</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-group (alias)"></i>
					<span class="title">Partners</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Governance</a>
						</li>
						<li>
							<a href="#">
							Development Partners</a>
						</li>
						<li>
							<a href="#">
							Corporate</a>
						</li>
						<li>
							<a href="#">
							Ambassadors</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-graduation-cap"></i>
					<span class="title">Governance</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							
							Board</a>
						</li>
						<li>
							<a href="#">
							
							Commissions</a>
						</li>
						<li>
							<a href="#">
							
							Committee</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-smile-o"></i>
					<span class="title">About us</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							Executives</a>
						</li>
						<li>
							<a href="#">
							Contact Details</a>
						</li>
					</ul>
				</li>
				@auth
				@if (Auth::user()->permission == 2)
				<li class="heading" >
					<h3 class="uppercase">Permissions & Roles</h3>
				</li>
				<li class="last "  class="">
					<a href="{{route('userRole')}}">
					<i class="fa fa-qq"></i>
					<span class="title">Role</span>
					</a>
				</li>
                <li class="heading" >
					<h3 class="uppercase">Account</h3>
				</li>
                <li class="last ">
					<a href="{{route('userAccount')}}">
					<i class="icon-user"></i>
					<span class="title">Create an Account</span>
					</a>
				</li>
				@endif
				@endauth
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="clearfix theme-option theme-colors">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Theme Style </span>
						<select class="layout-style-option form-control input-sm">
							<option value="square" selected="selected">Square corners</option>
							<option value="rounded">Rounded corners</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-sm">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-sm">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Top Menu Dropdown</span>
						<select class="page-header-top-dropdown-style-option form-control input-sm">
							<option value="light" selected="selected">Light</option>
							<option value="dark">Dark</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Mode</span>
						<select class="sidebar-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Menu </span>
						<select class="sidebar-menu-option form-control input-sm">
							<option value="accordion" selected="selected">Accordion</option>
							<option value="hover">Hover</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Style </span>
						<select class="sidebar-style-option form-control input-sm">
							<option value="default" selected="selected">Default</option>
							<option value="light">Light</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-sm">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
            @yield('content')

			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->

		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2022 &copy; Ghana & Bascketball <a href="{{route('home')}}" title="Ghana basketball" target="_blank">Site</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{{asset('theme/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('theme/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->


<script type="text/javascript" src="{{asset('theme/global/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

<script src="{{asset('theme/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

<script src="{{asset('theme/global/plugins/jstree/dist/jstree.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('theme/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/admin/layout/scripts/quick-sidebar.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/admin/pages/scripts/index.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/admin/pages/scripts/table-advanced.js')}}"></script>
<script src="{{asset('theme/admin/pages/scripts/login.js')}}"></script>
<script src="{{asset('theme/admin/pages/scripts/ui-tree.js')}}"></script>

<script src="{{asset('stuff/js/stuff.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
    Metronic.init(); // init metronic core componets
    Layout.init(); // init layout
    QuickSidebar.init(); // init quick sidebar
	Login.init();
	UITree.init();
    Demo.init(); // init demo features
    TableAdvanced.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
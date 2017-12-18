<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ url('/') }}">
    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    @yield("title")

    <link href="{{ url('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ url('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ url('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
    <![endif]-->

    <script src="{{ url('assets/js/modernizr.min.js') }}"></script>

</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{ url(Config::get("admin")) }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
                <!-- Image Logo here -->
                <!--<a href="index.html" class="logo">-->
                <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                <!--</a>-->
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="md md-menu"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    <form role="search" class="navbar-left app-search pull-left hidden-xs">
                        <input type="text" placeholder="@lang('messages.search')..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>


                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-settings"></i></a>
                        </li>
                        <li class="dropdown top-menu-item-xs">
                            <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{ url(Auth::guard('admin')->user()->picture()) }}" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url(Config::get("admin").'/admins/'.Auth::guard("admin")->user()->slug) }}"><i class="ti-user m-r-10 text-custom"></i> @lang("messages.profile")</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> @lang("messages.settings")</a></li>
                                <li class="divider"></li>
                                <li>
                                <li><a href="{{ url(Config::get("admin").'/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="fa fa-power-off"></span> @lang("messages.logout")
                                    </a>
                                    <form id="logout-form" method="POST" action="{{ url(Config::get("admin").'/logout') }}" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    <li class="text-muted menu-title">@lang('messages.navigation')</li>

                    <li>
                        <a href="{{ url(Config::get("admin")) }}" class="waves-effect"><i class="ti-home"></i> <span> @lang("messages.dashboard") </span></a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-secret"></i> <span> @lang("messages.admins") </span> <span class="menu-arrow"></span> </a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url(Config::get("admin")."/admins") }}">@lang("messages.all_admins")</a></li>
                            <li><a href="{{ url(Config::get("admin")."/admins/create") }}">@lang("messages.create_admin")</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i><span> @lang("messages.settings") </span> <span class="menu-arrow"></span> </a>
                        <ul>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><span>@lang("messages.roles")</span>  <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ url(Config::get("admin").'/roles') }}">@lang("messages.all_roles")</a></li>
                                    <li><a href="{{ url(Config::get("admin").'/roles/create') }}">@lang("messages.create_role")</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><span>@lang("messages.all_permissions")</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ url(Config::get("admin").'/permissions') }}">@lang("messages.all_permissions")</a></li>
                                    <li><a href="{{ url(Config::get("admin").'/permissions/create') }}">@lang("messages.create_permission")</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        @include('flash::message')
                        @yield("content")

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="side-bar right-bar nicescroll">
        <h4 class="text-center">Chat</h4>
        <div class="contact-list nicescroll">
            <ul class="list-group contacts-list">
                <li class="list-group-item">
                    <a href="#">
                        <div class="avatar">
                            <img src="{{ url('assets/images/users/avatar-1.jpg') }}" alt="">
                        </div>
                        <span class="name">Chadengle</span>
                        <i class="fa fa-circle online"></i>
                    </a>
                    <span class="clearfix"></span>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Right-bar -->


</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap-rtl.min.js') }}"></script>
<script src="{{ url('assets/js/detect.js') }}"></script>
<script src="{{ url('assets/js/fastclick.js') }}"></script>
<script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ url('assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ url('assets/js/waves.js') }}"></script>
<script src="{{ url('assets/js/wow.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ url('assets/js/jquery.scrollTo.min.js') }}"></script>
<link href="{{ url('assets/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
{!! Html::script("assets/plugins/datatables/jquery.dataTables.min.js") !!}
{!! Html::script("assets/plugins/datatables/dataTables.bootstrap.js") !!}
<link href="{{ url('assets/plugins/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ url('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>

<script src="{{ url('assets/js/jquery.core.js') }}"></script>
<script src="{{ url('assets/js/jquery.app.js') }}"></script>
@yield("footer")
{!! Html::script("js/admin.js") !!}

</body>
</html>
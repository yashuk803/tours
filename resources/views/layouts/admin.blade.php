<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="header">
    <div class="container ">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.html">Admin Panel</a></h1>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="login.html">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content admin-panel">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="{{ route('admin') }}"><i class="glyphicon glyphicon-home"></i>Main</a></li>
                    <li><a href="{{ route('tours') }}"><i class="glyphicon glyphicon-plus"></i>Add Tours</a></li>
                    <li><a href="{{ route('all_tours') }}"><i class="glyphicon glyphicon-eye-open"></i>View All Tours</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-plus"></i>Add Articles</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-eye-open"></i>View All Articles</a></li>
                </ul>
            </div>
        </div>
        @yield('content')
    </div>
</div>

<footer class="add-top">
    <div class="container">
        <div class="copy text-center">Admin 2018</div>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="js/custom.js"></script>
</body>
</html>
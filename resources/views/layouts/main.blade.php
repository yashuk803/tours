<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<header class="header-moscow">
    <div class="container">
        <ul class="nav navbar-nav language">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle name-language" data-toggle="dropdown">Русский<span class="russion"><i
                                class="glyphicon glyphicon-menu-down"></i></span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="active"><a href="#">Русский<span class="russion"></span></a></li>
                    <li><a href="#">Французский<span class="france"></span></a></li>
                    <li><a href="#">Английский<span class="britain"></span></a></li>
                </ul>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-3  col-sm-6 col-xs-8">
                <a href="#" class="logo"><span>Guided tours in <br><wbr>most interesting <br><wbr>places in Moscow</span></a>
            </div>
            <div class="col-md-7 col-sm-9">
                <ul class="nav navbar-nav  navbar-collapse collapse main-menu" id="myNavbar">
                    <li class="active"><a href="#"><span>About me</span></a></li>
                    <li class="vcenter"><a href="#"><span>Tours</span></a></li>
                    <li class="vcenter"><a href="#" class="booking"><span>Booking</span></a></li>
                    <li class="vcenter"><a href="#"><span>Practical tips <br><wbr>for travellers</span></a>
                    </li>
                    <li class="vcenter"><a href="#"><span>Reviews</span></a></li>
                    <li class="vcenter"><a href="#"><span>Contacts</span></a></li>
                </ul>
            </div>
            <div class="col-xs-6 visible-xs-inline-block text-left">
                <button class="btn-menu">Меню</button>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 ">
                <ul class="list-inline menu-social">
                    <li><a href="#"><img src="img/instagram.png"></a></li>
                    <li><a href="#"><img src="img/facebook.png"></a></li>
                    <li><a href="#"><img src="img/sova.png"></a></li>
                </ul>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</header>
@yield('content')
<footer>
    <div class="footer-tours">
        <div class="green-rect"></div>
    </div>
    <div class="container">
    </div>
</footer>

<script src="{{ asset('js/jquery-3.1.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
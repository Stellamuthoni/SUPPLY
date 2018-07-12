<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
    <head>

        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
        <title>Dave auto spares</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles -->

        <!-- Bootstrap -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Forms -->
        <link href="{{ asset('css/jquery.idealforms.css') }}" rel="stylesheet">
        <!-- Select  -->
        <link href="{{ asset('css/jquery.idealselect.css') }}" rel="stylesheet">
        <!-- Slicknav  -->
        <link href="{{ asset('css/slicknav.css') }}" rel="stylesheet">
        <!-- Main style -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Modernizr -->
        <script src="{{ asset('js/modernizr.js') }}"></script>

        <!-- Fonts -->
        <link href="{{ asset('css/font-awesome.min.css" rel="stylesheet') }}">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <header class="header">

            <div class="top-menu">

                <section class="container">
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="user-log">
                                @if(Auth::check())
                                <a href="#"><i class="fa fa-user"></i> {{ Auth::user()->username }}</a> |
                                <a href="{{ URL::route('account-sign-out') }}"> Sign Out</a>
                                @else
                                <a data-toggle="modal" data-target="#loginModal">
                                    Log in
                                </a> |
                                <a data-toggle="modal" data-target="#regModal">
                                    Sign up
                                </a>
                                @endif
                            </div><!-- end .user-log -->
                        </div><!-- end .col-sm-4 -->


                    </div><!-- end .row -->
                </section><!-- end .container -->

            </div><!-- end .top-menu -->

            <div class="main-baner">
                @include('flash::message')
                <div class="fullscreen background parallax clearfix" style="background-image:url('img/tumblr_n7yhhvUQtx1st5lhmo1_1280.jpg');" data-img-width="1600" data-img-height="1064">

                    <div class="main-parallax-content">

                        <div class="second-parallax-content">

                            <section class="container">

                                <div class="row">

                                    <div class="main-header-container clearfix">

                                        <div class="col-md-8 col-sm-10 col-xs-12">

                                            <div class="logo">
                                                <h1>Dave auto spares</h1>
                                            </div><!-- end .logo -->

                                        </div><!-- end .col-sm-4 -->

                                        <div class="col-md-4 col-sm-8 col-xs-12">

                                            <nav id="nav" class="main-navigation">

                                                <ul class="navigation">
                                                    <li>
                                                        <a href="{{URL::Route('home')}}">Home</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{URL::Route('view-stock')}}">Add Stock</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{URL::Route('list-stock')}}">View Stock</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{URL::Route('my-messages')}}">Messages</a>
                                                    </li>
                                                  
                                                    <li>
                                                        <a href="{{URL::Route('view-users')}}">View users</a>
                                                    </li>
                                                </ul>


                                            </nav><!-- end .main-navigation -->

                                        </div><!-- end .col-md-8 -->

                                    </div><!-- end .main-header-container -->

                                </div><!-- end .row -->

                            </section><!-- end .container -->

                        </div><!-- end .second-parallax-content -->

                    </div><!-- end .main-parallax-content -->

                </div><!-- end .background .parallax -->

            </div><!-- end .main-baner -->

        </header><!-- end .header -->

        @yield('content')

        <footer id="footer">

            <div class="footer-copyright">

                <div class="container">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            &copy; Dave auto spares.
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        </div>

                    </div><!-- end .row -->
                </div><!-- end .container -->

            </div><!-- end .footer-copyright -->

        </footer><!-- end #footer -->

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <center><h4 class="modal-title">Login</h4></center>
              </div>
              <div class="modal-body">
                <form action="{{ route('account-sign-in-post') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                    <div class="form-group">
                      <label class="col-sm-4" for="email">E-Mail Address</label>
                      <div class="col-sm-7"><input class="form-control" id="inputSubject" placeholder="email" type="email" name="email"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4" for="password">Password</label>
                      <div class="col-sm-7"><input class="form-control" id="password" placeholder="password" type="password" name="password" required></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-1">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary ">Login <i class="fa fa-arrow-circle-right fa-lg"></i></button>
              </div>
              </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- end .modal -->

        <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
<div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <center><h4 class="modal-title">Sign Up</h4></center>
              </div>
              <div class="modal-body">
                <form action="{{ route('account-create-post') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                    <div class="form-group">
                      <label class="col-sm-4" for="username">Username</label>
                      <div class="col-sm-7"><input class="form-control" id="username" placeholder="username" type="text" name="username"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4" for="email">E-Mail Address</label>
                      <div class="col-sm-7"><input class="form-control" id="email" placeholder="email" type="email" name="email"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4" for="password">Password</label>
                      <div class="col-sm-7"><input class="form-control" id="password" placeholder="password" type="password" name="password" required></div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4" for="password-confirm">Confirm Password</label>
                      <div class="col-sm-7"><input class="form-control" id="password-confirm" placeholder="repeat password" type="password" name="password_again" required></div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary ">Signup <i class="fa fa-arrow-circle-right fa-lg"></i></button>
              </div>
              </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- end .modal -->
        @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
            <script>
            $(function() {
                $('#regModal').modal('show');
            });
            </script>
            @endif

        <!-- Javascript -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Bootstrap -->
        {{ Html::script('js/bootstrap.min.js') }}
        <!-- Main jQuery -->
        {{ Html::script('js/jquery.main.js') }}
        <!-- Form -->
        {{ Html::script('js/jquery.idealforms.min.js') }}
        {{ Html::script('js/jquery.idealselect.min.js') }}
        {{ Html::script('js/jquery-ui-1.10.4.custom.min.js') }}
        <!-- Menu -->
        {{ Html::script('js/hoverIntent.js') }}
        {{ Html::script('js/superfish.js') }}
        <!-- Counter-Up  -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        {{ Html::script('js/jquery.counterup.min.js') }}
        <!-- Rating  -->
        {{ Html::script('js/bootstrap-rating-input.min.js') }}
        <!-- Slicknav  -->
        {{ Html::script('js/jquery.slicknav.min.js') }}

    </body>
</html>

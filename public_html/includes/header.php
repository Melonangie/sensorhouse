<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!-- Metas
        ================================================== -->
        <title>Sensor House</title>
        <meta name="description" content="International Workshop on Green Supply Chain organized by the University of Artois in Arras France, from June 21st to June 22nd  2012"/>
        <meta name="keywords" content="international, workshop, green, supply chain, artois, lgi2, GSC2012, GSC, university" />
        <meta name="viewport" content="width=device-width"/>
        <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="320" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta http-equiv="cleartype" content="on" />
        <!-- css
        ================================================== -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <!-- Javascript
        ================================================== -->
        <script src="js/vendor/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="js/lib/slicebox.js"></script>
        <script src="js/functions.js"></script>
        <!--[if IE]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="img/ico/favicon.png">
    </head>
    <body>
           <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <header class="navbar navbar-static-top">
            <div class="navbar-inner">
                <div class="container">
                    <!-- Button to trigger login modal -->
                    <a href="#myModal" role="button" class="btn btn-success mybutton" data-toggle="modal"><i class="icon-white icon-user"></i>Login</a>
                    <!-- Logo -->
                    <a class="brand" href="#"></a>
                    <!-- Button to trigger dropdown menu -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <!-- Navigation -->
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- Navigation end -->
                </div>
            </div>
        </header>
        
        <!-- Modal -->
        <div id="myModal" class="modal hide fade login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="form-signin-heading">Please sign in</h2>
            </div>
            <div class="modal-body">
                <form class="form-signin" method="POST" action="" accept-charset="UTF-8">
                    <div class="alert alert-error">
                        <a class="close" data-dismiss="alert" href="#">x</a>Incorrect Username or Password!
                    </div> 
                    <input type="text" class="input-block-level" placeholder="Email address">
                    <input type="password" class="input-block-level" placeholder="Password">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <button class="btn btn-large btn-primary" type="submit">Sign in</button>
                </form>
            </div>
        </div>   
           
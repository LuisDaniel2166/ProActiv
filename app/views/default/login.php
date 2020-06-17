<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Site Meta -->
    <title>Login</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet"> 
	<link rel="stylesheet" href="app/views/default/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/views/default/css/font-awesome.min.css">
    <link rel="stylesheet" href="app/views/default/css/carousel.css">
    <link rel="stylesheet" href="app/views/default/css/style.css">

</head>
<body class="left-menu">  
    
    <div class="menu-wrapper">
        <header class="vertical-header">
            <div class="vertical-header-wrapper">
                <nav class="nav-menu">
                    <div class="logo">
                        <a href=""><img src="app/views/default/images/logo-normal.png" alt="" width="50%" height="50%"></a>

                </nav><!-- end nav-menu -->
            </div><!-- end vertical-header-wrapper -->
        </header><!-- end header -->
    </div><!-- end menu-wrapper -->

    <div id="wrapper">

        <div id="home" class="js-height-full">
            <div class="overlay"></div>
            <div class="home-text-wrapper relative container">
                <div class="home-message">
                    <img src="app/views/default/images/sopa.png" alt="" width="200" height="200">
                    <p>Bienvenido a ProActiv</p>
                    <form method="post" action="index.php?action=login">
                        <div class="btn-wrapper">
                            <div class="text-center">
                                #ERROR_LOGIN#
                                <label for="usuario" style="color: white">Usuario</label> 
                                <input name="usuario" type="text" id="usuario" placeholder="Usuario" style="color: black"></p>
                                <label for="Contraseña" style="color: white">Contraseña</label> 
                                <input name="contraseña" type="password" id="contraseña" placeholder="Contraseña" style="color: black"></p>
                                <input type="submit" class="btn btn-primary" value="Iniciar Sesión"></input>
                        </div><!-- end row -->
                    </form>
                </div>
            </div>
        </div>

        <div class="section copyrights">
            <div class="container" style="pading: 0px">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="cop-logo">
                            <img src="app/views/default/images/logobig.png" alt="" width="60%" height="60%">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 text-right">
                        <div class="cop-links">
                            <ul class="list-inline">
                                <li>&copy; 2020 ProActiv (Proyectos y Activvidades) </li>
                                <li>Versión: Beta</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="app/views/default/js/jquery.min.js"></script>
    <script src="app/views/default/js/bootstrap.min.js"></script>
    <script src="app/views/default/js/carousel.js"></script>
    <script src="app/views/default/js/parallax.js"></script>
    <script src="app/views/default/js/rotate.js"></script>
    <script src="app/views/default/js/custom.js"></script>
    <script src="app/views/default/js/masonry.js"></script>
    <script src="app/views/default/js/masonry-4-col.js"></script>

</body>
</html>
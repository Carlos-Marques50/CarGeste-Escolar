<!doctype html>
<html class="no-js" lang="pt">

<head>
<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
    }
</style>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestão Escolar - @yield("title") </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- favicon
		============================================ -->
        <link rel="shortcut icon" type={{asset("image/x-icon")}} href={{asset("img/logo/logosn.png")}}>
        <!-- Google Fonts
            ============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/font-awesome.min.css")}}>
        <!-- owl.carousel CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/owl.carousel.css")}}>
        <link rel="stylesheet" href={{asset("css/owl.theme.css")}}>
        <link rel="stylesheet" href={{asset("css/owl.transitions.css")}}>
        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/animate.css")}}>
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/normalize.css")}}>
        <!-- meanmenu icon CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/meanmenu.min.css")}}>
        <!-- main CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/main.css")}}>
        <!-- educate icon CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/educate-custon-icon.css")}}>
        <!-- morrisjs CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/morrisjs/morris.css")}}>
        <!-- mCustomScrollbar CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/scrollbar/jquery.mCustomScrollbar.min.css")}}>
        <!-- metisMenu CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/metisMenu/metisMenu.min.css")}}>
        <link rel="stylesheet" href={{asset("css/metisMenu/metisMenu-vertical.css")}}>
        <!-- calendar CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/calendar/fullcalendar.min.css")}}>
        <link rel="stylesheet" href={{asset("css/calendar/fullcalendar.print.min.css")}}>
        <!-- forms CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/form/all-type-forms.css")}}>
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("style.css")}}>
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href={{asset("css/responsive.css")}}>
        <!-- modernizr JS
            ============================================ -->
        <script src={{asset("js/vendor/modernizr-2.8.3.min.js")}}></script>

</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <br>
            <div class="sidebar-header">
                <a href="#"><img class="main-logo" src={{asset("img/logo/logo.png")}} alt="" /></a>
                <strong><a href="#"><img src={{asset("img/logo/logosn.png")}} alt="Logotipo do Sistema" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">

                    <br><br>

                        <li>
                            <a href={{route("showLicense")}} aria-expanded="false"> 
                                <span class="mini-click-non"> + Licenças</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href={{route("showParceiros")}} aria-expanded="false"> 
                                <span class="mini-click-non"> + Parceiros</span>
                                
                            </a>
                        </li>

                        <li>
                            <a href={{route("cadastrarParceiro")}} aria-expanded="false"> 
                                <span class="mini-click-non"> + Cadastrar Parceiros</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" aria-expanded="false"> 
                                <span class="mini-click-non"> + Cadastrar Usuario</span>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="#"><img class="main-logo" src={{asset("img/logo/logo.png")}} alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
                                                    
											</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                      
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															
															<span class="admin-name">Admin</span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                
                                                        <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic">
                                                            </span>Meu perfil</a>
                                                        </li>
                                    
                                                        <li><a href="#"><span class="edu-icon edu-locked author-log-ic">
                                                            </span>Sair</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                         
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Pesquisar..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">CarGeste - Escolar</a> <span class="bread-slash">/</span></li>
                                            <li><span class="bread-blod">Versão: Beta</span></li>                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                @yield('conteudo')
            </div>

 <!-- Footer -->
    <div class="row footer">                  
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2023. Todos os direitos reservados. Desenvolvido por: <a href="#">Carlos A.Marques</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src={{asset("js/vendor/jquery-1.12.4.min.js")}}></script>
    <!-- bootstrap JS
		============================================ -->
    <script src={{asset("js/bootstrap.min.js")}}></script>
    <!-- wow JS
		============================================ -->
    <script src={{asset("js/wow.min.js")}}></script>
    <!-- price-slider JS
		============================================ -->
    <script src={{asset("js/jquery-price-slider.js")}}></script>
    <!-- meanmenu JS
		============================================ -->
    <script src={{asset("js/jquery.meanmenu.js")}}></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src={{asset("js/owl.carousel.min.js")}}></script>
    <!-- sticky JS
		============================================ -->
    <script src={{asset("js/jquery.sticky.js")}}></script>
    <!-- scrollUp JS
		============================================ -->
    <script src={{asset("js/jquery.scrollUp.min.js")}}></script>
    <!-- counterup JS
		============================================ -->
    <script src={{asset("js/counterup/jquery.counterup.min.js")}}></script>
    <script src={{asset("js/counterup/waypoints.min.js")}}></script>
    <script src={{asset("js/counterup/counterup-active.js")}}></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src={{asset("js/scrollbar/jquery.mCustomScrollbar.concat.min.js")}}></script>
    <script src={{asset("js/scrollbar/mCustomScrollbar-active.js")}}></script>
    <!-- metisMenu JS
		============================================ -->
    <script src={{asset("js/metisMenu/metisMenu.min.js")}}></script>
    <script src={{asset("js/metisMenu/metisMenu-active.js")}}></script>
    <!-- morrisjs JS
		============================================ -->
    <script src={{asset("js/morrisjs/raphael-min.js")}}></script>
    <script src={{asset("js/morrisjs/morris.js")}}></script>
    <script src={{asset("js/morrisjs/morris-active.js")}}></script>
    <!-- morrisjs JS
		============================================ -->
    <script src={{asset("js/sparkline/jquery.sparkline.min.js")}}></script>
    <script src={{asset("js/sparkline/jquery.charts-sparkline.js")}}></script>
    <script src={{asset("js/sparkline/sparkline-active.js")}}></script>
    <!-- calendar JS
		============================================ -->
    <script src={{asset("js/calendar/moment.min.js")}}></script>
    <script src={{asset("js/calendar/fullcalendar.min.js")}}></script>
    <script src={{asset("js/calendar/fullcalendar-active.js")}}></script>
    <!-- plugins JS
		============================================ -->
    <script src={{asset("js/plugins.js")}}></script>
    <!-- main JS
		============================================ -->
    <script src={{asset("js/main.js")}}></script>
   
</body>

</html>  

<!doctype html>
<html class="no-js" lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CarGeste | Entrar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href={{asset("favicon.ico")}}>
    <!-- Google Fonts
		============================================ -->
    <link href={{asset("https://fonts.googleapis.com/css?family=Play:400,700")}} rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href={{(asset("css/font-awesome.min.css"))}}>
   
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href={{asset("css/animate.css")}}>
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href={{asset("css/normalize.css")}}>
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href={{asset("css/main.css")}}>
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
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
        <a href="{{route("welcome")}}"><img src={{asset("img/logo/logo.png")}} alt=""></a>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm">

                            <div class="form-group">
                                <label class="control-label" for="username">Número de estudante</label>
                                <input type="text" placeholder="Ex:5223" required="" title="Digita apenas o seu número de aluno" name="AccessDate" id="username" class="form-control">
                                <span class="help-block small">Seu exclusivo número de aluno para o aplicativo</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Senha</label>
                                <input type="password" title="Digite apenas o seu código secreto" placeholder="*************" required="" name="password" id="password" class="form-control">
                                <span class="help-block small">Sua Senha de Acesso</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox"  class="i-checks">Lembrar-me</label>
                                <p class="help-block small">recomendamos esta opção para dispositivos pessoais</p>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Entrar</button>
                           
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p> ©2023. Todos os direitos reservados. Desenvolvido por:<a href="#">Carlos A.Marques</a></p>
			</div>
		</div>   
    </div>
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>knd
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
   
</body>

</html>
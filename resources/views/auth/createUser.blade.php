
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
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
        <a href="#"><img src={{URL::asset("img/logo/logo.png")}} alt=""></a>
			</div>
			<div class="content-error">
				<div class="hpanel">

                    <div class="panel-body">

                        @if(session("errorCadastroNewUsuario"))
                            <div class="alert alert-danger">
                                {{session("errorCadastroNewUsuario")}}
                            </div>
                        @endif
                    
                        <form action={{route('creatUser')}} method="POST" id="loginForm">
                          @csrf
                          
                            <div class="form-group">
                                <label class="control-label" for="username">Nome do Usuario</label>
                                <input type="text" placeholder="Mateus João" value="{{old("name")}}" title="Por favor entra com o seu nome do Usuario" name="name" id="username" class="form-control">
                                <span class="help-block small">Seu nome do usuario sera exclusivo para o aplicativo</span>
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" placeholder="example@gmail.com" value="{{old("email")}}" title="por favor entra com o seu email" name="email" id="email" class="form-control">
                                <span class="help-block small">Seu email exclusivo para o aplicativo</span>
                                @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="password">Senha</label>
                                <input type="password" placeholder="************" value="{{old("password")}}" name="password" id="password" class="form-control">
                                @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="password-1">Confirmação da Senha</label>
                                <input type="password" placeholder="************" value="{{old("password_confirmation")}}" name="password_confirmation" id="password-1" class="form-control">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success btn-block loginbtn">Cadastrar-se</button>
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
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
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
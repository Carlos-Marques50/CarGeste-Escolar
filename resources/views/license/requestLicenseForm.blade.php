<!doctype html>
<html class="no-js" lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CarGeste | Activar Maquina</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type={{asset("image/x-icon")}} href={{asset("img/favicon.ico")}}>
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
               <a href="#"> <img src="img/logo/logo.png" alt=""></a>
			</div>
			<div class="content-error">
				<div class="hpanel">
                  <div class="panel-body">
                    @if(session('sucessRequestLicense'))
                        <div class="alert alert-success">
                            {{session('sucessRequestLicense')}}
                        </div>
                    @endif
                    @if(session('errorRequestLicense'))
                      <div class="alert alert-danger">
                          {{session('errorRequestLicense')}}
                      </div>
                    @endif    
                    @if(session('inactiveRequestLicense'))
                      <div class="alert alert-danger">
                          {{session('inactiveRequestLicense')}}
                      </div>
                    @endif   
                    @if(session('errorDadosRequestLicense'))
                      <div class="alert alert-danger">
                          {{session('errorDadosRequestLicense')}}
                      </div>
                    @endif                                                          
                        <form action={{route("requestLicense")}} id="loginForm" method="post">
                        @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Nome do Usuario</label>
                                <input type="text" value="{{old("username")}}" placeholder="Ex: Cardoso Mafata" autofocus name="username" id="username" class="form-control">
                                @error("username")
                                  <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="email">E-mail</label>
                                <input type="email" value="{{old("email")}}" placeholder="exemplificando@exemplo.com" name="email" id="email" class="form-control">
                                <span class="help-block small">Digite um Email valido para receber a "Chave de Activação"</span>
                                @error('email')
                                  <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="parceiro">Código de Parceiria</label>
                                <input type="number" value="{{old("code_parceiro")}}" placeholder="#####" name="code_parceiro" id="parceiro" class="form-control">
                                @error("code_parceiro")
                                  <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="senha">Password</label>
                                <input type="password" value="{{old("password")}}" placeholder="*****************" name="password" id="senha" class="form-control">
                                @error("password")
                                  <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">Pedir "Chave de Activação"</button>
                            <button type="submit" class="btn btn-primary btn-block">Renovar "Chave de Activação"</button>
                            
                        </form> 
    
                    </div>
                </div>
			</div>

			<div class="text-center login-footer">
			    <p> ©2023. Todos os direitos reservados. Desenvolvido por:<a href="#"> Carlos A.Marques</a></p>
			</div>
		</div>   
    </div>
   
</body>

</html>
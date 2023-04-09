
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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

            <form action="#" method="post" id="loginForm">
            @csrf
                <div class="form-group">

                  <label class="control-label" for="chave">Chave de Activação</label>
                  <input type="text" placeholder="Código da Licença" {{session('machine') ? 'disabled' : '' }} required autofocus title="Cola a Chave de activação que a CarGeste Enviou" name="key" id="chave" class="form-control">
                  <span class="help-block small">Recomendamos aos Parceiros e Técnicos "Copiar e Colar" a Chave de Activação</span>
                </div>
 
                <button {{session('machine') ? 'disabled' : ''}} type="button" class="btn btn-danger btn-block">Activar Maquina</button>
                <a class="btn btn-info btn-block loginbtn" role="button" href={{route("requestLicenseForm")}}>Pedir "Chave de Activação</a>
                <br>

                @if(session('machine'))
                  <div class="alert alert-danger">
                    {{session('machine')}}
                  </div>
                @endif

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
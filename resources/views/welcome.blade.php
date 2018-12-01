<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  		<meta charset="utf-8">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<title>Pasca Mail</title>
  
  		<!-- Bootstrap CSS -->
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  		<!-- Google Fonts -->
  		<link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
  		<!-- Font Awesome -->
  		<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
  		<!-- Style -->
  		<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  
  		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  		<!--[if lt IE 9]>
  			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
  			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  		<![endif]-->
  	</head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
  			<div class="container">
  				<!-- Brand and toggle get grouped for better mobile display -->
  				<div class="navbar-header">
  					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
  						<span class="sr-only">Toggle navigation</span>
  						<span class="icon-bar"></span>
  						<span class="icon-bar"></span>
  						<span class="icon-bar"></span>
  					</button>
  					<a class="navbar-brand" href="{{ url('/') }}">Pasca Mail</a>
  				</div>
  		
  				<!-- Collect the nav links, forms, and other content for toggling -->
  				<div class="collapse navbar-collapse navbar-ex1-collapse">
  					<ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                        @endif
  					</ul>
  				</div><!-- /.navbar-collapse -->
  			</div>
  		</nav>

		<!-- START SECTION -->
        <div class="section hero text-center background-dark dark-bg">
  			<div class="background-image" style="background: url(images/hero.jpg) no-repeat center center; background-size: cover; opacity: .2;"></div>
  			<div class="container">
  				<div class="row">
  					<div class="col-md-12">
  						<h2>Pasca Mail</h2>
  						<p class="lead">Sistem Informasi Surat Program Pascasarjana Universitas Atma Jaya Yogyakarta</p>
  						<ul class="list-inline">
  							<li><a href="https://pasca.uajy.ac.id/" title="Pasca UAJY" class="btn btn-md btn-info">Pascasarjana Universitas Atma Jaya Yogyakarta</a></li>
  							<li><a href="http://uajy.ac.id/" title="UAJY" class="btn btn-md btn-primary">Universitas Atma Jaya Yogyakarta</a></li>
  						</ul>
  					</div>
  				</div>
  			</div>
  		</div>
  		<!--/.section -->


    </body>
</html>

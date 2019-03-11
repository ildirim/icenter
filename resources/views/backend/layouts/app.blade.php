<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>ICenter</title>
		<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="/css/backstyle.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="/css/lines.css" rel='stylesheet' type='text/css' />
		<link href="/css/font-awesome.css" rel="stylesheet">
		<!-- jQuery -->
		<script src="/js/jquery.min.js"></script>
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!-- Nav CSS -->
		<link href="/css/custom.css" rel="stylesheet">
		<!-- Metis Menu Plugin JavaScript -->
		<script src="/js/metisMenu.min.js"></script>
		<script src="/js/custom.js"></script>
		<!-- Graph JavaScript -->
		<script src="/js/d3.v3.js"></script>
		<script src="/js/rickshaw.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand">Icenter</div>
				</div>
				<!-- /.navbar-header -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><span style="color: #ffffff;">{{ Auth::user()->name }}</span> <span class="fa fa-chevron-down" style="color: #ffffff;"></span></a>
						<ul class="dropdown-menu">
							<li class="m_2"><a   onclick="event.preventDefault();
							document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fa fa-lock"></i> Logout</a>
							<form  id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none" >
								{{ csrf_field()}}
							</form></li>
						</ul>
					</li>
				</ul>
				@include('backend.layouts.sidebar')
				<!-- /.navbar-static-side -->
			</nav>
			<div id="page-wrapper">
				<div class="graphs">
					<div class="bs-example5">
						@yield('main')
					</div>
					<div class="copy_layout">
						<p>Copyright {{ date('Y') }} © <a href="https://safaroff.com/">Safaroff Creative Agency</a> </p>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap Core JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<script src="{{ url('/') }}/laravel-ckeditor/ckeditor.js"></script>
	    <script src="{{ url('/') }}/laravel-ckeditor/adapters/jquery.js"></script>

	    <script>
        $('textarea').ckeditor(); // if class is prefered.

		function goBack() {
			window.history.back();
		}
		</script>
	</body>
</html>
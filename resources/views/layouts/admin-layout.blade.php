<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syaiful Garibaldi - {{ $title or 'Administrator Page' }}</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="/js/scripts.js"></script>
</head>
<body class="dashboard">
	<div class="header">
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/admin">SYFG</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="/translate">Translate</a></li>
		        <li><a href="/drive">Drive</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="/logout">Logout</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
	<div class="" id="wrapper" >
	<div class="sidebar" id="sidebar-wrapper">
	@section('sidebar')	

    @show
    </div>
    <div class="main-content col-md-12" id="content-wrapper">
        @yield('content')
    </div>		
	</div>
<script>

</script>	
<script src="/js/app.js"></script>
<script src="/js/list.min.js"></script>
<script src="/js/jquery.form-validator.min.js"></script>
<script>$.validate();</script>
</body>
</html>
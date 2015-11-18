<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syaifulgaribaldi - @yield('title')</title>
	<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body class="terhah">
	<div class="container">
		@section('sidebar')
	    	This is the master sidebar.
	    @show
	    <div class="container">
	        @yield('content')
	    </div>		
	</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syaiful Garibaldi - {{ $title or 'Administrator Page' }}</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	<div class="header">
		<div class="logos">SYAIFUL GARIBALDI</div>
		<div class="lang-mn">
			<ul class="inline">
				<li class="en"><a href="/en">English</a></li>
				<li class="th"><a href="/">Terhah</a></li>
			</ul>
		</div>
	</div>
	<div class="main-body">
	<div class="sidebar">
	@section('sidebar')	
    	<ul class="main-menu">
    		<li><a href="/admin/translate">Terhah Translate</a></li>
    		<li><a href="/admin/drive">Terhah Drive</a></li>
    	</ul>
    @show
    </div>
    <div class="main-content">
        @yield('content')
    </div>		
	</div>

</body>
</html>
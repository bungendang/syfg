<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syaiful Garibaldi - {{ $title or 'Personal Website' }}</title>
	<link rel="stylesheet" href="/assets/css/main.css">
	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/main.js"></script>
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
    	<ul class="sidebar-menu" id="sidebarMenu">
    		<li><a href="/en/terhah-lang">TERHAH LANGUAGE</a></li>
    		<li class="dropdown" id="dropdown">WORKS
				<ul>
					@for ($i = 0; $i < $countKarya; $i++)
<li><a href="/en/works/{{$karya[$i]['slug']}}">{{$karya[$i]['judul']}}</a></li>
					@endfor	
				</ul>
    		</li>
    		<li><a href="/en/bio">BIO</a></li>
    		<li><a href="/en/publication">PUBLICATION</a></li>
    		<li><a href="/en/contact">CONTACT</a></li>
    	</ul>
    @show
    </div>
    <div class="main-content">
        @yield('content')
    </div>		
	</div>

</body>
</html>
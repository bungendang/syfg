<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syaiful Garibaldi - {{ $title or 'Personal Website' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Syaiful Garibaldi Personal Website">
    <meta name="keywords" content="Art">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="stylesheet" href="/assets/css/main.css">
	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/main.js"></script>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="navigation">
				<div class="logos">SYAIFUL GARIBALDI</div>
				<div class="lang-mn">
					<ul class="inline">
						<li class="en"><a href="/en">ENGLISH</a></li>
						<li class="th"><a href="/">TERHAH</a></li>
					</ul>
				</div>
			</div>		
		</div>
	</div>
	<div class="main-body">
	<div class="container">
		<div class="sidebar">
		@section('sidebar')	
	    	<ul class="sidebar-menu" id="sidebarMenu">
	    		<li><a href="/en/terhah-lang" class="{{ (\Request::route()->getName() == 'en.terhah-lang') ? 'active' : '' }}">TERHAH LANGUAGE</a></li>
	    		<li class="dropdown {{ (\Request::route()->getName() == 'en.worksub') ? 'display' : '' }}" id="dropdown">WORKS
					<ul>
						@for ($i = 0; $i < $countKarya; $i++)				
	<li><a href="/en/works/{{$karya[$i]['slug']}}" class="{{ Request::is('en/works/'.$karya[$i]['slug']) ? 'active' : '' }}">{{$karya[$i]['judul']}}</a></li>
						@endfor	
					</ul>
	    		</li>
	    		<li><a href="/en/bio" class="{{ (\Request::route()->getName() == 'en.bio') ? 'active' : '' }}">BIO</a></li>
	    		<li><a href="/en/publication" class="{{ (\Request::route()->getName() == 'en.publication') ? 'active' : '' }}">PUBLICATION</a></li>
	    		<li><a href="/en/contact" class="{{ (\Request::route()->getName() == 'en.contact') ? 'active' : '' }}">CONTACT</a></li>
	    	</ul>
	    @show
	    </div>
	    <div class="main-content">
	        @yield('content')
	    </div>			
	</div>
	</div>
</body>
</html>
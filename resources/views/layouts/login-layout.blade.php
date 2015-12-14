<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syaiful Garibaldi - {{ $title or 'Personal Website' }}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="main-content">
        @yield('content')
    </div>		
</body>
</html>
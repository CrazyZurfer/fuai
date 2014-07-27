<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title') - Feuai</title>
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	@yield('extrastyles')
	<style type="text/css">
	body {
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #eee;
	}
	@yield('extracss')
	</style>
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>
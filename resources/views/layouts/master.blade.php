<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Department Order Tracker')
    </title>

	<meta charset='utf-8'>
    <link href="/css/style.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

	<header>
		<h1>
			@yield('bigtext', 'Department Order Tracker')
		</h1>
		<img
		src="images/inventory.jpg"
		alt="picture of an inventory on a clipboard"
		width="300">
	</header>


	<div>
		@yield('content')
	</div>


	<footer>

	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>

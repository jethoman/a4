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
    @if(Session::get('message') != null)
            <div class='message'>{{ Session::get('message') }}</div>
    @endif
	<header>
        <div class='background'>
    	<h1>
			@yield('bigtext', 'Department Order Tracker')
		</h1>
		<img
		src="/images/inventory.jpg"
		alt="picture of an inventory on a clipboard"
		width="500">
	</header>
    <nav>
        <ul>
            <li><a href='/'>Home</a></li>
            <!--<li><a href='/search'>Search</a></li>-->
            <li><a href='/orders/new'>Add an Order</a></li>
            <li><a href='/orders'>View All Orders</a></li>

        </ul>
    </nav>

	<div>
		@yield('content')
	</div>

</div>
	<footer>

	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>  @lang("stg." . config('app.name', 'stg'))  @yield('title')  </title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap5.3.3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-dashboard/css/app.css') }} " >

	@stack('css')
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
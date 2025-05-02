<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png"> --}}
    
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!--======  Bootstrap ======-->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5.3.3/bootstrap5.3.3.css') }}">

    <!--====== font awesome Icons ======-->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/all.min.css') }}">

    <!--====== aos animation ======-->
    <link rel="stylesheet" href="{{ asset('assets/aos/aos.css') }}">

    <!--====== swipper number ======-->
    <link rel="stylesheet" href="{{ asset('assets/swiper/swiper-bundle.min.css') }}">

    <style>
        :root {
            --align: @lang('helal.align');
            --sign: @lang('helal.sign');                        
        }
         
    </style>
    <!--====== aos custom ======-->
    <link rel="stylesheet" href="{{ asset('assets/custom/custom.css') }}">
   
    <title>  @lang("stg." . config('app.name', 'stg')) | @yield('title')  </title>

</head>
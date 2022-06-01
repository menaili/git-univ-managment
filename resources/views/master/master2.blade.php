<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title', 'My App')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Affan - PWA Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }} ">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/icons/icon-96x96.png') }} ">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/icons/icon-152x152.png') }} ">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets/img/icons/icon-167x167.png') }} ">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icons/icon-180x180.png') }} ">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/apexcharts.css') }} ">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }} ">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('assets/manifest.json') }} ">

    <style>

        @media (min-width: 768px){
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/sidebars.css') }} " rel="stylesheet">
</head>
<body>


@include('master.n-side-bar')
@yield('content')

</body>

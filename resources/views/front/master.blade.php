<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/') }}/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('/') }}/front/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}/front/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('front.includes.menu')

<!-- Page Header -->
@yield('main-contain')


<hr>

<!-- Footer -->
@include('front.includes.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/') }}/front/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('/') }}/front/js/clean-blog.min.js"></script>

</body>

</html>

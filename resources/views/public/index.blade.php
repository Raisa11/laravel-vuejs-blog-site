<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/')}}public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('/')}}public/css/blog-home.css" rel="stylesheet">

</head>

<body>
<div id="app">
<!-- Navigation -->
<public-nav></public-nav>

<!-- Page Content -->
<div class="container">

<public-master></public-master>
    </div>


<public-footer></public-footer>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('/')}}public/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>to-do</title>

    <!-- MDB icon -->
{{--    <link rel="icon" href=" {{asset('assets')}}/img/mdb-favicon.ico" type="image/x-icon" />--}}
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css')}}"
    />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="{{asset('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap')}}"
    />
    <!-- MDB -->
    <link rel="stylesheet" href=" {{asset('assets')}}/css/mdb.min.css" />
    <link rel="stylesheet" href=" {{asset('assets')}}/css/toastify.min.css" />

    <script type="text/javascript" src=" {{asset('assets/')}}/js/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src=" {{asset('assets/')}}/js/axios.min.js"></script>
    <script type="text/javascript" src=" {{asset('assets/')}}/js/toastify-js.js"></script>

    <script type="text/javascript" src=" {{asset('assets/')}}/js/config.js"></script>

<style>
    .completed {
    text-decoration: line-through;
    }
</style>
</head>
<body>

<main>
    @yield('content')
</main>

<!-- MDB -->
<script type="text/javascript" src=" {{asset('assets/')}}/js/mdb.umd.min.js"></script>


</body>
</html>

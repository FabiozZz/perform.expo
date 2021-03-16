<!doctype html>
<html lang="ru">
<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #ffffff;
            font-family: Arial, Roboto, 'Times New Roman',serif;
        }
    </style>
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
    @include('guest.inc.header')

    @yield('content')

    @include('guest.inc.footer')
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>

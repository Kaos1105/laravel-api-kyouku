<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <title>SUPER JUNIOR 限定動画&グッズ当たる!キャンペーン</title>
    <meta name="format-detection" content="telephone=no">
    <link href="{{ asset('css/html5reset-1.6.1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
    @yield('style')

    @yield('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/picturefill/3.0.2/picturefill.js"></script>
</head>
<body>
@yield('google')
<div id="base_wrap">

@yield('main')

<!--footer-->
    <div class="footer">
        <div class="inner">
            Copyright &copy;2021 Unilever
        </div>
    </div>
</div>
</body>
</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! settings()->get("scripts_head") !!}

    <title>{{ settings()->get("page_title") }}</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ settings()->get("page_description") }}">
    <meta name="robots" content="{{ settings()->get("page_robots") }}">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/less-partials/slider.min.css') }}" rel="stylesheet">

    <style type='text/css'>.uil-sunny-css{background:0;width:200px;height:200px;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto}.uil-sunny-circle{position:absolute;width:100px;height:100px;border-radius:50px;top:50px;left:50px;background:#008dff}.uil-sunny-light>div{position:absolute;width:0;height:0;border-left:25px solid #ffec00;border-top:10px solid transparent;border-bottom:10px solid transparent}.uil-sunny-light>div:nth-of-type(1){-ms-transform:rotate(30deg) translate(70px,0);-moz-transform:rotate(30deg) translate(70px,0);-webkit-transform:rotate(30deg) translate(70px,0);-o-transform:rotate(30deg) translate(70px,0);transform:rotate(30deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(2){-ms-transform:rotate(60deg) translate(70px,0);-moz-transform:rotate(60deg) translate(70px,0);-webkit-transform:rotate(60deg) translate(70px,0);-o-transform:rotate(60deg) translate(70px,0);transform:rotate(60deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(3){-ms-transform:rotate(90deg) translate(70px,0);-moz-transform:rotate(90deg) translate(70px,0);-webkit-transform:rotate(90deg) translate(70px,0);-o-transform:rotate(90deg) translate(70px,0);transform:rotate(90deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(4){-ms-transform:rotate(120deg) translate(70px,0);-moz-transform:rotate(120deg) translate(70px,0);-webkit-transform:rotate(120deg) translate(70px,0);-o-transform:rotate(120deg) translate(70px,0);transform:rotate(120deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(5){-ms-transform:rotate(150deg) translate(70px,0);-moz-transform:rotate(150deg) translate(70px,0);-webkit-transform:rotate(150deg) translate(70px,0);-o-transform:rotate(150deg) translate(70px,0);transform:rotate(150deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(6){-ms-transform:rotate(180deg) translate(70px,0);-moz-transform:rotate(180deg) translate(70px,0);-webkit-transform:rotate(180deg) translate(70px,0);-o-transform:rotate(180deg) translate(70px,0);transform:rotate(180deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(7){-ms-transform:rotate(210deg) translate(70px,0);-moz-transform:rotate(210deg) translate(70px,0);-webkit-transform:rotate(210deg) translate(70px,0);-o-transform:rotate(210deg) translate(70px,0);transform:rotate(210deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(8){-ms-transform:rotate(240deg) translate(70px,0);-moz-transform:rotate(240deg) translate(70px,0);-webkit-transform:rotate(240deg) translate(70px,0);-o-transform:rotate(240deg) translate(70px,0);transform:rotate(240deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(9){-ms-transform:rotate(270deg) translate(70px,0);-moz-transform:rotate(270deg) translate(70px,0);-webkit-transform:rotate(270deg) translate(70px,0);-o-transform:rotate(270deg) translate(70px,0);transform:rotate(270deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(10){-ms-transform:rotate(300deg) translate(70px,0);-moz-transform:rotate(300deg) translate(70px,0);-webkit-transform:rotate(300deg) translate(70px,0);-o-transform:rotate(300deg) translate(70px,0);transform:rotate(300deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(11){-ms-transform:rotate(330deg) translate(70px,0);-moz-transform:rotate(330deg) translate(70px,0);-webkit-transform:rotate(330deg) translate(70px,0);-o-transform:rotate(330deg) translate(70px,0);transform:rotate(330deg) translate(70px,0)}.uil-sunny-light>div:nth-of-type(12){-ms-transform:rotate(360deg) translate(70px,0);-moz-transform:rotate(360deg) translate(70px,0);-webkit-transform:rotate(360deg) translate(70px,0);-o-transform:rotate(360deg) translate(70px,0);transform:rotate(360deg) translate(70px,0)}@-webkit-keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}@-webkit-keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}@-moz-keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}@-ms-keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}@-moz-keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}@-webkit-keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}@-o-keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}@keyframes uil-sunny-rotate{0%{-ms-transform:translate(88px,90px) rotate(0deg);-moz-transform:translate(88px,90px) rotate(0deg);-webkit-transform:translate(88px,90px) rotate(0deg);-o-transform:translate(88px,90px) rotate(0deg);transform:translate(88px,90px) rotate(0deg)}100%{-ms-transform:translate(88px,90px) rotate(60deg);-moz-transform:translate(88px,90px) rotate(60deg);-webkit-transform:translate(88px,90px) rotate(60deg);-o-transform:translate(88px,90px) rotate(60deg);transform:translate(88px,90px) rotate(60deg)}}.uil-sunny-light{width:25px;height:20px;-ms-animation:uil-sunny-rotate 1s linear infinite;-moz-animation:uil-sunny-rotate 1s linear infinite;-webkit-animation:uil-sunny-rotate 1s linear infinite;-o-animation:uil-sunny-rotate 1s linear infinite;animation:uil-sunny-rotate 1s linear infinite}
        div.preloader { position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #fff}
    </style>

    @stack('style')
</head>
<body class="{{ !empty($body_class) ? $body_class : '' }}">
<div class="preloader">
    <div class="status">
        <div class="uil-sunny-css" style="transform:scale(0.6);"><div class="uil-sunny-circle"></div><div class="uil-sunny-light"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
    </div>
</div>

{!! settings()->get("scripts_afterbody") !!}
@include('layouts.partials.header')

@yield('content')

@include('layouts.partials.footer')
@include('layouts.partials.cookies')

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/app.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>
@auth
    @include('layouts.partials.inline')
@endauth

<script src="{{ asset('/js/datepicker/bootstrap-datepicker.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/datepicker/bootstrap-datepicker.pl.min.js') }}" charset="utf-8"></script>
<link href="{{ asset('/js/datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<script>
    $('#checkin button').datepicker({
        format: 'yyyy/mm/dd',
        language: 'pl',
        startDate: '{{ \Carbon\Carbon::now()->format('Y/m/d') }}'
    }).on('changeDate', function(event) {
        const selectedDate = event.format();
        const dateParts = selectedDate.split('/');
        $('#checkin .date_day').text(dateParts[2]);
        $('#checkin .date_month').text(dateParts[1]);
        $('#checkin .date_year').text(dateParts[0]);
        $("#checkin input[type=hidden]").val(selectedDate);
        $(this).datepicker('hide');
    });

    $('#checkout button').datepicker({
        format: 'yyyy/mm/dd',
        language: 'pl',
        startDate: '{{ \Carbon\Carbon::tomorrow()->format('Y/m/d') }}'
    }).on('changeDate', function(event) {
        const selectedDate = event.format();
        const dateParts = selectedDate.split('/');
        $('#checkout .date_day').text(dateParts[2]);
        $('#checkout .date_month').text(dateParts[1]);
        $('#checkout .date_year').text(dateParts[0]);
        $("#checkout input[type=hidden]").val(selectedDate);
        $(this).datepicker('hide');
    });

    $('.mainmenu li:first-child').addClass('active');

    const dzis = '{{ \Carbon\Carbon::now()->format('Y/m/d') }}',
        jutro = '{{ \Carbon\Carbon::tomorrow()->format('Y/m/d') }}',
        today = dzis.split('/'),
        tomorrow = jutro.split('/');

    $('#checkin .date_day').text(today[2]);
    $('#checkin .date_month').text(today[1]);
    $('#checkin .date_year').text(today[0]);
    $("#checkin input[type=hidden]").val(dzis);

    $('#checkout .date_day').text(tomorrow[2]);
    $('#checkout .date_month').text(tomorrow[1]);
    $('#checkout .date_year').text(tomorrow[0]);
    $("#checkout input[type=hidden]").val(jutro);

    $(document).ready(function(){
        $(".rslidess").responsiveSlides({auto:true, pager:true, nav:true, timeout:9000, random:false, speed: 800});

    });
    $(window).load(function() {
        $(".rslidess").show();
        $("#slider").css({"padding-top":"0"});
        $('.preloader').delay(350).fadeOut('slow');
    });
</script>
@stack('scripts')

{!! settings()->get("scripts_beforebody") !!}

</body>
</html>

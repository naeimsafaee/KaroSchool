<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ setting('site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}?x=8" rel="stylesheet">
    <script src="{{asset('assets/js/JQUERY.js')}}"></script>
    <script src="{{asset('assets/js/BOOTSTRAP.js')}}"></script>
    <script src="{{asset('assets/js/ajax.js')}}"></script>
    <script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/js/gsap.min.js')}}"></script>
    <script src="{{asset('assets/js/morphsvg.js')}}"></script>
    <script src="{{asset('assets/js/playerjs.js')}}"></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JHWEPD7VF6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-JHWEPD7VF6');
    </script>

</head>

<link rel="apple-touch-icon" sizes="180x180" href="{{ Voyager::image(setting('favicon.apple')) }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ Voyager::image(setting('favicon.32')) }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ Voyager::image(setting('favicon.16')) }}">
<link rel="manifest" href="{{ Voyager::image(setting('favicon.manifest')) }}">
<link rel="mask-icon" href="{{ Voyager::image(setting('favicon.mask-icon')) }}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<body>
@php
    $categories =\App\Models\CourseCategory::all();
@endphp
<div class="container-fluid">
    <ul class="nav-list mobile-nav">
        <img class="close" src="{{asset('assets/icon/close.svg')}}">
        <li>
            <a class="shrink yellow-btn flex-box" href="{{ route('login') }}">
                حساب کاربری
            </a>
        </li>
        <li>
            <span></span>
            <a class=" flex-box drop-btn">
                دروه ها
                <img class="arrow" src="{{asset('assets/icon/bottom-arrow.svg')}}">

            </a>
            <ul class="nav-dropdown">

                @foreach($categories as $category)
                    <li>
                        <a class="flex-box" href="{{  route('course', array_merge(request()->query->all(), ["category" => $category->id]))  }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach

            </ul>
        </li>
{{--        <li>--}}
{{--            <span></span>--}}
{{--            <a href="#"> برنامه ها</a>--}}
{{--        </li>--}}
        <li>
            <span></span>
            <a class=" flex-box" href="{{ route('topics' , 'new') }}">
                <img src="{{asset('assets/icon/Sofa.svg')}}">
                پرسش و پاسخ
            </a>
        </li>
        <li>
            <span></span>
            <a class=" flex-box" href="{{ route('contact_us') }}">
                <img src="{{asset('assets/icon/contact.svg')}}">
                تماس با ما
            </a>
        </li>
    </ul>
    <div class="overlay"></div>

    <div class="row">
        @include('header')

        @yield('content')

        @include('footer')


    </div>
</div>

@yield('optional_footer')

<script src="{{asset('assets/js/master.js')}}"></script>
<script src="{{asset('assets/js/socail-hover.js')}}"></script>
<script src="{{asset('assets/js/morph-inline-code.js')}}"></script>

<script>

    function save_in_cookie() {

        let date = new Date();
        date.setTime(date.getTime() + (3 * 24 * 60 * 60 * 1000));

        document.cookie = "is_closed=yes; expires=" + date.toUTCString();
    }

    const getCookieValue = (name) => (
        document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)')?.pop() || false
    )

    if(getCookieValue('is_closed') == "false"){

        document.getElementById("download_box").style.display="block";
    }

</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ setting('site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/JQUERY.js')}}"></script>
    <script src="{{asset('assets/js/BOOTSTRAP.js')}}"></script>
    <script src="{{asset('assets/js/ajax.js')}}"></script>

</head>
<body>

<div class="container-fluid">
    <div class="row">

        @yield('content')

    </div>
</div>

</body>
</html>

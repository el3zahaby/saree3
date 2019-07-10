<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('chat_asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <meta name="viewpsentort" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

{{--    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>--}}
    <link rel='stylesheet prefetch' href='{{ asset('css/fonts/fontawesome/all.css') }}'>


	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">


    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

    <script src="https://use.typekit.net/hoy3lrg.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">

{{--    <meta name="room" content="{{$friend->id}}">--}}
{{--    <meta name="element" content="element_{{$friend->get_user_info_parent->id}}">--}}

    <meta name="url" content="{{url('/')}}">
    <!-- jQuery -->
{{--    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>--}}
    <script src="{{asset('chat_asset/jquery-3.1.0.min.js')}}"></script>
    <script src="{{asset('chat_asset/jquery.ajax-progress.js')}}"></script>
    <script src="{{ asset('js/xss.js') }}"></script>

    <link href='{{ asset('css/animate.min.css') }}' rel='stylesheet' type='text/css'>
    {{--    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">--}}


    <style>
        .modal, .modal-backdrop {
            position: absolute !important;
        }
    </style>

</head>
<body class="d-none">

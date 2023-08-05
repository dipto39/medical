<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        {{-- ofline --}}
        <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    @stack('title')
</head>

<body>
    <div class="main">
        <div class="header text-center w-100 position-relative p-3 border">
            <a href="{{url('/doctor/dashboard')}}"><h3 class="text-center">Medican Report Meker</h3></a>
            <div class="landrbutton position-absolute d-flex justify-content-center align-items-center ">
                {{-- <img src="{{asset('/assets/image/risk.png')}}" alt="risk" height="20" srcset="" class="position-absolute dangericon"> --}}
                <a href="{{url('/doctor/profile')}}" class="text-dark"><img src="{{(session()->get('img') == null) ? asset('/assets/image/user.png') : asset('/assets/image/profile/'.session()->get('img'))}}"  alt="">
                <h6 class="m-2"> <span class="user_name"> {{session()->get('name')}}</span>| </a><a class="text-danger" href="{{url('logout')}}">Sign Out</a></h6>
            </div>
        </div>
        <div class="allcontent  d-md-flex d-block pt-1">
            <div class="left_side border h-100">
                <ul class="list-unstyled text-center text-capitalize">
        
                    <a href="{{url('/doctor/dashboard')}}">
                        
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "dashboard") !== false || $_SERVER['REQUEST_URI'] == "/doctor"){  echo "active"; } @endphp">Dashboard </li>
                    </a>
                    <a href="{{url('/doctor/report-formats')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "report-formats") !== false){  echo "active"; } @endphp">Report Formats </li>
                    </a>
                    <a href="{{url('/doctor/recived-reports')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "recived-reports") !== false){  echo "active"; } @endphp">Received Reports </li>
                    </a>
                    <a href="{{url('/doctor/complete-reports')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "complete-reports") !== false){  echo "active"; } @endphp">Complete Reports </li>
                    </a>
                    <a href="{{url('/doctor/all-reports')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "all-reports") !== false){  echo "active"; } @endphp">All Reports </li>
                    </a>
                    <a href="">
                        <li>FAQ </li>
                    </a>
                    <a href="">
                        <li > 
                            Help
                        </li>
                    </a>
                </ul>
            </div>
            <div class="right_side w-100 ms-1">
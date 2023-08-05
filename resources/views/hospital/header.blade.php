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
    <link rel="shortcut icon" href="{{url('/assets/image/logo.png')}}" type="image/x-icon">

    @stack('title')
</head>

<body>
    <div class="main">
        <div class="header text-center w-100 position-relative  p-3 border">
            <a href="{{url('/hospital/dashboard')}}"><h3 class="text-center">Medical Report Meker</h3></a>

            <div class="landrbutton position-absolute d-flex justify-content-center align-items-center position-relative">
                {{-- <img src="{{asset('/assets/image/risk.png')}}" alt="risk" height="20" srcset="" class="position-absolute dangericon"> --}}
                    <a href="{{url('/hospital/profile')}}" class="text-dark"><img src="{{asset('/assets/image/user.png')}}" width="35" alt="">
                    <h6 class="m-2"><span class="user_name">  Hi {{session()->get('name')}}</span> | </a><a class="text-danger" href="{{url('/logout')}}">Sign Out</a></h6>
                
            </div>
        </div>
        <div class="allcontent  d-md-flex d-block pt-1 w-100">
            <div class="left_side border h-100">
                <ul class="list-unstyled text-center text-capitalize">

                    <a href="{{url('/hospital/dashboard')}}">
                        
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "dashboard") !== false or $_SERVER['REQUEST_URI'] == "/hospital/" ){  echo "active"; } @endphp">Dashboard </li>
                    </a>
                    <a href="{{url('/hospital/new-report')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "new-report") !== false){  echo "active"; } @endphp">Add New Report </li>
                    </a>
                    <a href="{{url('/hospital/sent-reports')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "sent-reports") !== false){  echo "active"; } @endphp">Sent Reports </li>
                    </a>
                    <a href="{{url('/hospital/complete-reports')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "complete-reports") !== false){  echo "active"; } @endphp">Complete Reports </li>
                    </a>
                    <a href="{{url('/hospital/all-reports')}}">
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
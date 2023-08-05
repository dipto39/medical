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
        <div class="header text-center w-100 position-relative  p-3 border">
            <a href="{{url('/admin/dashboard')}}"><h3 class="text-center">Medical Report Meker</h3></a>
            <div class="landrbutton position-absolute d-flex justify-content-center align-items-center ">
                <a class="text-dark"><img src="{{asset('/assets/image/user.png')}}" width="35" alt="">
                <h6 class="m-2 "> <span class="user_name">Admin</span> |</a> <a class="text-danger" href="{{url('/admin/logout')}}">Sign Out</a></h6>
            </div>
        </div>
        <div class="allcontent d-md-flex d-block pt-1">
            <div class="left_side border h-100">
                <ul class="list-unstyled text-center text-capitalize">
        
                    <a href="{{url('/admin/dashboard')}}">
                        
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "dashboard") !== false){  echo "active"; } @endphp">Dashboard </li>
                    </a>
                    <a href="{{url('/admin/doctors')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "doctors") !== false){  echo "active"; } @endphp">Doctors </li>
                    </a>
                    <a href="{{url('/admin/hospitals')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "hospitals") !== false){  echo "active"; } @endphp">Hospitals</li>
                    </a>
                    <a href="{{url('/admin/doctor-request')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "doctor-request") !== false){  echo "active"; } @endphp">Doctor Request </li>
                    </a>
                    <a href="{{url('/admin/hospital-request')}}">
                        <li class="@php if (strpos($_SERVER['REQUEST_URI'], "hospital-request") !== false){  echo "active"; } @endphp">Hospital Request </li>
                    </a>
                    <a href="">
                        <li class="">Setting </li>
                    </a>

                </ul>
            </div>
            <div class="right_side w-100 ms-1">
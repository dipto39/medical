@extends('hospital.main')
@push('title')
<title>{{session()->get('name')}} Profile || Medical Report Meker</title>
@endpush
@section('content')

<div class="profile d-flex justify-content-center align-items-center ">
    <div class="row px-5 py-1 py-5 border position-relative">
        <div class="text-center col-12">
            <span class="text-danger mx-5 h6 {{($details['hphn'] == null) ? "" : "d-none" }}"> Please Update you Profile</span>
        </div>
        <div class="col-12 text-center">
            @if(session()->has('error'))
            <span class="text-danger mx-5 h6"> {{session()->get('error')}}</span>
       
   @endif
        </div>
        <div class="col-12 text-center mb-5">
            <h4>Hospital Profile</h4>
        </div>
 
        <div class="col-lg-6 col-md-6 ">
            <img src="{{asset('/assets/image/hospital.png')}}" alt="">
            <h4 class="text-primary">{{session()->get('name')}} Pvt. Ltd.</h4>
            <p>{{($details['haddress'] == null) ? "Unknown Address" : $details['haddress'] }}</p>
        </div>
        <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
            <a href="{{url('/hospital/edit-profile')}}"><img role="button" class="editProfile" src="../assets/image/edit.png" alt="edit"></a>
            <p class="mt-5"><span class="text-primary"><img src="../assets/image/phone.png" alt="Phone"
                        width="30"></span> {{($details['hphn'] == null) ? "Unknown Phone" : $details['hphn'] }}</p>
            <p><span><img src="../assets/image/email.png" alt="Phone" width="30"></span>
                {{($details['hemail'] == null) ? "Unknown Email" : $details['hemail'] }}</p>
            <p class=""><span><img src="../assets/image/location.png" width="30" alt="location"></span>
                <a class="mt-1" href="{{($details['hlocation'] == null) ? url('') : $details['hlocation'] }}">{{($details['hlocation'] == null) ? "Unknown location" : $details['hlocation'] }}...
                </a> </p>
        </div>
    </div>
</div>
@endsection
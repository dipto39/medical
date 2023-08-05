@extends('doctor.main')
@push('title')
<title>{{session()->get('name')}} Profile || Medical Report Meker</title>
@endpush
@section('content')
<div class=" profile d-flex justify-content-center align-items-center">
    <div class="row px-5 py-1 py-5 border text-sm-center text-md-center position-relative">
        <div class="col-12">
            <span class=" text-danger  h6 {{($details['dphn'] == null) ? "" : "d-none" }}"> Please Update you Profile</span>
        </div>
        @if(session()->has('error'))
        <div class="col-12">
        <span class="text-danger mx-5 h6"> {{session()->get('error')}}</span>
    </div>
@endif
@if(session()->has('block'))
<div class="col-12">
<span class="text-danger mx-5 h6"> {{session()->get('block')}}</span>
</div>
@endif
        <div class="col-12 text-center mb-5">
            <h4>Doctor Profile</h4>
        </div>


        <div class="col-lg-6 col-md-6 ">
            <img src="{{($details['dimg'] == null) ? asset('/assets/image/user.png') : asset("assets/image/profile/".$details['dimg']) }}" width="80" class="rounded-circle" alt="">
            
            <h4 class="text-primary mt-3">Dr. {{session()->get('name')}}</h4>
            <h6>{{($details['degree'] == null) ? "Unknown Degree" : $details['degree'] }}</h6>
            <h6>{{($details['special'] == null) ? "Unknown Specialiest" : $details['special'] }}</h6>
            <h6>{{($details['dhospital'] == null) ? "Unknown Hosptial" : $details['dhospital'] }}</h6>
            <h6>BMDC Reg No. {{($details['bmcd'] == null) ? "Unknown" : $details['bmcd'] }}</h6>
        </div>
        <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
            <a href="{{url('/doctor/edit-profile')}}"><img role="button" class="editProfile" src="../assets/image/edit.png" alt="edit"></a>
            <p class="mt-5"><span class="text-primary"><img src="../assets/image/phone.png" alt="Phone"
                        width="30"></span> {{($details['dphn'] == null) ? "Unknown Phone" : $details['dphn'] }}</p>
            <p><span><img src="../assets/image/email.png" alt="Phone" width="30"></span>
                {{($details['demail'] == null) ? "Unknown Email" : $details['demail'] }}</p>
        </div>
    </div>
</div>
@endsection
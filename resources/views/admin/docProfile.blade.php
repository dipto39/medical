@extends('admin.main')
@push('title')
<title>{{session()->get('name')}} Profile || Medical Report Meker</title>
@endpush
@section('content')
<div class=" profile d-flex justify-content-center align-items-center">
    <div class="row px-5 py-1 py-5 border text-sm-center text-md-center position-relative">
        <div class="col-12 text-center mb-5">
            <h4>Doctor Profile</h4>
        </div>
        {{-- <span class="position-absolute text-danger top-0 start-0 h6 {{($details['dphn'] == null) ? "" : "d-none" }}"> Please Update you Profile</span> --}}
        <div class="col-lg-6 col-md-6 ">
            <img src="{{($details['dimg'] == null) ? asset('/assets/image/user.png') : asset("assets/image/profile/".$details['dimg']) }}" width="80" class="rounded-circle" alt="">
            
            <h4 class="text-primary mt-3">Dr. {{$details['dname']}}</h4>
            <h6>{{($details['degree'] == null) ? "Unknown Degree" : $details['degree'] }}</h6>
            <h6>{{($details['special'] == null) ? "Unknown Specialiest" : $details['special'] }}</h6>
            <h6>{{($details['dhospital'] == null) ? "Unknown Hosptial" : $details['dhospital'] }}</h6>
            <h6>BMDC Reg No. {{($details['bmcd'] == null) ? "Unknown" : $details['bmcd'] }}</h6>
        </div>
        <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
            <p class="mt-5"><span class="text-primary"><img src="{{asset('/assets/image/phone.png')}}" alt="Phone"
                        width="30"></span> {{($details['dphn'] == null) ? "Unknown Phone" : $details['dphn'] }}</p>
            <p><span><img src="{{asset('/assets/image/email.png')}}" alt="Phone" width="30"></span>
                {{($details['demail'] == null) ? "Unknown Email" : $details['demail'] }}</p>
                <div class="row mt-3">
                    @if (isset($status))
                    @if ($status == 1)
                    <div class="col-12 text-end">
                        <a href="{{url('/admin/doctor-block/'.$details['did'])}}" class="btn btn-danger">Block</a>
                    </div>
                    @else
                    <div class="col-12 text-end">
                        <a href="{{url('/admin/doctor-active/'.$details['did'])}}" class="btn btn-success">Approve</a>
                    </div>
                    @endif
                    @endif
                    @if (isset($aprove))
                    <div class="col-6 text-end">
                        <a href="{{url('/admin/doctor-block/'.$details['did'])}}" class="btn btn-danger">Block</a>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{url('/admin/doctor-active/'.$details['did'])}}" class="btn btn-success">Approve</a>
                    </div>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
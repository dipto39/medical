@extends('admin.main')
@push('title')
<title>Hosptial profile || Medical Report Meker</title>
@endpush
@section('content')

<div class="profile d-flex justify-content-center align-items-center ">
    <div class="row px-5 py-1 py-5 border position-relative">
        <div class="text-center">
            <span class="text-danger mx-5 h6 {{($details['hphn'] == null) ? "" : "d-none" }}"> Please Update you Profile</span>
        </div>
        <div class="col-12 text-center mb-5">
            <h4>Hospital Profile</h4>
        </div>
 
        <div class="col-lg-6 col-md-6 ">
            <img src="{{asset('/assets/image/hospital.png')}}" alt="">
            <h4 class="text-primary">{{($details['hname'] == null) ? "Unknown Name" : $details['hname']}} Pvt. Ltd.</h4>
            <p>{{($details['haddress'] == null) ? "Unknown Address" : $details['haddress'] }}</p>
        </div>
        <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
            <p class="mt-5"><span class="text-primary"><img src="{{asset('/assets/image/phone.png')}}" alt="Phone"
                        width="30"></span> {{($details['hphn'] == null) ? "Unknown Phone" : $details['hphn'] }}</p>
            <p><span><img src="{{asset('/assets/image/email.png')}}" alt="Phone" width="30"></span>
                {{($details['hemail'] == null) ? "Unknown Email" : $details['hemail'] }}</p>
            <p class=""><span><img src="{{asset('/assets/image/location.png')}}" width="30" alt="location"></span>
                <a class="mt-1" href="{{($details['hlocation'] == null) ? url('') : $details['hlocation'] }}">{{($details['hlocation'] == null) ? "Unknown location" : $details['hlocation'] }}...
                </a> </p>
                <div class="row mt-3">
                    @if (isset($status))
                    @if ($status == 1)
                    <div class="col-12 text-end">
                        <a href="{{url('/admin/hospital-block/'.$details['hid'])}}" class="btn btn-danger">Block</a>
                    </div>
                    @else
                    <div class="col-12 text-end">
                        <a href="{{url('/admin/hospital-active/'.$details['hid'])}}" class="btn btn-success">Approve</a>
                    </div>
                    @endif
                   
                   
                    @endif
                    
                    @if (isset($aprove))
                    <div class="col-6">
                        <a href="{{url('/admin/hospital-block/'.$details['hid'])}}" class="btn btn-danger">Block</a>
                    </div>
          
                    <div class="col-6">
                        <a href="{{url('/admin/hospital-active/'.$details['hid'])}}" class="btn btn-success">Approve</a>
                    </div>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
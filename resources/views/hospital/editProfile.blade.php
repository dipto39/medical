@extends('hospital.main')
@push('title')
<title>Update {{session()->get('name')}} Profile || Medical Report Meker</title>
@endpush
@section('content')
<div class="edit_profile_section border p-2">
    <form id="nrform" action="{{url('/hospital/update-profile')}}" method="post" class="py-1 px-2 " enctype="multipart/form-data">
        @csrf
        <div class="row gx-5 px-5">
            <div class="col-12 mb-4 mt-3">
                <h4 class="text-center ">Edit you profile </h4>
            </div>
            <div class="col-md-12 col-lg-6 pe-lg-5">
                <div class="form-group row mb-5 ">
                    <div class="col-4">
                        <label for="edpname">Hospital Name *</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="" value="{{($user['hname']) ? $user['hname'] : old('name') }}" required>
                    </div>
                   <span class="text-danger">
                    @error('name')
                    {{$message}}    
                    @enderror
                   </span>
                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpemail">Email *</label>
                    </div>
                    <div class="col-8">
                        <input type="email"  class="form-control" name="email" id="email"
                            aria-describedby="helpId" placeholder="" value="{{($user['hemail']) ? $user['hemail'] : old('email') }}" disabled required>
                    </div>
                    <span class="text-danger">
                        @error('email')
                        {{$message}}    
                        @enderror
                    </span>
                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpoldpass">Old Password</label>
                    </div>
                    <div class="col-8">
                        <input type="password" class="form-control" name="edpoldpass" id="edpoldpass"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    
                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpnpass">New Password </label>
                    </div>
                    <div class="col-8">
                        <input type="password" class="form-control" name="edpnpass" id="edpnpass"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="col-12">
                        <small id="edpnpassH" class="form-text text-muted">Help text</small>
                    </div>
                </div>


            </div>
            <div class="col-md-12 col-lg-6 ps-lg-5">
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpphone">Phone No *</label>
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control" name="phone" id="phone"
                            aria-describedby="helpId" placeholder=""  value="{{($user['hphn']) ? $user['hphn'] : old('phone') }}" required>
                    </div>

                    <span class="text-danger">
                        @error('phone')
                        {{$message}}    
                        @enderror
                    </span>

                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edppositon">Address </label>
                    </div>
                    <div class="col-8">
                        <textarea class="form-control" name="address" id="address"
                                        rows="5">{{($user['haddress']) ? $user['haddress'] : old('address') }}</textarea>
                    </div>

                    <span class="text-danger">
                        @error('address')
                        {{$message}}    
                        @enderror
                    </span>

                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edplocation">GEO Location</label>
                    </div>
                    <div class="col-8 position-relative">
                        <input type="url" class="form-control" name="location" id="location"
                            aria-describedby="helpId" placeholder="" value="{{($user['hlocation']) ? $user['hlocation'] : old('location') }}">
                        <img class="position-absolute geoloctaion "
                            src="{{asset('/assets/image/location_red.png')}}" width="25" alt="location">
                    </div>
                    <span class="text-danger">
                        @error('location')
                        {{$message}}    
                        @enderror
                    </span>
                </div>


            </div>

            <div class="col-12 text-end">
                <a href="{{url('/hospital/profile')}}" type="button" class="btn me-4 py-1 px-3 btn-danger">Cancel</a>
                <button type="submit" class="btn py-1 px-3 btn-success">Update</button>
            </div>
        </div>


    </form>
</div>
@endsection
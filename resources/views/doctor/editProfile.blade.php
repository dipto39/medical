@extends('doctor.main')
@push('title')
<title>Update {{session()->get('name')}} Profile || Medical Report Meker</title>
@endpush
@section('content')
<div class="edit_profile_section border p-2">
    <form id="nrform" action="{{url('/doctor/update-profile')}}" method="post" class="py-1 px-2 " enctype="multipart/form-data">
        @csrf
        <div class="row gx-5 px-5">
            <div class="col-12 mb-4 mt-3">
                <h4 class="text-center ">Edit you profile </h4>
            </div>
            <div class="col-md-12 col-lg-6 pe-lg-5">
                <div class="form-group row mb-5 ">
                    <div class="col-4">
                        <label for="edpname">User Name *</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="" value="{{($user['dname']) ? $user['dname'] : old('name') }}" required>
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
                            aria-describedby="helpId" placeholder="" value="{{($user['demail']) ? $user['demail'] : old('email') }}" disabled required>
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
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpphone">Phone No *</label>
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control" name="phone" id="phone"
                            aria-describedby="helpId" placeholder=""  value="{{($user['dphn']) ? $user['dphn'] : old('phone') }}" required>
                    </div>

                    <span class="text-danger">
                        @error('phone')
                        {{$message}}    
                        @enderror
                    </span>

                </div>
                <div class="form-group d-none mb-5 degreefield">
                    <div class="col-4">
                        <label for="edpdeg">Degree </label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="degree" id="degree"
                            aria-describedby="helpId" placeholder="" value="{{($user['degree']) ? $user['degree'] : old('name') }}">
                    </div>

                    <span class="text-danger">
                        @error('degree')
                        {{$message}}    
                        @enderror
                    </span>

                </div>

            </div>
            <div class="col-md-12 col-lg-6 ps-lg-5">
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edphname">Hospital *</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="hospital" id="hospital"
                            aria-describedby="helpId" placeholder="" value="{{($user['dhospital']) ? $user['dhospital'] : old('hospital') }}" required>
                    </div>
                    <span class="text-danger">
                        @error('hospital')
                        {{$message}}    
                        @enderror
                    </span>

                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edppositon">Position *</label>
                    </div>
                    <div class="col-8">
                            <div class="form-group">
                              <select class="form-select" name="position" id="">
                                <option value="" disabled selected>Select One</option>
                                @foreach ($dep as $item)
                                <option value="{{$item['id']}}" @if (isset($user))
                                @if ($user['department'] == $item['id'])
                                    {{"selected"}}
                                @endif
                           @endif {{(old('position') == $item['id']) ? "selected" : "" }}>{{$item['department']}}</option>
                                    
                                @endforeach
                                
                              </select>
                            </div>
                    </div>

                    <span class="text-danger">
                        @error('position')
                        {{$message}}    
                        @enderror
                    </span>

                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpregno">BMCD Reg No *</label>
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control" name="bmcd" id="bmcd"
                            aria-describedby="helpId" placeholder="" value="{{($user['bmcd']) ? $user['bmcd'] : old('bmcd') }}" required>
                    </div>

                    <span class="text-danger">
                        @error('bmcd')
                        {{$message}}    
                        @enderror
                    </span>

                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpimg">Profile Image </label>
                    </div>
                    <div class="col-8">
                        <input type="file" class="form-control" name="dimg" id="dimg"
                            aria-describedby="helpId" placeholder=""  value="{{($user['dimg']) ? $user['dimg'] : old('dimg') }}">
                    </div>

                    <span class="text-danger">
                        @error('dimg')
                        {{$message}}    
                        @enderror
                    </span>

                </div>
                <div class="form-group row mb-5">
                    <div class="col-12 text-end">
                        <button type="button" class="btn adddegbtn">Add Degree</button>
                    </div>
                </div>
                <div class="form-group degreefield d-none mb-5">
                    <div class="col-4">
                        <label for="edpspecial">Spcialization </label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="edpspecial" id="edpspecial"
                            aria-describedby="helpId" placeholder=""  value="{{($user['special']) ? $user['special'] : old('edpspecial') }}">
                    </div>

                    <span class="text-danger">
                        @error('edpspecial')
                        {{$message}}    
                        @enderror
                    </span>

                </div>

            </div>

            <div class="col-12 text-end">
                <a href="{{url('/doctor/profile')}}" class="btn me-4 py-1 px-3 btn-danger">Cancel</a>
                <button class="btn py-1 px-3 btn-success">Update</button>
            </div>
        </div>


    </form>
</div>
@endsection
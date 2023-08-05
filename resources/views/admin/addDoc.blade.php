@extends('admin.main')
@push('title')
<title>Add Doctor || Medical Report Meker</title>
@endpush
@section('content')
<div class="edit_profile_section border p-2">
    <form id="nrform" action="{{url('/admin/placeDoc')}}" method="post" class="py-1 px-2 " enctype="multipart/form-data">
        @csrf
        <div class="row gx-5 px-5">
            <div class="col-12 mb-4 mt-3">
                <h4 class="text-center ">Add A Doctor </h4>
            </div>
            <div class="col-md-12 col-lg-6 pe-lg-5">
                <div class="form-group row mb-5 ">
                    <div class="col-4">
                        <label for="edpname">User Name *</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" placeholder="" value="{{ old('name') }}" required>
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
                            aria-describedby="helpId" placeholder="" value="{{ old('email') }}"  required>
                    </div>
                    <span class="text-danger">
                        @error('email')
                        {{$message}}    
                        @enderror
                    </span>
                </div>

                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpnpass"> Password * </label>
                    </div>
                    <div class="col-8">
                        <input type="password" class="form-control" name="password" id="edpnpass"
                            aria-describedby="helpId" placeholder="">
                    </div>

                    <span class="text-danger">
                        @error('password')
                        {{$message}}    
                        @enderror
                    </span>
                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpphone">Phone No *</label>
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control" name="phone" id="phone"
                            aria-describedby="helpId" placeholder=""  value="{{old('phone') }}" required>
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
                            aria-describedby="helpId" placeholder="" value="{{old('name') }}">
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
                            aria-describedby="helpId" placeholder="" value="{{old('hospital') }}" required>
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
                        <select class="form-select" name="department" id="rfdep">
                            <option selected disabled value="">Select one</option>
                            @foreach ($dep as $item)
                            <option value="{{$item['id']}}" @if (isset($format))
                            @if ($item['id'] == $format['department'])
                                {{"selected"}}
                            @endif
                       @endif {{(old('department') == $item['id']) ? "selected" : "" }}>{{$item['department']}}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    <span class="text-danger">
                        @error('department')
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
                            aria-describedby="helpId" placeholder="" value="{{old('bmcd') }}" required>
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
                            aria-describedby="helpId" placeholder=""  value="{{old('dimg') }}">
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
                            aria-describedby="helpId" placeholder=""  value="{{old('edpspecial') }}">
                    </div>

                    <span class="text-danger">
                        @error('edpspecial')
                        {{$message}}    
                        @enderror
                    </span>

                </div>

            </div>

            <div class="col-12 text-end">
                <a href="{{url('/admin/doctors')}}" type="button" class="btn me-4 py-1 px-3 btn-danger">Cancel</a>
                <button class="btn py-1 px-3 btn-success">Add</button>
            </div>
        </div>


    </form>
</div>
@endsection
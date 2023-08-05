@extends('hospital.main')
@section('content')
@push('title')
<title>Add New Reports || Medical Report Meker</title>
@endpush

        <div class=" new_report p-2 border w-100">
            <form id="nrform" action="{{url($url)}}" method="post" class="py-1 px-2 " enctype="multipart/form-data">
                @csrf
                <div class="row gx-5 px-5">
                    <div class="col-12 mb-4 mt-3">
                        <h4 class="text-center ">{{$title}}</h4>
                    </div>
                    <div class="col-md-12 col-lg-6 pe-lg-5">
                        <div class="form-group row mb-5 ">
                            <div class="col-4">
                                <label for="ardate">Date *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="ardate" id="ardate"
                                    aria-describedby="helpId" placeholder="" value="{{isset($report) ? date("d-m-Y",strtotime($report['created_at'])) : date('d/m/Y')}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="artitle">Report Title *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="title" id="artitle"
                                    aria-describedby="helpId" placeholder="" value="{{isset($report) ? $report['title'] : old('title') }}" required>
                            </div>
                            <span class="text-danger">
                                @error('title')
                                {{$message}}    
                                @enderror
                               </span>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arpname">Patient Name *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="name" id="arpname"
                                    aria-describedby="helpId" placeholder="" value="{{isset($report) ? $report['pname'] : old('name') }}" required>
                            </div>
                            <span class="text-danger">
                                @error('name')
                                {{$message}}    
                                @enderror
                               </span>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="argender">Gender *</label>
                            </div>
                            <div class="col-8 ">

                                <select class="form-select" name="gender" id="gender" required>
                                    <option selected disabled value="">Select one</option>
                                    <option value="1" @if (isset($report))
                                        @if ($report['gender'] == 1)
                                            {{"selected"}}
                                        @endif
                                   @endif {{(old('gender') == "") ? "selected" : "" }}>Male</option>
                                    <option value="2" @if (isset($report))
                                    @if ($report['gender'] == 2)
                                        {{"selected"}}
                                    @endif
                               @endif {{(old('gender') == "2") ? "selected" : "" }}>Female</option>
                                    <option value="3" @if (isset($report))
                                    @if ($report['gender'] == 3)
                                        {{"selected"}}
                                    @endif
                               @endif {{(old('gender') == "3") ? "selected" : "" }}>Other</option>
                                </select>

                            </div>
                            <span class="text-danger">
                                @error('gender')
                                {{$message}}    
                                @enderror
                               </span>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arpdepartment">Depatment *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="department" id="department" required>
                                    <option selected disabled value="">Select one</option>
                                    @foreach ($dep as $item)
                                    <option value="{{$item['id']}}" @if (isset($report))
                                    @if ($report['department'] == $item['id'])
                                        {{"selected"}}
                                    @endif
                               @endif {{(old('argender') == "3") ? "selected" : "" }}>{{$item['department']}}</option>
                                        
                                    @endforeach
                                   
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('department')
                                {{$message}}    
                                @enderror
                               </span>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6 ps-lg-5">
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="ardoctor">Preffered Doctor *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="doctor" id="pdoctor" required>
                                    @if (isset($doctor))
                                    @foreach ($doctor as $item)
                                    <option value="{{$item['did']}}" {{($report['docid'] == $item['did']) ? "selected" : ""}} {{(old('doctor') == $item['did']) ? "selected" : "" }}>{{$item['dname']}}</option>
                                        
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('doctor')
                                {{$message}}    
                                @enderror
                               </span>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="artype">Report Type *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="type" id="artype" required>
                                    @if (isset($rtype))
                                    @foreach ($rtype as $item)
                                    <option value="{{$item['tid']}}" {{($report['type'] == $item['tid']) ? "selected" : ""}} {{(old('doctor') == $item['tid']) ? "selected" : "" }}>{{$item['tname']}}</option>
                                        
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('type')
                                {{$message}}    
                                @enderror
                               </span>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arid">Report ID</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="arid" id="arid"
                                    aria-describedby="helpId" placeholder="" value="{{isset($report) ? $report['rpid'] : uniqid()}}" disabled>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arage">Age *</label>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" name="age" id="arge"
                                    aria-describedby="helpId" placeholder="" value="{{isset($report) ? $report['age'] : old('age')}}" required>
                            </div>
                            <span class="text-danger">
                                @error('age')
                                {{$message}}    
                                @enderror
                               </span>
                            
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arimg">Report Image *</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control" name="report_img" id="arimg"
                                    aria-describedby="fileHelpId" {{($btn == "Update") ? "" : "required"}}>
                            </div>
                            <span class="text-danger">
                                @error('report_img')
                                {{$message}}    
                                @enderror
                               </span>
                        </div>
                    </div>           
                    <div class="col-12 text-end">
                        <a href="{{url('/hospital/sent-reports')}}" type="button" class="btn me-4 py-1 px-3 btn-danger">Cancel</a>
                        <button class="btn py-1 px-3 btn-success">{{$btn}}</button>
                    </div>
                </div>


            </form>
        </div>

@endsection
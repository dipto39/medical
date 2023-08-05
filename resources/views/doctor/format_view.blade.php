@extends('doctor.main')
@push('title')
<title>Report Format View || Medical Report Meker</title>
@endpush
@section('content')
<div class="add_report_format border p-2">
    <form id="nrform"  method="post" class="py-1 px-2 ">
        @csrf
        <div class="row gx-5 px-5">
            <div class="col-12 mb-4 mt-3">
                <h4 class="text-center ">Report Format</h4>
            </div>
            <div class="col-md-12 col-lg-6 pe-lg-5">
                <div class="form-group row mb-5 ">
                    <div class="col-4">
                        <label for="rfpby">Prepared By</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="rfpby" disabled id="rfpby"
                            aria-describedby="helpId" placeholder="" value="{{session()->get('name')}}" >
                    </div>
                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="rftitle">title *</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="title" id="rftitle"
                            aria-describedby="helpId" placeholder="" disabled value="{{isset($format) ? $format['title'] : old('title') }}" required>
                    </div>
                    <span class="text-danger">
                        @error('title')
                        {{$message}}    
                        @enderror
                       </span>
                </div>
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="edpoldpass">Report Details *</label>
                    </div>
                    <div class="col-8">
                        <textarea name="details" id="rfdetails" cols="" rows="4"
                            class="form-control" disabled>{{isset($format) ? $format['details'] : old('details') }} </textarea>
                    </div>
                    <span class="text-danger">
                        @error('details')
                        {{$message}}    
                        @enderror
                       </span>

                </div>


            </div>
            <div class="col-md-12 col-lg-6 ps-lg-5">
                <div class="form-group row mb-5">
                    <div class="col-4">
                        <label for="rfdep">Department *</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="department" id="rfdep" disabled >
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
                        <label for="rfrtype">Report Type *</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="type" id="rftype" disabled >
                            @if (isset($type))
                            @foreach ($type as $item)
                            <option value="{{$item['tid']}}" @if (isset($format))
                            @if ($item['tid'] == $format['type'])
                                {{"selected"}}
                            @endif
                       @endif {{(old('type') == $item['tid']) ? "selected" : "" }}>{{$item['tname']}}</option>
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
                        <label for="edpregno">Report ID *</label>
                    </div>
                    <div class="col-8">
                        <input type="text" disabled class="form-control" name="rfid" id="rfid"
                            aria-describedby="helpId" placeholder="" value="{{isset($report) ? $report['rpid'] : uniqid()}}">
                    </div>

                </div>
                <div class="form-group row mb-5">
                </div>
            </div>

          

        </div>


    </form>
</div>
@endsection
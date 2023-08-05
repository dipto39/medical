@extends('doctor.main')
@push('title')
<title>Prepare Reprot || Medical Report Meker</title>

@endpush
@section('content')
<div class="makeReport px-5 border">
    <div class="row"> 
        <div class="col-lg-4  p-3">
            <h5 class="text-center">Report Image</h5>
            <div class="rimage pointer-event">
                <img data-enlargable class="img-fluid" src="{{asset('/assets/image/reportImg/'.$report[0]['img'])}}" alt="">
            </div>
        </div>
        <div class="col-lg-8">
            <form action="{{url('/doctor/'.$url)}}" method="post" id="printdata" class=" text-dark">
              @csrf
                <div class="col-12 ">
                    <h3 class="p-2  text-center ">{{$title}}</h3>
                </div>

                <table class="w-100 tableuser">
                    <tr class="text-center">
                        <td>
                            <h5>Report ID</h5>
                        </td>
                        <td>
                            <p class="dprint"> {{$report[0]['rpid']}}</p>
                        </td>
                        <td colspan="2">
                            <h5>Patient Name</h5>
                        </td>
                        <td colspan="2">
                            <p class="dprint"> {{$report[0]['pname']}}</p>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>
                            <h5>Report Date</h5>
                        </td>
                        <td>
                            <p class="dprint"> {{$report[0]['created_at']}}</p>
                        </td>
                        <td>
                            <h5>Age</h5>
                        </td>
                        <td>
                            <p class="dprint"> {{$report[0]['age']}}</p>
                        </td>
                        <td>
                            <h5>Gender</h5>
                        </td>
                        <td>
                            <p class="dprint"> 
                                @php
                                
                            if($report[0]['gender'] == 1){
                                echo "Male";
                            }elseif ($report[0]['gender'] == 2) {
                                echo "Female";
                            }elseif($report[0]['gender'] == 3){
                                echo "Other";
                            }
                                
                            @endphp</p>
                        </td>
                    </tr>
                </table>
                <div class="row text-center mt-5 wreportfilter">
                    <div class="col-6 row ">
                        <div class="col-4 text-center mt-1">
                            Type *
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <div class="form-group">
                                    <select class="form-select" name="type" id="rftype" disabled >
                                        
                                        @foreach ($rt as $item)
                                        <option value="{{$item['tid']}}" @if (isset($format))
                                        @if ($item['tid'] == $format['type'])
                                            {{"selected"}}
                                        @endif
                                   @endif {{(old('type') == $item['tid']) ? "selected" : "" }}>{{$item['tname']}}</option>
                                        @endforeach
                                        
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 row" >
                        <div class="col-4 text-center mt-1">
                        Title * 
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select class="form-select prepare_title" name="title" id="rftype"  >
                                        
                                    @foreach ($rt as $item)
                                    <option value="{{$item['fid']}}" @if (isset($report))
                                    @if ($item['fid'] == $report[0]['fid'])
                                        {{"selected"}}
                                    @endif
                               @endif {{(old('type') == $item['fid']) ? "selected" : "" }}>{{$item['title']}}</option>
                                    @endforeach
                                    
                                   
                                </select>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div class="form-group">
                      <label for="rdetais" class="h5 my-3"   >Write Report : <span class="h6"> Example ( title : details ; title : detais;.....)</span></label>
                      <textarea class="form-control reDeatils" name="rdetais" id="rdetais" rows="6" placeholder="title : details ; title : detais;.....">{{($report[0]['status']== 1) ? $report[0]['rdetails'] : $rt[0]['details']}}</textarea>
                    </div>
                    <span class="text-danger">
                        @error('rdetais')
                        {{$message}}    
                        @enderror
                       </span>
                </div>
                <div class="col-12 text-end mt-3 mb-2">
                    <a href="{{url('/doctor/complete-reports')}}" type="button" class="btn btn-danger px-4 pb-1 me-5">Cancel</a>
                    <button class="btn btn-success px-4 pb-1">{{$btn}}</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
@extends('doctor.main')
@section('content')
@push('title')
<title>Received Reports || Medical Report Meker</title>
@endpush
<div class="sent_reports border p-4 ">
    <div class="col-12 my-4">
        <h3 class="text-center">Sent Reports</h3>
    </div>
    <div class="row sraction mb-4">
        <form action="{{url('/doctor/recived-reports/')}}" class="row sraction">
        <div class="col-lg-4 col-md-4 d-flex align-content-center">
            <h6 class="w-50 text-center mt-1 h5">Search Report</h6>
            <div class="form-group w-50">
               
                    <input type="text" class="form-control" name="search" id="ssearch" aria-describedby="helpId" placeholder="Patient Name" value="{{app('request')->input('search')}}">
                
            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-flex align-content-center bydoctor my-sm-4 my-md-0">
            <h6 class="w-50 text-center mt-1 h5">Report Type</h6>
            <div class="form-group w-50">
                    <select class="form-select" name="type" id="sbdoc">
                        <option selected disabled value="">Select one</option>
                        
                        @foreach ($type as $item)
                        <option value="{{$item['tid']}}" {{ (app('request')->input('type') == $item['tid']) ? "selected" : "" }} >{{$item['tname']}}</option>
                        @endforeach
                        
                    </select>
                    

            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-flex align-content-center">
            <h6 class="w-50 text-center mt-1 h5">By Date</h6>
            <div class="form-group w-50">
                    <input class=" form-control" type="date" name="date" id="sbydate" value="{{app('request')->input('date')}}">
            </div>
        </div>
        </form>
    </div>
    <div class="row">
        @if (!app('request')->input('search') == "" || !app('request')->input('type') == "" || !app('request')->input('date') == "")
        <div class="col-12 text-center mb-2"><a href="{{url('/doctor/recived-reports')}}" class="btn btn-danger">Cancel Filter</a></div>                    
        @endif
    </div>
    <div class="allrecord border overflow-auto">
        <table class=" w-100 table-responsive text-center">
            <thead class="thead-inverse">
                <tr>
                    <th>Report ID</th>
                    <th>Patient Name</th>
                    <th>Report Type</th>
                    <th>Received Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($report) > 0)
                @foreach ($report as $item)
                <tr>
                    <td>{{$item['rpid']}}</td>
                    <td>{{$item['pname']}}</td>
                    <td>{{$item['tname']}}</td>
                    <td>{{date('d M Y', strtotime($item['created_at']))}}</td>
                    <td class="m-0 d-flex justify-content-around border-0">
                        <a href="{{url('/doctor/prepare/'.$item['rid'] )}}"><span role="button"><img src="{{asset('/assets/image/prepare.png')}}" alt="Edit"></span></a>
                        <span role="button"><img src="{{asset('/assets/image/view.png')}}" alt="view"></span>
                        
                    </td>
                </tr>
                @endforeach
            @else
               <tr>
                <td colspan="5" class="text-center text-danger h4">No record found...!</td>
               </tr> 
            @endif

            </tbody>
        </table>
    </div>
</div>
<div class="deleteModel">
    <!-- Modal -->
    <div class="modal fade" id="deleterecord" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="py-4 text-center">
                    <h4 class="text-center">Do you want to delete the report?</h4>
                    <span class="h4 py-5">Confirm</span>
                    <div class="text-center mt-3 ">
                        <button type="button" class="btn px-4 py-1 me-3 btn-danger"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn px-4 py-1 ms-3 btn-success">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
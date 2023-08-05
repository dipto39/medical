@extends('doctor.main')
@push('title')
<title>All Report Format || Medical Report Meker</title>
@endpush
@section('content')

<div class=" all_report_format border p-4 ">
    <div class="col-12 my-4">
        <h3 class="text-center">Report Formats</h3>
    </div>
    <div class="row sraction mb-4">
        <form action="{{url('/doctor/report-formats')}}" class="row sraction">
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
                        @if (isset($type))
                        @foreach ($type as $item)
                        <option value="{{$item['tid']}}" {{ (app('request')->input('type') == $item['tid']) ? "selected" : "" }} >{{$item['tname']}}</option>
                        @endforeach
                        @endif
                    </select>
                    

            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-flex align-content-center">
            <h6 class="w-50 text-center mt-1 h5">Created By</h6>
            <div class="form-group w-50">
                <select class="form-select" name="doc" id="sbdoc">
                    <option selected disabled value="">Select one</option>
                    @foreach ($doctors as $item)
                    <option value="{{$item['did']}}" {{ (app('request')->input('doc') == $item['did']) ? "selected" : "" }} >{{$item['dname']}}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        </form>
    </div>
    <div class="row">
        @if (!app('request')->input('search') == "" || !app('request')->input('type') == "" || !app('request')->input('date') == "")
        <div class="col-12 text-center mb-2"><a href="{{url('/doctor/report-formats')}}" class="btn btn-danger">Cancel Filter</a></div>                    
        @endif
    </div>
    <div class="text-end">
        <a href="{{url('/doctor/add-report-format')}}" class="btn btn-success py-1 px-3 "> + Add new</a>
    </div>
    <div class="allrecord border mt-3 overflow-auto">

        <table class=" w-100 table-responsive text-center">
            <thead class="thead-inverse">
                <tr>
                    <th>Report Format ID</th>
                    <th>Report Type</th>
                    <th>Created By</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($report) > 0)
                @foreach ($report as $item)
                <tr>
                    <td>{{$item['format_id']}}</td>
                    <td>{{$item['tname']}}</td>
                    <td>{{$item['dname']}}</td>
                    <td>{{$item['title']}}</td>
                    <td class="m-0 d-flex justify-content-around border-0">
                        @if ($item['docid'] == session()->get('uid'))
                        <a href="{{url('/doctor/edit-format/'.$item['fid'] )}}"><span role="button"><img src="{{asset('/assets/image/edit.png')}}" alt="Edit"></span></a>
                        <a href="{{url('/doctor/delete-format/'.$item['fid'] )}}"><span role="button"><img src="{{asset('/assets/image/delete.png')}}" alt="delete"></span> </a> 
                        @endif
                       
                        <a href="{{url('/doctor/format-view/'.$item['fid'] )}}"><span role="button"><img src="{{asset('/assets/image/view.png')}}" alt="view"></span> </a>
                        
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
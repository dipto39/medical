@extends('hospital.main')
@section('content')
@push('title')
<title>Sent Reports || Medical Report Meker</title>
@endpush
        <div class=" sent_reports border p-4 ">
            <div class="col-12 my-4">
                <h3 class="text-center">Sent Reports</h3>
            </div>
            <div class="row sraction mb-4">
                <form action="{{url('/hospital/sent-reports/')}}" class="row sraction">
                <div class="col-lg-4 col-md-4 d-flex align-content-center">
                    <h6 class="w-50 text-center mt-1 h5">Search Report</h6>
                    <div class="form-group w-50">
                       
                            <input type="text" class="form-control" name="search" id="ssearch" aria-describedby="helpId" placeholder="Patient Name" value="{{app('request')->input('search')}}">
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-content-center bydoctor my-sm-4 my-md-0">
                    <h6 class="w-50 text-center mt-1 h5">By Doctor</h6>
                    <div class="form-group w-50">
                            <select class="form-select" name="doc" id="sbdoc">
                                <option selected disabled value="">Select one</option>
                                @if (isset($doctor))
                                @foreach ($doctor as $item)
                                <option value="{{$item['did']}}" {{ (app('request')->input('doc') == $item['did']) ? "selected" : "" }} >{{$item['dname']}}</option>
                                @endforeach
                                @endif
                                
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
                @if (!app('request')->input('search') == "" || !app('request')->input('doc') == "" || !app('request')->input('date') == "")
                <div class="col-12 text-center mb-2"><a href="{{url('/hospital/sent-reports')}}" class="btn btn-danger">Cancel Filter</a></div>                    
                @endif
            </div>
            <div class="allrecord border overflow-auto">
                <table class=" w-100 table-responsive text-center">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Report ID</th>
                            <th>Patient Name</th>
                            <th>Department</th>
                            <th>Prefered Doctor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($report) > 0)
                            @foreach ($report as $item)
                            <tr>
                                <td>{{$item['rpid']}}</td>
                                <td>{{$item['pname']}}</td>
                                <td>{{$item['department']}}</td>
                                <td>{{$item['dname']}}</td>
                                <td class="m-0 d-flex justify-content-around border-0">
                                    <span role="button"><img src="{{asset('/assets/image/view.png')}}" alt="view"></span>
                                    <a href="{{url('/hospital/edit/'.$item['rid'] )}}"><span role="button"><img src="{{asset('/assets/image/edit.png')}}" alt="Edit"></span></a>
                                    <span class="RpDeleteBtn" role="button" data-attr="{{$item['rid']}}" data-toggle="modal" data-target="#deleterecord"><img
                                            src="{{asset('/assets/image/delete.png')}}" alt="Delete"></span>
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
                            <div class="text-center mt-3 delete_model_body">
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
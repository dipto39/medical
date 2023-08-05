@extends('hospital.main')
@section('content')
@push('title')
<title>Complete Reports || Medical Report Meker</title>
@endpush

        <div class=" sent_reports border p-4 ">
            <div class="col-12 my-4">
                <h3 class="text-center">Complete Reports</h3>
            </div>
            <div class="row sraction mb-4">
                <form action="{{url('/hospital/complete-reports/')}}" class="row sraction">
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
                                @foreach ($doctor as $item)
                                <option value="{{$item['did']}}" {{ (app('request')->input('doc') == $item['did']) ? "selected" : "" }} >{{$item['dname']}}</option>
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
                @if (!app('request')->input('search') == "" || !app('request')->input('doc') == "" || !app('request')->input('date') == "")
                <div class="col-12 text-center mb-2"><a href="{{url('/hospital/complete-reports')}}" class="btn btn-danger">Cancel Filter</a></div>                    
                @endif
            </div>
            <div class="allrecord border  overflow-auto">
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
                                <a href="{{url('/hospital/print/'.$item['rid'] )}}"><span role="button"><img src="{{asset('/assets/image/print.png')}}" alt="Edit"></span></a>
                                
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
        <div class="d-none printdata px-5 border">
            <form action="" method="post" id="printdata" enctype="text/plain" class="p-5 text-dark">
                <div class="col-12 px-5 my-2">
                    <h3 class="p-2 border text-center text-success">Department of Radiology & imaging</h3>
                </div>

                <table class="w-100 tableuser">
                    <tr class="text-center">
                        <td>
                            <h5>Report ID</h5>
                        </td>
                        <td>
                            <p class="dprint"> D6J2D4</p>
                        </td>
                        <td colspan="2">
                            <h5>Patient Name</h5>
                        </td>
                        <td colspan="2">
                            <p class="dprint"> Miss. Saiyra Banu</p>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>
                            <h5>Report Date</h5>
                        </td>
                        <td>
                            <p class="dprint"> 14/11/2022</p>
                        </td>
                        <td>
                            <h5>Age</h5>
                        </td>
                        <td>
                            <p class="dprint"> 27</p>
                        </td>
                        <td>
                            <h5>Gender</h5>
                        </td>
                        <td>
                            <p class="dprint"> Female</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="p-5">
                            <div class="col-12 row">
                                <div class="col-12 py-3 ">
                                    <h5>CHEST AP VIEW</h5>
                                </div>
                            </div>
                            <div class="col-12 row">
                                <div class="col-12 row p-3">
                                    <div class="col-2 p-0 ">
                                        <h5>Bony thorax :
                                        </h5>
                                    </div>
                                    <div class="col-10 p-0">
                                        <p class="dprint"> Reveals no abnortnality.</p>
                                    </div>
                                </div>
                                <div class="col-12 row p-3">
                                    <div class="col-2 p-0 ">
                                        <h5>Diaphragm :
                                        </h5>
                                    </div>
                                    <div class="col-10 p-0">
                                        <p class="dprint"> Reveals no abnortnality.</p>
                                    </div>
                                </div>
                                <div class="col-12 row p-3">
                                    <div class="col-2 p-0 ">
                                        <h5>Heart :
                                        </h5>
                                    </div>
                                    <div class="col-10 p-0">
                                        <p class="dprint"> Lorem ipsum dolor sit amet consectetur adipisicpg
                                            elit.
                                            Modi dolore recusandae ipsa dolor, mollitia quisquam culpa. Vero
                                            aspernatur blanditiis debitis velit, quod quaerat, id aliquid
                                            officiis
                                            beatae laborum, optio perspiciatis.</h5>
                                    </div>
                                </div>
                                <div class="col-12 row p-3">
                                    <div class="col-2 p-0 ">
                                        <h5>Lung fields :
                                        </h5>
                                    </div>
                                    <div class="col-10 p-0">
                                        <p class="dprint"> Reveals no abnortnality.</p>
                                    </div>
                                </div>
                                <div class="col-12 row p-3">
                                    <div class="col-2 p-0 ">
                                        <h5>Impression :
                                        </h5>
                                    </div>
                                    <div class="col-10 p-0">
                                        <p class="dprint"> Reveals no abnortnality.</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="my-3">
                    <p>Reported by Electronic Signature</p>
                </div>
                <div class="col-12">
                    <img width="70" src="../assets/image/signature.png" alt="signature">
                </div>
                <div class="col-12">
                    <h4>Dr. Monjurul Alam</h4>
                </div>
                <div class="col-12">
                    <h6>MBBS, MD (Radiology & Imaging)</h6>
                </div>
                <div class="col-12 row">

                    <div class="col-6">
                        <h6>Radiologist</h6>
                    </div>
                    <div class="col-6 text-end mb-4">
                        <h6>Checked by Medical Technologist</h6>
                    </div>
                </div>
            </form>
            <button class="btn btn-primary printbtn" onclick="myPrint('printdata')">Print</button>
        </div>

@endsection
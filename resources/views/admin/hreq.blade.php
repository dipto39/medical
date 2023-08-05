@extends('admin.main')
@push('title')
<title>New Hospital Request || Medical Report Meker</title>
@endpush
@section('content')
<div class="sent_reports border p-4 ">
    <div class="col-12 my-4">
        <h3 class="text-center">Doctors List</h3>
    </div>
    <div class="row sraction mb-4">
        <form action="{{url('/admin/hospital-request/')}}" class="row sraction">
        <div class="col-lg-4 col-md-4 d-flex align-content-center">
            <h6 class="w-50 text-center mt-1 h5">Search Doctor</h6>
            <div class="form-group w-50">
                    <input type="text" class="form-control" name="search" id="ssearch" aria-describedby="helpId" placeholder="Name" value="{{app('request')->input('search')}}">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-flex align-content-center bydoctor my-sm-4 my-md-0">
            <h6 class="w-50 text-center mt-1 h5">By Date</h6>
            <div class="form-group w-50">
                        <input class=" form-control" type="date" name="date" id="sbydate" value="{{app('request')->input('date')}}">
            </div>
        </div>
        </form>
    </div>
    <div class="row">
        @if (!app('request')->input('search') == "" || !app('request')->input('type') == "" || !app('request')->input('date') == "")
        <div class="col-12 text-center mb-2"><a href="{{url('/admin/hospital-request')}}" class="btn btn-danger">Cancel Filter</a></div>                    
        @endif
    </div>
    <div class="allrecord border mt-5 overflow-auto">
        <table class=" w-100 table-responsive text-center">
            <thead class="thead-inverse">
               <th>User Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Date</th>
               <th>Action</th>
            </thead>
            <tbody>
                @if (count($hospital) > 0)
                @foreach ($hospital as $item)
                <tr>
                    <td>{{$item['hname']}} pvt ltd</td>
                    <td> {{$item['hemail']}} </td>
                    <td>{{$item['hphn']}}</td>
                    <td>{{ date('d-m-Y',strtotime($item['created_at'])) }}</td>
                    <td class="m-0 d-flex justify-content-around border-0">
                        <a href="{{url('/admin/hospital-active/'.$item['hid'])}}"><span role="button"><img src="{{url('/assets/image/active.png')}}" alt="view"></span></a>
                        <a href="{{url('/admin/hospital-block/'.$item['hid'])}}"><span role="button"><img src="{{url('/assets/image/cancel.png')}}" alt="cancel"></span></a>
                        <a href="{{url('/admin/requested-hospital-profile/'.$item['hid'])}}"><span role="button"><img src="{{url('/assets/image/view.png')}}" alt="view"></span></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center text-danger h3">No record found...!</td>
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
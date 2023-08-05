@extends('doctor.main');
@push('title')
<title>Print Report || Medical Report Meker</title>
@endpush
@section('content')
<div class=" printdata px-5 border overflow-auto">
    <form action="" method="post" id="printdata" enctype="text/plain" class="p-5 text-dark">
        <div class="col-12 px-5 my-2">
            <h3 class="p-2 border text-center text-success">Department of {{$report[0]['department']}}</h3>
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
                    <p class="dprint"> {{ date("d-m-Y",strtotime($report[0]['created_at'])) }}</p>
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
                        }elseif ($report[0]['gender'] == 3) {
                            echo "Others";
                        }
                    @endphp </p>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="p-5">
                    <div class="col-12 row">
                        <div class="col-12 py-3 ">
                            <h5>{{$report[0]['title']}}</h5>
                        </div>
                    </div>
                    <div class="col-12 row">
                        @php
                        $ar=explode(';',$report[0]['rdetails']);
                        $count=count($ar);
                        $ar2=[];
                        foreach ($ar as  $value) {
                            if (--$count <= 0) {
                                 break;
                                }
                              
        array_push($ar2,explode(":",$value));
                        }
                        @endphp
                       

                        @foreach ($ar2 as $item)
                        {{-- {{$item[1]}} --}}
                        <div class="col-12 row p-3">
                            <div class="col-4 p-0 ">
                                <h5>{{$item[0]}} :
                                </h5>
                            </div>
                            <div class="col-8 p-0">
                                <p class="dprint"> {{$item[1]}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </td>
            </tr>
        </table>
        <div class="my-3">
            <p>Reported by Electronic Signature</p>
        </div>
        <div class="col-12">
            <img width="70" src="{{asset('/assets/image/signature.png')}}" alt="signature">        </div>
        <div class="col-12">
            <h4>Dr. {{$report[0]['dname']}}</h4>
        </div>
        <div class="col-12">
            <h6>MBBS, MD ({{$report[0]['department']}})</h6>
        </div>
        <div class="col-12 row">

            <div class="col-6">
                <h6>{{$report[0]['department']}}</h6>
            </div>
            <div class="col-6 text-end mb-4">
                <h6>Checked by Medical Technologist</h6>
            </div>
        </div>
    </form>
    <button class="btn btn-primary printbtn" onclick="myPrint('printdata')">Print</button>
</div>
@endsection
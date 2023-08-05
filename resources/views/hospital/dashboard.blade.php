@extends('hospital.main')
@section('content')
@push('title')
<title>Dashboard || Medical Report Meker</title>
@endpush

        <div class="summery">
            <div class="">
                <div class="row g-5 m-0 text-center">

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/hospital/sent-reports')}}" class="text-dark">
                        <div class="px-3 py-5 border">
                            <h1>{{$rr}}</h1>
                            <h6>Number of Sent Reports</h6>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/hospital/complete-reports')}}" class="text-dark">
                        <div class="px-3 py-5  border">
                            <h1>{{$cr}}</h1>
                            <h6>Number of Completed Reports</h6>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/hospital/all-reports')}}" class="text-dark">
                        <div class="px-3 py-5  border">
                            <h1>{{$tr}}</h1>
                            <h6>Number of Total Reports</h6>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-2 text-center d-none">
                <div class="col-md-3 col-lg-3 px-5 py-3 border ">
                    <h1>100</h1>
                    <h6>Number of Sent Reports</h6>
                </div>
                <div class="col-md-3 col-lg-3 px-5 py-3 border ">
                    <h1>100</h1>
                    <h6>Number of Sent Reports</h6>
                </div>
                <div class="col-md-3 col-lg-3 px-5 py-3 border ">
                    <h1>100</h1>
                    <h6>Number of Sent Reports</h6>
                </div>
                <div class="col-md-3 col-lg-3 px-5 py-3 border ">
                    <h1>100</h1>
                    <h6>Number of Sent Reports</h6>
                </div>
                <div class="col-md-3 col-lg-3 px-5 py-3 border ">
                    <h1>100</h1>
                    <h6>Number of Sent Reports</h6>
                </div>
                <div class="col-md-3 col-lg-3 px-5 py-3 border ">
                    <h1>100</h1>
                    <h6>Number of Sent Reports</h6>
                </div>
            </div>
        </div>

        <div class="d-none profile d-flex justify-content-center align-items-center">
            <div class="row px-5 py-1 py-5 border">
                <div class="col-12 text-center mb-5">
                    <h4>Hospital Profile</h4>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <img src="../assets/image/hospital.png" alt="">
                    <h4 class="text-primary">x Hospital Pvt. Ltd.</h4>
                    <p>46/1, purana paltan, sobhan mansion (3rd floor), 1000</p>
                </div>
                <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
                    <img role="button" class="editProfile" src="../assets/image/edit.png" alt="edit">
                    <p class="mt-5"><span class="text-primary"><img src="../assets/image/phone.png" alt="Phone"
                                width="30"></span> 01234567890</p>
                    <p><span><img src="../assets/image/email.png" alt="Phone" width="30"></span>
                        xhostpita@mail.com</p>
                    <p class=""><span><img src="../assets/image/location.png" width="30" alt="location"></span>
                        <a class="mt-1" href="https://goo.gl/maps/9KUmvL1MdGmoKo666">https://goo.gl/maps/9K...
                        </a> </p>
                </div>
            </div>
        </div>
        <div class="d-none edit_profile_section border p-2">
            <form id="nrform" action="" method="post" class="py-1 px-2 ">
                <div class="row gx-5 px-5">
                    <div class="col-12 mb-4 mt-3">
                        <h4 class="text-center ">Edit you profile ( HOSPITAL)</h4>
                    </div>
                    <div class="col-md-12 col-lg-6 pe-lg-5">
                        <div class="form-group row mb-5 ">
                            <div class="col-4">
                                <label for="ehpname">Hospital Name *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="ehpname" id="ehpname"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="ehpnameH" class="er">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="ehpemail">Email *</label>
                            </div>
                            <div class="col-8">
                                <input type="email" class="form-control" name="ehpemail" id="ehpemail"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="ehpemailH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="ehpoldpass">Old Password</label>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" name="ehpoldpass" id="ehpoldpass"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="col-12">
                                <small id="ehpoldpassH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="ehpnpass">New Password </label>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" name="ehpnpass" id="ehpnpass"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="col-12">
                                <small id="ehpnpassH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6 ps-lg-5">
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="ehpphone">Phone No </label>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" name="ehpphone" id="ehpphone"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="ehpphoneH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpaddress">Address </label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="edpaddress" id="edpaddress"
                                        rows="5"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edplocation">GEO Location</label>
                            </div>
                            <div class="col-8 position-relative">
                                <input type="url" class="form-control" name="edplocation" id="edplocation"
                                    aria-describedby="helpId" placeholder="">
                                <img class="position-absolute geoloctaion "
                                    src="../assets/image/location_red.png" width="25" alt="location">
                            </div>
                            <div class="col-12">
                                <small id="edplocationH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 text-end">
                        <button class="btn me-4 py-1 px-3 btn-danger">Cancel</button>
                        <button class="btn py-1 px-3 btn-success">Update</button>
                    </div>
                </div>


            </form>
        </div>


@endsection
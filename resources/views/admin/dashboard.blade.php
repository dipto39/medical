@extends('admin.main')
@section('content')
@push('title')
<title>Dashboard || Medical Report Meker</title>
@endpush

        <div class="summery">
            <div class="">
                <div class="row g-5 m-0 text-center">

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/admin/hospitals')}}" class="text-dark">
                        <div class="px-3 py-5 border">
                            <h1>{{$hac}}</h1>
                            <h6>Number of Registered Hospitals</h6>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/admin/hospital-request')}}" class="text-dark">
                        <div class="px-3 py-5  border">
                            <h1>{{$hrq}}</h1>
                            <h6>Number of Requested Hospitals</h6>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/admin/hospitals')}}" class="text-dark">
                        <div class="px-3 py-5  border">
                            <h1>{{$hall}}</h1>
                            <h6>Number of Total Hospitals</h6>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/admin/doctors')}}" class="text-dark">
                        <div class="px-3 py-5 border">
                            <h1>{{$dac}}</h1>
                            <h6>Number of Registered Doctors</h6>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/admin/doctor-request')}}" class="text-dark">
                        <div class="px-3 py-5  border">
                            <h1>{{$drq}}</h1>
                            <h6>Number of Requested Doctors</h6>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <a href="{{url('/admin/doctors')}}" class="text-dark">
                        <div class="px-3 py-5  border">
                            <h1>{{$dall}}</h1>
                            <h6>Number of Total Doctors</h6>
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

        <div class="d-none new_report p-2 border w-100">
            <form id="nrform" action="" method="post" class="py-1 px-2 ">
                <div class="row gx-5 px-5">
                    <div class="col-12 mb-4 mt-3">
                        <h4 class="text-center ">Add New Report</h4>
                    </div>
                    <div class="col-md-12 col-lg-6 pe-lg-5">
                        <div class="form-group row mb-5 ">
                            <div class="col-4">
                                <label for="ardate">Date *</label>
                            </div>
                            <div class="col-8">
                                <input type="date" class="form-control" name="ardate" id="ardate"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="ardateH" class="er">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="artitle">Report Title *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="artitle" id="artitle"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="artitleH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arpname">Patient Name *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="arpname" id="arpname"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="arpnameH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="argender">Gender *</label>
                            </div>
                            <div class="col-8 ">

                                <select class="form-select" name="argender" id="argender" required>
                                    <option selected disabled value="">Select one</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>

                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arpdepartment">Depatment *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="arpdepartment" id="arpdepartment" required>
                                    <option selected disabled value="">Select one</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6 ps-lg-5">
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="ardoctor">Preffered Doctor *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="ardoctor" id="ardoctor" required>
                                    <option selected disabled value="">Select one</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="artype">Report Type *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="artype" id="artype" required>
                                    <option selected disabled value="">Select one</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arid">Report ID</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="arid" id="arid"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arage">Age *</label>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" name="arage" id="arge"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="arageH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="arimg">Report Image *</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control" name="arimg" id="arimg"
                                    placeholder="sele" aria-describedby="fileHelpId">
                            </div>
                            <div class="col-12">
                                <small id="fileHelpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-end">
                        <button class="btn me-4 py-1 px-3 btn-danger">Cancel</button>
                        <button class="btn py-1 px-3 btn-success">Send</button>
                    </div>
                </div>


            </form>
        </div>
        <div class="d-none profile d-flex justify-content-center align-items-center">
            <div class="row px-5 py-1 py-5 border">
                <div class="col-12 text-center mb-5">
                    <h4>Doctor Profile</h4>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <img src="../assets/image/user.png" width="80" alt="">
                    <h4 class="text-primary mt-3">Dr. Mahabub Alam</h4>
                    <h6>MBBS, MD (Radiology & Imaging)</h6>
                    <h6>CT Scan & MRI Specialist</h6>
                    <h6>X Hospital Pvt. Ltd</h6>
                    <h6>BMDC Reg No. 52453</h6>
                </div>
                <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
                    <img role="button" class="editProfile" src="../assets/image/edit.png" alt="edit">
                    <p class="mt-5"><span class="text-primary"><img src="../assets/image/phone.png" alt="Phone"
                                width="30"></span> 01234567890</p>
                    <p><span><img src="../assets/image/email.png" alt="Phone" width="30"></span>
                        xhostpita@mail.com</p>
                </div>
            </div>
        </div>
        <div class="d-none edit_profile_section border p-2">
            <form id="nrform" action="" method="post" class="py-1 px-2 ">
                <div class="row gx-5 px-5">
                    <div class="col-12 mb-4 mt-3">
                        <h4 class="text-center ">Edit you profile ( Doctor)</h4>
                    </div>
                    <div class="col-md-12 col-lg-6 pe-lg-5">
                        <div class="form-group row mb-5 ">
                            <div class="col-4">
                                <label for="edpname">Hospital Name *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="edpname" id="edpname"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="edpnameH" class="er">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpemail">Email *</label>
                            </div>
                            <div class="col-8">
                                <input type="email" class="form-control" name="edpemail" id="edpemail"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="edpemailH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpoldpass">Old Password</label>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" name="edpoldpass" id="edpoldpass"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="col-12">
                                <small id="edpoldpassH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpnpass">New Password </label>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" name="edpnpass" id="edpnpass"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="col-12">
                                <small id="edpnpassH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpphone">Phone No </label>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" name="edpphone" id="edpphone"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="edpphoneH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpdeg">Degree </label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="edpdeg" id="edpdeg"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="edpdegH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6 ps-lg-5">
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edphname">Hospital *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="edphname" id="edphname"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="edphnameH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edppositon">Position *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="edppositon" id="edppositon"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="edppositonH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpregno">BMCD Reg No *</label>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" name="edpregno" id="edpregno"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="edpregnoH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpimg">Profile Image *</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control" name="edpimg" id="edpimg"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="edpimgH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-12 text-end">
                                <button class="btn adddegbtn">Add Degree</button>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpspecial">Spcialization *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="edpspecial" id="edpspecial"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12">
                                <small id="edpspecialH" class="form-text text-muted">Help text</small>
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
        <div class="d-none all_report_format border p-4 ">
            <div class="col-12 my-4">
                <h3 class="text-center">Report Formats</h3>
            </div>
            <div class="row sraction">
                <div class="col-lg-4 col-md-4 d-flex align-content-center">
                    <h6 class="w-50 text-center mt-1">Search Format</h6>
                    <input class="w-50 form-control" type="search" name="rsearch" id="rsearch"
                        placeholder="Serarch by id">
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-content-center">
                    <h6 class="w-50 text-center mt-1">Report Type</h6>
                    <div class="form-group w-50">
                        <select class="form-select" name="sbyrtype" id="sbyrtype">
                            <option selected disabled value="">Select one</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-content-center">
                    <h6 class="w-50 text-center mt-1">By Create By</h6>
                    <input class="w-50 form-control" type="date" name="sbyrdate" id="sbyrdate">
                </div>

            </div>
            <div class="text-end mt-3">
                <button class="btn btn-primary py-1 px-3 ">Add new</button>
            </div>
            <div class="allrecord border mt-3 ">

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
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="m-0 d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/edit.png" alt="Edit"></span>
                                <span role="button" data-toggle="modal" data-target="#deleterecord"><img
                                        src="../assets/image/delete.png" alt="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/edit.png" alt="Edit"></span>
                                <span role="button"><img src="../assets/image/delete.png" alt="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/print.png" alt="print"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/print.png" alt="print"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/print.png" alt="print"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-none add_report_format border p-2">
            <form id="nrform" action="" method="post" class="py-1 px-2 ">
                <div class="row gx-5 px-5">
                    <div class="col-12 mb-4 mt-3">
                        <h4 class="text-center ">Add Report Format</h4>
                    </div>
                    <div class="col-md-12 col-lg-6 pe-lg-5">
                        <div class="form-group row mb-5 ">
                            <div class="col-4">
                                <label for="rfpby">Prepared By</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="rfpby" disabled id="rfpby"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="rftitle">title *</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="rftitle" id="rftitle"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <small id="rftitleH" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpoldpass">Report Details *</label>
                            </div>
                            <div class="col-8">
                                <textarea name="rfdetails" id="rfdetails" cols="" rows="4"
                                    class="form-control"></textarea>
                            </div>

                        </div>


                    </div>
                    <div class="col-md-12 col-lg-6 ps-lg-5">
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="rfdep">Department *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="rfdep" id="rfdep">
                                    <option selected disabled value="">Select one</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="rfrtype">Report Type *</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="rfrtype" id="rfrtype">
                                    <option selected disabled value="">Select one</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <small id="edppositonH" class="form-text text-muted">Help text</small>
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-4">
                                <label for="edpregno">Report ID *</label>
                            </div>
                            <div class="col-8">
                                <input type="number" disabled class="form-control" name="rfid" id="rfid"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                        </div>
                        <div class="form-group row mb-5">
                        </div>
                    </div>

                    <div class="col-12 text-end">
                        <button class="btn me-4 py-1 px-3 btn-danger">Cancel</button>
                        <button class="btn py-1 px-3 btn-success">Update</button>
                    </div>

                </div>


            </form>
        </div>
        <div class="d-none sent_reports border p-4 ">
            <div class="col-12 my-4">
                <h3 class="text-center">Sent Reports</h3>
            </div>
            <div class="row sraction">
                <div class="col-lg-4 col-md-4 d-flex align-content-center">
                    <h6 class="w-50 text-center mt-1">Search Report</h6>
                    <input class="w-50 form-control" type="search" name="rsearch" id="rsearch"
                        placeholder="Serarch by id">
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-content-center">
                    <h6 class="w-50 text-center mt-1">By Doctor</h6>
                    <div class="form-group w-50">
                        <select class="form-select" name="sbydoc" id="sbdoc">
                            <option selected disabled value="">Select one</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-content-center">
                    <h6 class="w-50 text-center mt-1">By Date</h6>
                    <input class="w-50 form-control" type="date" name="sbydate" id="sbydate">
                </div>

            </div>
            <div class="allrecord border mt-5 ">
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
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="m-0 d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/edit.png" alt="Edit"></span>
                                <span role="button" data-toggle="modal" data-target="#deleterecord"><img
                                        src="../assets/image/delete.png" alt="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/edit.png" alt="Edit"></span>
                                <span role="button"><img src="../assets/image/delete.png" alt="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/print.png" alt="print"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/print.png" alt="print"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>D3FY5</td>
                            <td>Jon Deo</td>
                            <td>Opthalmology</td>
                            <td>Dr Jon Deo</td>
                            <td class="d-flex justify-content-around border-0">
                                <span role="button"><img src="../assets/image/view.png" alt="view"></span>
                                <span role="button"><img src="../assets/image/print.png" alt="print"></span>
                            </td>
                        </tr>
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
        <div class="d-none makeReport px-5 border">
            <div class="row">
                <div class="col-lg-4  p-3">
                    <h5 class="text-center">Report Image</h5>
                    <div class="rimage pointer-event">
                        <img data-enlargable class="img-fluid" src="../assets/image/x-ray.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="" method="post" id="printdata" enctype="text/plain" class=" text-dark">
                        <div class="col-12 ">
                            <h3 class="p-2  text-center ">New Report Prepare</h3>
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
                        </table>
                        <div class="row text-center mt-5 wreportfilter">
                            <div class="col-6 row ">
                                <div class="col-4 text-center mt-1">
                                    Type *
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                      <select class="form-select" name="rtype" id="rtype">
                                        <option>Select One</option>
                                        <option></option>
                                        <option></option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 row" >
                                <div class="col-4 text-center mt-1">
                                     Title *
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                      <select class="form-select" name="rtitle" id="rtitle">
                                        <option>Select One</option>
                                        <option></option>
                                        <option></option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                              <label for="rdetais" class="h5 my-3"   >Write Report : <span class="h6"> Example ( title : details ; title : detais;.....)</span></label>
                              <textarea class="form-control" name="rdetais" id="rdetais" rows="6" placeholder="title : details ; title : detais;....."></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-3 mb-2">
                            <button class="btn btn-danger px-4 pb-1 me-5">Cancel</button>
                            <button class="btn btn-primary px-4 pb-1">send</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


@endsection
<?php

namespace App\Http\Controllers;

use App\Models\creport;
use App\Models\department;
use App\Models\doctor;
use App\Models\format;
use App\Models\report;
use App\Models\rtype;
use App\Rules\bdphone;
use Illuminate\Http\Request;

class doctorController extends Controller
{
    // get Profile Details
    public function getProfile()
    {
        $id = session()->get('uid');
        $details = doctor::find($id);
        $data = compact("details");
        return view('doctor.profile')->with($data);
    }
    // edit profile
    public function editProfile()
    {
        $id = session()->get('uid');
        $user = doctor::find($id);
        $dep = department::get();
        $data = compact("user","dep");
        return view('doctor.editProfile')->with($data);
    }
    // update profile data
    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3',
            'phone' => ['required', new bdphone()],
            'hospital' => ['required', 'min:3'],
            'position' => ['required'],
            'bmcd' => ['required', 'numeric'],

        ]);
        $table = doctor::find(session()->get('uid'));
        $table->dname = $req->name;
        $table->dphn = $req->phone;
        $table->dhospital = $req->hospital;
        $table->dposition = $req->position;
        $table->bmcd = $req->bmcd;
        if (!$req->degree == "") {
            $table->degree = $req->degree;
        }
        if (!$req->dimg == "") {
            $fname = time() . rand(1, 100) . "." . $req->file('dimg')->getClientOriginalExtension();
            $req->file('dimg')->move(public_path('assets/image/profile'), $fname);
            $table->dimg = $fname;
        }
        if (!$req->edpspecial == "") {
            $table->special = $req->edpspecial;
        }
        $table->update();
        return redirect('/doctor/profile');
    }
    // show dahsboard
    public function dashboard()
    {
        $rr = report::where(['docid' => session()->get('uid'), "status" => 0])->get();
        $rr = count($rr);
        $cr = report::where(['docid' => session()->get('uid'), "status" => 1])->get();
        $cr = count($cr);

        $tr = report::where(['docid' => session()->get('uid')])->get();
        $tr = count($tr);
        $data = compact('rr', 'cr', 'tr');
        // $report=report::get();
        // echo "<pre>";
        // print_r($report);
        // die();
        return view('doctor.dashboard')->with($data);
    }
    // show recived report allreport
    public function getrformat(Request $req)
    {
        $type = rtype::select('tid', 'tname')->get();
        $doctors = doctor::select('did', 'dname')->get();
        $skey = $req->search;
        $doc = $req->doc;
        $date = $req->date;
        $where = [];
        if (!$skey == "") {
            $where['format_id'] = "%" . $skey . "%";
        }
        if (!$doc == "") {
            $where['docid'] = "%" . $doc . "%";
        }
        if (!$date == "") {
            $date = date('Y-m-d', strtotime($date));
            $where['formats.created_at'] = "%" . $date . "%";
        }

        $report = format::select('fid', 'format_id', 'title', 'dname', 'tname','formats.docid')->join('doctors', 'doctors.did', '=', 'formats.docid')->join('rtypes', 'rtypes.tid', '=', 'formats.type')->where(
            function ($q) use ($where) {
                foreach ($where as $key => $value) {
                    $q->where($key, 'LIKE', $value);
                }
            }
        )
            ->orderBy('formats.created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($report);
        // die();
        $data = compact('report', 'type', 'doctors');
        return view('doctor.rf')->with($data);
    }
    //add report format
    public function addReportFormat()
    {
        $dep = department::select('id', 'department')->get();
        $title = "Add Report Format";
        $btn = "Add";
        $url = "placeReport";
        $data = compact('title', 'btn', 'url', 'dep');
        return view('doctor.addRF')->with($data);
    }
    // get report type form ajax
    public function getrtpe($data)
    {
        $doc = rtype::where(['did' => $data])->get();
        $data = "";
        if (count($doc) > 0) {
            foreach ($doc as  $item) {
                $data .= '<option value="' . $item['tid'] . '">' . $item['tname'] . '</option>';
            }
        } else {
            $data .= "";
        }
        return $data;
    }
    // place report
    public function placeReport(Request $req)
    {
        $req->validate([
            'title' => 'required|min:4',
            'details' => ['required'],
            'department' => ['required'],
            'type' => ['required'],

        ]);
        $table = new format();
        $table->docid = session()->get('uid');
        $table->title = $req->title;
        $table->type = $req->type;
        $table->department = $req->department;
        $table->format_id = uniqid();
        $table->details = $req->details;

        $table->save();
        return redirect('/doctor/report-formats');
    }
    // edit report format 
    public function editFormat($id)
    {
        $checkAut = format::where(['docid' => session()->get('uid'), 'fid' => $id])->get();
        if (count($checkAut) > 0) {
            $dep = department::select('id', 'department')->get();
            $type = rtype::select('tid', 'tname')->get();
            $format = format::find($id);
            $title = "Update Report Format";
            $btn = "Update";
            $url = "updateFormat/" . $id;
            $data = compact('title', 'btn', 'url', 'dep', 'format', 'type');
            return view('doctor.addRF')->with($data);
        } else {
            return redirect()->back();
        }
    }
    // format view 
    public function fromatview($id){
        $checkAut = format::where([ 'fid' => $id])->get();
        if (count($checkAut) > 0) {
            $dep = department::select('id', 'department')->get();
            $type = rtype::select('tid', 'tname')->get();
            $format = format::find($id);
           
            $data = compact( 'dep', 'format', 'type');
            return view('doctor.format_view')->with($data);
        } else {
            return redirect()->back();
        }
    }
    // update Report
    public function updateFormat(Request $req, $id)
    {
        $req->validate([
            'title' => 'required|min:4',
            'details' => ['required']

        ]);
        $table = format::find($id);
        $table->title = $req->title;
        $table->details = $req->details;

        $table->update();
        return redirect('/doctor/report-formats');
    }
    // delete format 
    public function deleteFormat($id)
    {
        $checkAut = format::where(['docid' => session()->get('uid'), 'fid' => $id])->get();
        if (count($checkAut) > 0) {
            $fr = format::find($id)->delete();
            return view('doctor.rf');
        } else {
            return redirect()->back();
        }
    }
    // show recived report allreport
    public function rreport(Request $req)
    {
        $type = rtype::select('tid', 'tname')->get();
        $skey = $req->search;
        $doc = $req->doc;
        $date = $req->date;
        $where = [];
        if (!$skey == "") {
            $where['pname'] = "%" . $skey . "%";
        }
        if (!$doc == "") {
            $where['type'] = "%" . $doc . "%";
        }
        if (!$date == "") {
            $date = date('Y-m-d', strtotime($date));
            $where['reports.created_at'] = "%" . $date . "%";
        }

        $report = report::select('rid', 'rpid', 'pname', 'dname', 'departments.department', 'tname', 'reports.created_at')->join('doctors', 'doctors.did', '=', 'reports.docid')->join('departments', 'departments.id', '=', 'reports.department')->join('rtypes', 'rtypes.tid', '=', 'reports.type')->where(
            function ($q) use ($where) {
                foreach ($where as $key => $value) {
                    $q->where($key, 'LIKE', $value);
                }
            }
        )
            ->where(['reports.docid' => session()->get('uid')])->where(['reports.status' => 0])->orderBy('reports.created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($report);
        // die();
        $data = compact('report', 'type');
        return view('doctor.rr')->with($data);
    }
    // get prepare report
    public function getPrepare($id)
    {
        $report = report::where(['docid' => session()->get('uid'), 'rid' => $id])->get();
        if (count($report) > 0) {
            $report = report::select('img', 'rpid', 'pname', 'reports.type', 'title', 'tname', 'reports.created_at', 'age', 'gender')->join("rtypes", "rtypes.tid", "=", "reports.type")->where(['rid' => $id])->get();
            $rpf = $report[0]['type'];
            // echo $rpf;
            $rt = format::join("rtypes", "rtypes.tid", "=", "formats.type")->where(['type' => $rpf])->get();
            // echo "<pre>";
            // print_r($rt);
            // die();
            $btn = 'Save';
            $url = "makereport/$id";
            $title = "New Report prepare";
            $data = compact('btn', 'url', 'title', 'report', 'rt');
            return view('doctor.prepare')->with($data);
        } else {
            return redirect()->back();
        }
    }
    public function makereport(Request $req, $id)
    {
        $report = report::where(['docid' => session()->get('uid'), 'rid' => $id, 'status' => 0])->get();
        if (count($report) > 0) {
            $req->validate([
                'rdetais' => "required",
                'title' => "required"
            ]);
            $table = new creport();
            $table->rdetails = $req->rdetais;
            $table->fid = $req->title;
            $table->rid = $report[0]['rid'];
            $table->docid = session()->get('uid');
            $table->save();
            report::find($id)->update(['status' => 1]);
            return redirect('/doctor/recived-reports');
        } else {
            return redirect()->back();
        }
    }
    // edit report
    public function editreport($id)
    {
        $creport = creport::where(['docid' => session()->get('uid'), 'id' => $id])->get();
        if (count($creport) > 0) {
            $report = creport::select('creports.id','reports.status','type','img','rdetails','rpid', 'pname', 'tname', 'title', 'reports.created_at', 'age', 'gender','creports.fid')->join("reports", "reports.rid", "=", "creports.rid")->join("rtypes", "rtypes.tid", "=", "reports.type")->where(['creports.id' => $id])->get();
            $rpf = $report[0]['type'];
            $rt = format::join("rtypes", "rtypes.tid", "=", "formats.type")->where(['type' => $rpf])->get();
            //  echo "<pre>";
            // print_r($report);
            // die();
            $btn = 'Update';
            $url = "update-report/$id";
            $title = "Update Report";
            $data = compact('btn', 'url', 'title', 'report','rt');
            return view('doctor.prepare')->with($data);
        } else {
            return redirect()->back();
        }
    }

    // update report 
    public function updatereport(Request $req, $id)
    {
        $report = creport::where(['docid' => session()->get('uid'), 'id' => $id])->get();
        if (count($report) > 0) {
            $req->validate([
                'rdetais' => "required"
            ]);
            $table = creport::find($id);
            $table->rdetails = $req->rdetais;
            $table->fid = $req->title;
            $table->update();
            report::find($table['rid'])->update(['status' => 1]);
            return redirect('/doctor/complete-reports');
        } else {
            return redirect()->back();
        }
    }
        // view print data
    public function viewPrint($id)
    {
        $creport = creport::where(['docid' => session()->get('uid'), 'id' => $id])->get();

        if (count($creport) > 0) {
            $report = creport::select('creports.id','dname','reports.status','img','rdetails','departments.department','rpid', 'pname', 'tname', 'title', 'reports.created_at', 'age', 'gender')->join("reports", "reports.rid", "=", "creports.rid")->join("rtypes", "rtypes.tid", "=", "reports.type")->join("departments", "departments.id", "=", "reports.department")->join("doctors", "doctors.did", "=", "reports.docid")->where(['creports.id' => $id])->get();
            // $rt = format::get();
            // echo "<pre>";
            // print_r($report);
            // die();
            $data = compact('report');
            return view('doctor.vp')->with($data);
        } else {
            return redirect()->back();
        }
        }
    // show complete report 
    public function creport(Request $req)
    {
        $type = rtype::select('tid', 'tname')->get();
        $skey = $req->search;
        $doc = $req->doc;
        $date = $req->date;
        $where = [];
        if (!$skey == "") {
            $where['pname'] = "%" . $skey . "%";
        }
        if (!$doc == "") {
            $where['type'] = "%" . $doc . "%";
        }
        if (!$date == "") {
            $date = date('Y-m-d', strtotime($date));
            $where['reports.created_at'] = "%" . $date . "%";
        }

        $report = report::select('creports.id','reports.rid', 'rpid', 'pname', 'dname', 'departments.department', 'tname', 'reports.created_at')->join('doctors', 'doctors.did', '=', 'reports.docid')->join('departments', 'departments.id', '=', 'reports.department')->join('rtypes', 'rtypes.tid', '=', 'reports.type')->join("creports", "creports.rid", "=", "reports.rid")->where(
            function ($q) use ($where) {
                foreach ($where as $key => $value) {
                    $q->where($key, 'LIKE', $value);
                }
            }
        )
            ->where(['reports.docid' => session()->get('uid')])->where(['reports.status' => 1])->orderBy('reports.created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($report);
        // die();
        $data = compact('report', 'type');
        return view('doctor.cr')->with($data);
    }
    // show all report 
    public function allreport(Request $req)
    {
        $type = rtype::select('tid', 'tname')->get();
        $skey = $req->search;
        $doc = $req->doc;
        $date = $req->date;
        $where = [];
        if (!$skey == "") {
            $where['pname'] = "%" . $skey . "%";
        }
        if (!$doc == "") {
            $where['type'] = "%" . $doc . "%";
        }
        if (!$date == "") {
            $date = date('Y-m-d', strtotime($date));
            $where['reports.created_at'] = "%" . $date . "%";
        }

        $report = report::select('reports.rid', 'rpid', 'pname', 'dname', 'departments.department', 'tname', 'reports.created_at', 'reports.status')->join('doctors', 'doctors.did', '=', 'reports.docid')->join('departments', 'departments.id', '=', 'reports.department')->join('rtypes', 'rtypes.tid', '=', 'reports.type')->where(
            function ($q) use ($where) {
                foreach ($where as $key => $value) {
                    $q->where($key, 'LIKE', $value);
                }
            }
        )
            ->where(['reports.docid' => session()->get('uid')])->orderBy('reports.created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($report);
        // die();
        $data = compact('report', 'type');
        return view('doctor.ar')->with($data);
    }
    // change format
    public function changeFormat($id){
        $format = format::where(['fid' => $id])->get();
        
        if(count($format) > 0){
            echo $format[0]['details'];
        }else{
            echo "";
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\creport;
use App\Models\department;
use App\Models\doctor;
use App\Models\hospital;
use App\Models\report;
use App\Models\rtype;
use App\Rules\bdphone;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class hospitalController extends Controller
{
    // get Profile Details
    public function getProfile()
    {
        $id = session()->get('uid');
        $details = hospital::find($id);
        $data = compact("details");
        return view('hospital.profile')->with($data);
    }

    // edit profile
    public function editProfile()
    {
        $id = session()->get('uid');
        $user = hospital::find($id);
        $data = compact("user");
        return view('hospital.editProfile')->with($data);
    }
    // update profile data
    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3',
            'phone' => ['required', new bdphone()],

        ]);
        $table = hospital::find(session()->get('uid'));
        $table->hname = $req->name;
        $table->hphn = $req->phone;
        if (!$req->address == "") {
            $table->haddress = $req->address;
        }
        if (!$req->location == "") {
            $table->hlocation = $req->location;
        }
        $table->update();
        return redirect('/hospital/profile');
    }
    // show dahsboard
    public function dashboard()
    {
        $rr = report::where(['auth' => session()->get('uid'), "status" => 0])->get();
        $rr = count($rr);
        $cr = report::where(['auth' => session()->get('uid'), "status" => 1])->get();
        $cr = count($cr);

        $tr = report::where(['auth' => session()->get('uid')])->get();
        $tr = count($tr);
        $data = compact('rr', 'cr', 'tr');
        return view('hospital.dashboard')->with($data);
    }
    // show report form
    public function makeReprot()
    {
        $dep = department::get();
        $url = '/hospital/place-report';
        $title = "Add New Report";
        $btn = "Add";
        $data = compact('dep', 'url', 'title', 'btn');
        return view('hospital.nr')->with($data);
    }
    // get preferd doctor form ajax
    public function getpdoc($data)
    {
        $doc = doctor::where(['dposition' => $data])->get();
        $data = "";
        if (count($doc) > 0) {
            foreach ($doc as  $item) {
                $data .= '<option value="' . $item['did'] . '">' . $item['dname'] . '</option>';
            }
        } else {
            $data .= "<option value=''>No Doctor Found ..!</option>";
        }
        return $data;
    }
    // get preferd doctor form ajax
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
    // place a report
    public function placeReport(Request $req)
    {
        $req->validate([
            'title' => 'required|min:5',
            'name' => 'required|min:3',
            'gender' => 'required',
            'department' => 'required',
            'doctor' => 'required',
            'type' => 'required',
            'age' => 'required',
            'report_img' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $table = new report();
        $table->rpid = uniqid();
        $table->auth = session()->get('uid');
        $table->title = $req->title;
        $table->pname = $req->name;
        $table->gender = $req->gender;
        $table->docid = $req->doctor;
        $table->department = $req->department;
        $table->type = $req->type;
        $table->age = $req->age;
        $fname = time() . rand(1, 100) . "." . $req->file('report_img')->getClientOriginalExtension();
        $req->file('report_img')->move(public_path('assets/image/reportImg'), $fname);
        $table->img = $fname;
        $table->save();
        return redirect('/hospital/sent-reports');
    }
    // get sent report
    public function sreport(Request $req)
    {
        $doctor = doctor::select('did', 'dname')->get();
        $skey = $req->search;
        $doc = $req->doc;
        $date = $req->date;
        $where = [];
        if (!$skey == "") {
            $where['pname'] = "%" . $skey . "%";
        }
        if (!$doc == "") {
            $where['docid'] = "%" . $doc . "%";
        }
        if (!$date == "") {
            $date = date('Y-m-d', strtotime($date));
            $where['reports.created_at'] = "%" . $date . "%";
        }

        $report = report::select('rid', 'rpid', 'pname', 'dname', 'departments.department', 'tname')->join('doctors', 'doctors.did', '=', 'reports.docid')->join('departments', 'departments.id', '=', 'reports.department')->join('rtypes', 'rtypes.tid', '=', 'reports.type')->where(
            function ($q) use ($where) {
                foreach ($where as $key => $value) {
                    $q->where($key, 'LIKE', $value);
                }
            }
        )
            ->where(['reports.auth' => session()->get('uid')])->where(['reports.status' => 0])->orderBy('reports.created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($report);
        // die();
        $data = compact('report', 'doctor');
        return view('hospital.sr')->with($data);
    }
    // get complite reports
    public function creport(Request $req)
    {
        $doctor = doctor::select('did', 'dname')->get();
        $skey = $req->search;
        $doc = $req->doc;
        $date = $req->date;
        $where = [];
        if (!$skey == "") {
            $where['pname'] = "%" . $skey . "%";
        }
        if (!$doc == "") {
            $where['docid'] = "%" . $doc . "%";
        }
        if (!$date == "") {
            $date = date('Y-m-d', strtotime($date));
            $where['reports.created_at'] = "%" . $date . "%";
        }

        $report = report::select('rid', 'rpid', 'pname', 'dname', 'departments.department', 'tname')->join('doctors', 'doctors.did', '=', 'reports.docid')->join('departments', 'departments.id', '=', 'reports.department')->join('rtypes', 'rtypes.tid', '=', 'reports.type')->where(
            function ($q) use ($where) {
                foreach ($where as $key => $value) {
                    $q->where($key, 'LIKE', $value);
                }
            }
        )
            ->where(['reports.auth' => session()->get('uid')])->where(['reports.status' => 1])->orderBy('reports.created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($report);
        // die();
        $data = compact('report', 'doctor');
        return view('hospital.cr')->with($data);
    }
    // view print data
    public function viewPrint($id)
    {
        $creport = report::where(['auth' => session()->get('uid'), 'rid' => $id])->get();

        if (count($creport) > 0) {
            $report = creport::select('creports.id', 'dname', 'reports.status', 'img', 'rdetails', 'departments.department', 'rpid', 'pname', 'tname', 'title', 'reports.created_at', 'age', 'gender')->join("reports", "reports.rid", "=", "creports.rid")->join("rtypes", "rtypes.tid", "=", "reports.type")->join("departments", "departments.id", "=", "reports.department")->join("doctors", "doctors.did", "=", "reports.docid")->where(['creports.rid' => $id])->get();
            // $rt = format::get();
            // echo "<pre>";
            // print_r($report);
            // die();
            $data = compact('report');
            return view('hospital.vp')->with($data);
        } else {
            return redirect()->back();
        }
    }
    // get all reports
    public function allreport(Request $req)
    {
        $doctor = doctor::select('did', 'dname')->get();
        $skey = $req->search;
        $doc = $req->doc;
        $date = $req->date;
        $where = [];
        if (!$skey == "") {
            $where['pname'] = "%" . $skey . "%";
        }
        if (!$doc == "") {
            $where['docid'] = "%" . $doc . "%";
        }
        if (!$date == "") {
            $date = date('Y-m-d', strtotime($date));
            $where['reports.created_at'] = "%" . $date . "%";
        }

        $report = report::select('rid', 'rpid', 'pname', 'dname', 'departments.department', 'tname', 'reports.status')->join('doctors', 'doctors.did', '=', 'reports.docid')->join('departments', 'departments.id', '=', 'reports.department')->join('rtypes', 'rtypes.tid', '=', 'reports.type')->where(
            function ($q) use ($where) {
                foreach ($where as $key => $value) {
                    $q->where($key, 'LIKE', $value);
                }
            }
        )
            ->where(['reports.auth' => session()->get('uid')])->orderBy('reports.created_at', 'DESC')->get();

        // echo "<pre>";
        // print_r($report);
        // die();
        $data = compact('report', 'doctor');
        return view('hospital.ar')->with($data);
    }
    // edit report
    public function editReport($id)
    {
        $checkauth = report::where(['rid' => $id, 'auth' => session()->get('uid'), 'status' => 0])->get();

        if (count($checkauth) > 0) {
            $dep = department::get();
            $report = report::find($id);
            // echo "<pre>";
            // print_r($report['rid']);
            // die();
            $doctor = doctor::select('did', 'dname')->where(['dposition' => $report['department']])->get();
            $rtype = rtype::select('tid', 'tname')->where(['tid' => $report['type']])->get();
            $url = '/hospital/update-report/' . $id;
            $title = "Update Report";
            $btn = "Update";
            $data = compact('dep', 'url', 'title', 'btn', 'report', 'doctor', 'rtype');
            return view('hospital.nr')->with($data);
        } else {
            return redirect()->back();
        }
    }
    public function updateReport(Request $req, $id)
    {
        $req->validate([
            'title' => 'required|min:5',
            'name' => 'required|min:3',
            'gender' => 'required',
            'department' => 'required',
            'doctor' => 'required',
            'type' => 'required',
            'age' => 'required',
            'report_img' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $table = report::find($id);
        $table->title = $req->title;
        $table->pname = $req->name;
        $table->gender = $req->gender;
        $table->docid = $req->doctor;
        $table->department = $req->department;
        $table->type = $req->type;
        $table->age = $req->age;
        if (!$req->report_img == "") {
            $fname = time() . rand(1, 100) . "." . $req->file('report_img')->getClientOriginalExtension();
            $req->file('report_img')->move(public_path('assets/image/reportImg'), $fname);
            unlink(public_path('assets/image/reportImg/' . $table['img']));
            $table->img = $fname;
        }

        $table->update();
        return redirect('/hospital/sent-reports');
    }
    // get delete model
    public function getdmodel($id)
    {
        $checkauth = report::where(['rid' => $id, 'auth' => session()->get('uid')])->get();

        if (count($checkauth) > 0) {
            return '<button type="button" class="btn px-4 py-1 me-3 btn-danger"
                data-dismiss="modal">No</button>
            <a href="/hospital/delete-report/' . $id . '" type="button" class="btn px-4 py-1 ms-3 btn-success">Yes</a>';
        } else {
            return redirect()->back();
        }
    }
    // delete report deleteRreport
    public function deleteRreport($id)
    {
        $checkauth = report::where(['rid' => $id, 'auth' => session()->get('uid'), 'status' => 0])->get();

        if (count($checkauth) > 0) {
            $record = report::find($id);
            unlink(public_path('assets/image/reportImg/' . $record['img']));
            $record->delete();
            return redirect()->back();
            // return view('hospital.sr');
        } else {
            return redirect()->back();
        }
    }
}

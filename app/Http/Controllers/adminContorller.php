<?php

namespace App\Http\Controllers;

use App\Models\ad;
use App\Models\department;
use App\Models\doctor;
use App\Models\hospital;
use App\Rules\bdphone;
use Illuminate\Http\Request;

class adminContorller extends Controller
{
    // login 
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $dtable = ad::where(["email" => $req->email, "password" => $req->password])->get();

        if (count($dtable) > 0) {
            session()->put("status", 1);
            session()->put("admin", $dtable[0]['id']);
            return redirect('/admin/dashboard');
        } else {
            session()->flash("error", "Email or password not match");
            return redirect()->back();
        }
    }
    // logout
    public function logout()
    {
        session()->forget('admin');
        session()->forget('status');
        return redirect('/admin');
    }
    //dashboard
    public function dashboard()
    {
        $hac = hospital::where(['hstatus' => 1])->orwhere(['hstatus' => 2])->get();
        $hac = count($hac);
        $hrq = hospital::where(['hstatus' => 0])->get();
        $hrq = count($hrq);
        $hall = hospital::get();
        $hall = count($hall);
        $dac = doctor::where(['status' => 1])->orwhere(['status' => 2])->get();
        $dac = count($dac);
        $drq = doctor::where(['status' => 0])->get();
        $drq = count($drq);
        $dall = doctor::get();
        $dall = count($dall);
        $data = compact('hac', 'hrq', 'hall', 'dac', 'drq', 'dall');
        return view('admin.dashboard')->with($data);
    }
    public function getDoctors(Request $req)
    {
        $skey = $req->search;
        $type = $req->type;
        $where = [];
        if (!$skey == "") {
            $where['dname'] = "%" . $skey . "%";
        }
        if (!$type == "") {
            $where['status'] = "%" . $type . "%";
        }
        $doctor = doctor::where(function ($q) use ($where) {
            foreach ($where as $key => $value) {
                $q->where($key, 'LIKE', $value);
            }
        })->where('status',"=",1)->orwhere('status',"=",2)->get();
        // echo "<pre>";
        // print_r($doctor);
        // die();
        $data = compact('doctor');
        return view('admin.doc')->with($data);
    }
    public function getHospitals(Request $req)
    {
        $skey = $req->search;
        $type = $req->type;
        $where = [];
        if (!$skey == "") {
            $where['hname'] = "%" . $skey . "%";
        }
        if (!$type == "") {
            $where['hstatus'] = "%" . $type . "%";
        }
        $hospital = hospital::where(function ($q) use ($where) {
            foreach ($where as $key => $value) {
                $q->where($key, 'LIKE', $value);
            }
        })->where('hstatus',"=",1)->orwhere('hstatus',"=",2)->get();
        $data = compact('hospital');
        return view('admin.hos')->with($data);
    }
    // add doctor from
    public function docform()
    {
        $dep = department::get();
        $data = compact('dep');
        return view('admin.addDoc')->with($data);
    }
    // update profile data
    public function placeDoc(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:6',
            'email' => 'required|email',
            'phone' => ['required', new bdphone()],
            'hospital' => ['required', 'min:3'],
            'department' => ['required'],
            'bmcd' => ['required', 'numeric'],

        ]);
        $vkey = time() . uniqid();

        $table = new doctor();
        $table->dname = $req->name;
        $table->demail = $req->email;
        $table->dpass = $req->password;
        $table->dphn = $req->phone;
        $table->dhospital = $req->hospital;
        $table->dposition = $req->department;
        $table->bmcd = $req->bmcd;
        $table->hverify = $vkey;

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
        $table->save();
        return redirect('/admin/doctor-request');
    }
    public function hosform()
    {
        return view('admin.addHos');
    }
    // Place hospital data
    public function placeHos(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => ['required', new bdphone()],

        ]);
        $vkey = time() . uniqid();
        $table = new hospital();
        $table->hname = $req->name;
        $table->hemail = $req->email;
        $table->hpass = $req->password;
        $table->hphn = $req->phone;
        $table->hverify = $vkey;

        if (!$req->address == "") {
            $table->haddress = $req->address;
        }
        if (!$req->location == "") {
            $table->hlocation = $req->location;
        }
        $table->save();
        return redirect('/admin/hospitals');
    }
    // get doctor profile
    public function doctor_profile($id)
    {
        $check = doctor::where(['did' => $id])->get();
        if (count($check) > 0) {
            $details = doctor::find($id);
            $data = compact('details');
            return view('admin.docProfile')->with($data);
        } else {
            return redirect()->back();
        }
    }
    // block or active
    public function doctor_action($id)
    {
        $check = doctor::where(['did' => $id])->get();
        if (count($check) > 0) {
            $details = doctor::find($id);
            $status = $details['status'];
            $data = compact('details', 'status');
            return view('admin.docProfile')->with($data);
        } else {
            return redirect()->back();
        }
    }
    public function doctor_block($id){
        $check = doctor::where(['did' => $id])->get();
        if(count($check) > 0){
            $table=doctor::find($id);
            $table->status = 2;
            $table->update();

            return redirect('/admin/doctors');
        }else{
            return redirect()->back();
        }
    }
    public function doctor_active($id){
        $check = doctor::where(['did' => $id,])->get();
        if(count($check) > 0){
            $table =doctor::find($id);
            $table->status = 1;
            $table->update();
            // die();
            return redirect('/admin/doctors');
        }else{
            return redirect()->back();
        }
    }
    // get hospital profile
    public function hospital_profile($id)
    {
        $check = hospital::where(['hid' => $id])->get();
        if (count($check) > 0) {
            $details = hospital::find($id);
            $data = compact('details');
            return view('admin.hosProfile')->with($data);
        } else {
            return redirect()->back();
        }
    }
    // block or active
    public function hospital_action($id)
    {
        $check = hospital::where(['hid' => $id])->get();
        if (count($check) > 0) {
            $details = hospital::find($id);
            $status = $details['hstatus'];
            $data = compact('details', 'status');
            return view('admin.hosProfile')->with($data);
        } else {
            return redirect()->back();
        }
    }
    public function hospital_block($id){
        $check = hospital::where(['hid' => $id])->get();
        if(count($check) > 0){
            $table =hospital::find($id);
            $table->hstatus = 2;
            $table->update();
            return redirect('/admin/hospitals');
        }else{
            return redirect()->back();
        }
    }
    public function hospital_active($id){
        $check = hospital::where(['hid' => $id])->get();
        if(count($check) > 0){
            $table =hospital::find($id);
            $table->hstatus = 1;
            $table->update();
            return redirect('/admin/hospitals');
        }else{
            return redirect()->back();
        }
    }
    public function drequest()
    {
        $doctor = doctor::where(['status' => 0])->get();
        // echo "<pre>";
        // print_r($hospital);
        // die();
        $data = compact('doctor');
        return view('admin.dreq')->with($data);
    }
    public function hrequest()
    {
        $hospital = hospital::where(['hstatus' => 0])->get();
        // echo "<pre>";
        // print_r($hospital);
        // die();
        $data = compact('hospital');
        return view('admin.hreq')->with($data);
    }
    public function requested_doctor_profile($id){
        $check = doctor::where(['did' => $id])->get();
        if (count($check) > 0) {
            $details = doctor::find($id);
            $aprove=$details['status'];
            $data = compact('details','aprove');
            return view('admin.docProfile')->with($data);
        } else {
            return redirect()->back();
        }
    }
    public function requested_hospital_profile($id){
        $check = hospital::where(['hid' => $id])->get();
        if (count($check) > 0) {
            $details = hospital::find($id);
            $aprove=$details['hstatus'];
            $data = compact('details','aprove');
            return view('admin.hosProfile')->with($data);
        } else {
            return redirect()->back();
        }
    }
}

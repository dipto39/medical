<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\hospital;
use Illuminate\Http\Request;

class loginController extends Controller
{
    // login to doctor
    public function login_d(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $dtable = doctor::where(["demail" => $req->email, "dpass" => $req->password])->get();

        if (count($dtable) > 0) {
            $check_verify = doctor::where(['did' => $dtable[0]['did'], 'hverify' => ""])->get();
            if (count($check_verify) > 0) {
                $name = $dtable[0]['dname'];
                session()->put("type", 1);
                session()->put("uid", $dtable[0]['did']);
                session()->put("name", $name);
                session()->put("img", $dtable[0]['dimg']);
                return redirect('/doctor/dashboard');
            } else {

                session()->flash("error", "Your account is not verified");
                return redirect()->back();
            }
        } else {
            session()->flash("error", "Email or password not match");
            return redirect()->back();
        }
    }
    // login to hospital
    public function login_h(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $dtable = hospital::where(["hemail" => $req->email, "hpass" => $req->password])->get();
        if (count($dtable) > 0) {
            $check_verify = hospital::where(['hid' => $dtable[0]['hid'], 'hverify' => ""])->get();
            if (count($check_verify) > 0) {
                $name = $dtable[0]['hname'];
                session()->put("type", 2);
                session()->put("uid", $dtable[0]['hid']);
                session()->put("name", $name);

                return redirect('/hospital/dashboard');
            } else {
                session()->flash("error", "Your account is not verified");
                return redirect()->back();
            }
        } else {
            session()->flash("error", "Email or password not match");
            return redirect()->back();
        }
    }
    // logout
    public function logout()
    {
        session()->forget('type');
        session()->forget('name');
        session()->forget('uid');
        session()->forget("img");

        return redirect('/');
    }
    // register doctor 
    public function register_d(Request $req)
    {
        $req->validate([
            'regType' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:6',
            'conpass' => 'required_with:password|same:password'
        ]);
        $check_email_exist = doctor::where(['demail' => $req->email])->get();
        if (count($check_email_exist) > 0) {
            session()->flash("error", "Email has already here");
            return redirect()->back();
        } else {
            $vkey = time() . uniqid();
            $dtable = new doctor();
            $dtable->dname = $req->name;
            $dtable->demail = $req->email;
            $dtable->dpass = $req->password;
            $dtable->hverify = $vkey;
            $dtable->save();
            //         $to = 'user@example.com'; 
            // $from = 'sender@example.com'; 
            // $fromName = 'SenderName'; 

            // $subject = "Send HTML Email in PHP by CodexWorld"; 

            // $htmlContent = ' 
            //     <html> 
            //     <head> 
            //         <title>Welcome to MRM</title> 
            //     </head> 
            //     <body> 
            //         <h1>Thanks you for joining with us!</h1> 
            //         <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 

            //             <tr> 
            //                 <th>Verificatoion link:</th><td><a href="link">Click here</a></td> 
            //             </tr> 
            //         </table> 
            //     </body> 
            //     </html>'; 

            // // Set content-type header for sending HTML email 
            // $headers = "MIME-Version: 1.0" . "\r\n"; 
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

            // // Additional headers 
            // $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 


            // // Send email 
            // if(mail($to, $subject, $htmlContent, $headers)){ 
            //     echo 'Email has sent successfully.'; 
            // }else{ 
            //    echo 'Email sending failed.'; 
            // }
            session()->flash("verify", "sent");
            return redirect()->back();
        }
    }
    // register doctor 
    public function register_h(Request $req)
    {
        $req->validate([
            'regType' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:6',
            'conpass' => 'required_with:password|same:password'
        ]);
        $check_email_exist = hospital::where(['hemail' => $req->email])->get();
        if (count($check_email_exist) > 0) {
            session()->flash("error", "Email has already here");
            return redirect()->back();
        } else {
            $vkey = time() . uniqid();
            $dtable = new hospital();
            $dtable->hname = $req->name;
            $dtable->hemail = $req->email;
            $dtable->hpass = $req->password;
            $dtable->hverify = $vkey;
            $dtable->save();
            //         $to = 'user@example.com'; 
            // $from = 'sender@example.com'; 
            // $fromName = 'SenderName'; 

            // $subject = "Send HTML Email in PHP by CodexWorld"; 

            // $htmlContent = ' 
            //     <html> 
            //     <head> 
            //         <title>Welcome to MRM</title> 
            //     </head> 
            //     <body> 
            //         <h1>Thanks you for joining with us!</h1> 
            //         <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 

            //             <tr> 
            //                 <th>Verificatoion link:</th><td><a href="link">Click here</a></td> 
            //             </tr> 
            //         </table> 
            //     </body> 
            //     </html>'; 

            // // Set content-type header for sending HTML email 
            // $headers = "MIME-Version: 1.0" . "\r\n"; 
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

            // // Additional headers 
            // $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 


            // // Send email 
            // if(mail($to, $subject, $htmlContent, $headers)){ 
            //     echo 'Email has sent successfully.'; 
            // }else{ 
            //    echo 'Email sending failed.'; 
            // }
            session()->flash("verify", "sent");
            return redirect()->back();
        }
    }


    // verify user
    public function verify($vtype, $vkey)
    {
        if ($vtype == 1) {
            $table = new doctor();
            $data = $table->where(['hverify' => $vkey])->get();
            if (count($data) > 0) {
                $dt = doctor::find($data[0]['did']);
                $dt->update(['hverify' => ""]);
                session()->put("type", 1);
                session()->put("uid", $data[0]['did']);
                session()->put("name", $data[0]['dname']);
                session()->put("img", $data[0]['dimg']);

                return redirect('/doctor/dashboard');
            } else {
                echo "your account is already verified";
            }
        } elseif ($vtype == 2) {
            $table = new hospital();
            $data = $table->where(['hverify' => $vkey])->get();

            if (count($data) > 0) {
                $dt = hospital::find($data[0]['hid']);
                
                $dt->update(['hverify' => ""]);
                session()->put("type", 2);
                session()->put("uid", $data[0]['hid']);
                session()->put("name", $data[0]['hname']);

                return redirect('/hospital/dashboard');
            } else {
                echo "your account is already verified";
            }
        }
    }
}

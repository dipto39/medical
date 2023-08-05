<?php

use App\Http\Controllers\adminContorller;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\hospitalController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use PhpParser\Comment\Doc;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => "/hospital", 'middleware' => 'login', 'middleware' => 'hcheck'], function () {
    Route::get('/', [hospitalController::class, "dashboard"]);
    Route::get('/dashboard', [hospitalController::class, "dashboard"]);
    // get prefered doctor
    Route::get('/getpdoc/{docid}', [hospitalController::class, "getpdoc"]);
    // get new report type
    Route::get('/gettype/{docid}', [hospitalController::class, "getrtpe"]);
    // place report
    Route::post('/place-report', [hospitalController::class, 'placeReport']);
    // get all sent reports
    Route::get('/sent-reports', [hospitalController::class, "sreport"]);
    // get all complete reports
    Route::get('/complete-reports', [hospitalController::class, "creport"]);
    // get all reports
    Route::get('/all-reports', [hospitalController::class, "allreport"]);
    // view print reports viewPrint
    Route::get('/print/{id}', [hospitalController::class, "viewPrint"]);
    // edit report
    Route::get('/edit/{id}', [hospitalController::class, "editReport"]);
    // update report
    Route::post('/update-report/{id}', [hospitalController::class, "updateReport"]);

    // get delete modal 
    Route::get("/deleteModel/{id}", [hospitalController::class, "getdmodel"]);
    Route::get("/delete-report/{id}", [hospitalController::class, "deleteRreport"]);
    Route::get('/profile', [hospitalController::class, "getProfile"]);
    Route::get('/edit-profile', [hospitalController::class, "editProfile"]);
    Route::post('/update-profile', [hospitalController::class, 'updateProfile']);
});
Route::group(['prefix' => "/hospital", 'middleware' => 'login', 'middleware' => 'hcheck', 'middleware' => 'hosapproval'], function () {
    Route::get('/new-report', [hospitalController::class, "makeReprot"]);
    // place report
    Route::post('/place-report', [hospitalController::class, 'placeReport']);
});

Route::group(['prefix' => "/doctor", 'middleware' => 'login', 'middleware' => 'dcheck'], function () {
    Route::get('/', [doctorController::class, "dashboard"]);
    Route::get('/dashboard', [doctorController::class, "dashboard"]);
    // get report format
    Route::get('/report-formats', [doctorController::class, "getrformat"]);
    //add show report form

    // get new report type for axax
    Route::get('/gettype/{docid}', [doctorController::class, "getrtpe"]);
    // edit report format
    Route::get('/edit-format/{id}', [doctorController::class, "editFormat"]);
    // update report format
    Route::post('/updateFormat/{id}', [doctorController::class, "updateFormat"]);
    // delete report format 
    Route::get('/delete-format/{id}', [doctorController::class, "deleteFormat"]);

    // get recived reports
    Route::get('/recived-reports', [doctorController::class, "rreport"]);
    // get complete reports
    Route::get('/complete-reports', [doctorController::class, "creport"]);

    // view print reports viewPrint
    Route::get('/print/{id}', [doctorController::class, "viewPrint"]);



    // get all reports
    Route::get('/all-reports', [doctorController::class, "allreport"]);
// format view
    Route::get('/format-view/{id}', [doctorController::class, "fromatview"]); 


    Route::get('/profile', [doctorController::class, "getProfile"]);
    Route::get('/edit-profile', [doctorController::class, "editProfile"]);
    Route::post('/update-profile', [doctorController::class, 'updateProfile']);
});
Route::group(['prefix' => "/doctor", 'middleware' => 'login', 'middleware' => 'dcheck', 'middleware' => 'docapproval'], function () {
    // edit reports
    Route::get('/edit-report/{id}', [doctorController::class, "editreport"]);
    Route::get('/add-report-format', [doctorController::class, 'addReportFormat']);
    // place report
    Route::post('/placeReport', [doctorController::class, 'placeReport']);
    // prepare a report
    Route::get('/prepare/{id}', [doctorController::class, "getPrepare"]);
    Route::post('/makereport/{id}', [doctorController::class, "makereport"]);
    // update reports 
    Route::post('/update-report/{id}', [doctorController::class, "updatereport"]); 
    // by ajax
    Route::get('/cnage_format/{id}', [doctorController::class, "changeFormat"]); 
});
Route::group(['prefix' => "/admin", 'middleware' => 'acheck'], function () {
    Route::get('/logout', [adminContorller::class, "logout"]);
    Route::get('/dashboard', [adminContorller::class, 'dashboard']);
    Route::get('/doctors', [adminContorller::class, 'getDoctors']);
    Route::get('/add-doctor', [adminContorller::class, 'docform']);
    Route::post('/placeDoc', [adminContorller::class, 'placeDoc']);
    Route::get('/hospitals', [adminContorller::class, 'getHospitals']);
    Route::get('/add-hospital', [adminContorller::class, 'hosform']);
    Route::post('/placeHos', [adminContorller::class, 'placeHos']);
    // get doctor profile doctor-action
    Route::get('/doctor-profile/{id}', [adminContorller::class, "doctor_profile"]);
    Route::get('/doctor-action/{id}', [adminContorller::class, "doctor_action"]);
    // block or un block doctor
    Route::get('/doctor-block/{id}', [adminContorller::class, "doctor_block"]);
    Route::get('/doctor-active/{id}', [adminContorller::class, "doctor_active"]);
    // get hospital profile hospital-action
    Route::get('/hospital-profile/{id}', [adminContorller::class, "hospital_profile"]);
    Route::get('/hospital-action/{id}', [adminContorller::class, "hospital_action"]);
    // block or un block hospital requested-doctor-profile
    Route::get('/hospital-block/{id}', [adminContorller::class, "hospital_block"]);
    Route::get('/hospital-active/{id}', [adminContorller::class, "hospital_active"]);
    Route::get('/requested-doctor-profile/{id}', [adminContorller::class, "requested_doctor_profile"]);
    Route::get('/requested-hospital-profile/{id}', [adminContorller::class, "requested_hospital_profile"]);
    Route::get('/doctor-request', [adminContorller::class, 'drequest']);
    Route::get('/hospital-request', [adminContorller::class, 'hrequest']);
});
Route::group(['middleware' => 'alogout'], function () {
    // login admin 
    Route::post('/admin/login', [adminContorller::class, "login"]);
    Route::get('/admin', function () {
        return view('admin.login');
    });
    Route::get('/admin/login', function () {
        return view('admin.login');
    });
});
// route for logout

Route::group(['middleware' => 'logout'], function () {
    Route::get("/", function () {
        return view('login');
    });
    Route::get("/sign-up", function () {
        return view('signup');
    });
});
// route for login & logout
Route::post("/login_hospital", [loginController::class, "login_h"]);
Route::post("/login_doctor", [loginController::class, "login_d"]);
Route::get("/logout", [loginController::class, "logout"]);


// route for register
Route::post("/register_doctor", [loginController::class, "register_d"]);
Route::post("/register_hospital", [loginController::class, "register_h"]);

// verify mail
Route::get('/verify/{vtype}/{vkey}', [loginController::class, "verify"]);

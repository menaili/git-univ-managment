<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SendRequestController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\RequestLevelController;
use App\Http\Controllers\RequestStatusController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);



Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/diplomes-home', function () {
    return view('admin.home_admin.home');
})->name("home2");

Route::get('/about-me',function () {

    return view('about');
})->name("about");

//Route::get('/final',function () {
//
//    return view('admin.request-view.delivred');
//})->name("sss");

Route::view('contact-me','contact',[
    'Page_name'=> 'Contact us',
    'page_des'=> 'hello evry one am haroun errachide'
])->name("contact");

//-----------------------------Veterinary------------------------------------------------------------

Route::get('/Send-request', [SendRequestController::class, 'index'])->name('send-request.index');

Route::post('/Send-request-sub', [SendRequestController::class, 'addRequest'])->name('request.sub');

Route::get('/Send-request', [SendRequestController::class, 'getLevelFaculty'])->name('get.faculty');

Route::get('/Request-veterinary-status', [RequestStatusController::class, 'getAllRequestsStatusVeterinary'])->name('get.request.veterinary');

Route::get('/Status-update/{id}', [RequestStatusController::class, 'changeStatusVeterinary'])->name('update.status.veterinary');

Route::get('/Requests-edit/{id}', [SendRequestController::class, 'getByIdVeterinary'])->name('edit.requests');

Route::get('/Requests-update', [SendRequestController::class, 'updateByIdVeterinary'])->name('update.requests');

Route::get('/Requests-delete-veterinary/{id}', [RequestLevelController::class, 'deleteByIdVeterinary'])->name('delete.requests.veterinary');

Route::get('/Request-veterinary', [RequestLevelController::class, 'getAllVeterinaryRequests'])->name('get.request.veterinary');

Route::get('/Request-veterinary-print', [\App\Http\Controllers\PrintController::class, 'getAllRequestsPrintVeterinary'])->name('print.request.veterinary');

Route::get('/Status-update-veterinary-valider/{id}', [\App\Http\Controllers\StatusValiderController::class, 'changeStatusValidate3'])->name('valider.status.bachlor');


//-----------------------------Licence------------------------------------------------------------

Route::get('/Send-request-licence', [SendRequestController::class, 'indexLicence'])->name('send-request.indexLicence');

Route::post('/Send-request-sub-licence', [SendRequestController::class, 'addRequestLicence'])->name('request.sub.licence');

Route::get('/Send-request-licence', [SendRequestController::class, 'getlicenceFaculty'])->name('get.faculty.licence');

Route::get('/Requests-edit/{id}', [SendRequestController::class, 'getByIdLicence'])->name('edit.requests.licence');

Route::get('/Requests-update-licence', [SendRequestController::class, 'updateByIdLicence'])->name('update.requests.licence');

Route::get('/Requests-delete-licence/{id}', [RequestController::class, 'deleteByIdLicence'])->name('delete.requests.licence');

Route::get('/getDomainOfBachlor/{id}', [SendRequestController::class, 'getDomainOfBachlor'])->name('get.domain.bachlor');

Route::get('/getDevisionOfBachlor/{id}', [SendRequestController::class, 'getDevisionOfBachlor'])->name('get.devision.bachlor');

Route::get('/getSpecialityOfBachlor/{id}', [SendRequestController::class, 'getSpecialityOfBachlor'])->name('get.speciality.bachlor');

Route::get('/Request-licence', [\App\Http\Controllers\RequestLevelController::class, 'getAllBachlorRequests'])->name('get.request.bachlor');

Route::get('/Requests-delete/{id}', [RequestLevelController::class, 'deleteById'])->name('delete.requests.licence');

Route::get('/Request-bachlor-status', [RequestStatusController::class, 'getAllRequestsStatusBachlor'])->name('get.request.bachlor');

Route::get('/Status-update-bachlor/{id}', [RequestStatusController::class, 'changeStatusBachlor'])->name('update.status.bachlor');

Route::get('/Status-update-bachlor-valider/{id}', [\App\Http\Controllers\StatusValiderController::class, 'changeStatusValidate'])->name('valider.status.bachlor');

Route::get('/Status-view-bachlor/{id}', [\App\Http\Controllers\ViewStatusController::class, 'ViewStatus'])->name('view.status.bachlor');

Route::get('/Request-bachelor-print', [\App\Http\Controllers\PrintController::class, 'getAllRequestsPrintBachlor'])->name('print.request.bachelor');


//-----------------------------Master------------------------------------------------------------


Route::get('/Send-request-master', [SendRequestController::class, 'indemaster'])->name('send-request.indexMaster');

Route::post('/Send-request-sub-master', [SendRequestController::class, 'addRequestMaster'])->name('request.sub.master');

Route::get('/Send-request-master', [SendRequestController::class, 'getMasterFaculty'])->name('get.faculty.master');

//Route::get('/Requests-edit/{id}', [SendRequestController::class, 'getByIdLicence'])->name('edit.requests.licence');

//Route::get('/Requests-update-licence', [SendRequestController::class, 'updateByIdLicence'])->name('update.requests.licence');

Route::get('/Requests-delete-master/{id}', [RequestLevelController::class, 'deleteByIdMaster'])->name('delete.requests.master');

Route::get('/getDomainOfBachlor/{id}', [SendRequestController::class, 'getDomainOfMaster'])->name('get.domain.master');

Route::get('/getDevisionOfBachlor/{id}', [SendRequestController::class, 'getDevisionOfMaster'])->name('get.devision.master');

Route::get('/getSpecialityOfBachlor/{id}', [SendRequestController::class, 'getSpecialityOfMaster'])->name('get.speciality.master');

Route::get('/Request-master', [\App\Http\Controllers\RequestLevelController::class, 'getAllMasterRequests'])->name('get.request.master');

Route::get('/Request-master-status', [RequestStatusController::class, 'getAllRequestsStatusMaster'])->name('get.request.master');

Route::get('/Status-update-master/{id}', [RequestStatusController::class, 'changeStatusMaster'])->name('update.status.master');

Route::get('/Status-update-master-valider/{id}', [\App\Http\Controllers\StatusValiderController::class, 'changeStatusValidate2'])->name('valider.status.master');

Route::get('/Request-master-print', [\App\Http\Controllers\PrintController::class, 'getAllRequestsPrintMaster'])->name('print.request.master');














//--------------------------------------------------------------------------------------------

Route::get('/Requests', [RequestController::class, 'getAllRequests'])->name('get.requests');

Route::get('/Requests-status', [RequestController::class, 'getAllRequestsStatus'])->name('get.status');



Route::get('/Login', [LoginController::class, 'index'])->name('login.index');

Route::post('/Login', [LoginController::class, 'login_submit'])->name('login.submit');

//------------FACULTY---------------------------------------------------------------------------------------------

Route::get('/Add-faculty', [DepartementController::class, 'index'])->name('Add-faculty.index');

Route::post('/Add-faculty-sub', [DepartementController::class, 'addFaculty'])->name('faculty.sub');

Route::get('/getFaculties', [DepartementController::class, 'getAllFaculties'])->name('faculty.index');

//------------DOMAIN---------------------------------------------------------------------------------------------

Route::get('/Add-domain', [DepartementController::class, 'domain'])->name('Add-domain.index');

Route::post('/Add-domain-sub', [DepartementController::class, 'addDomain'])->name('domain.sub');

Route::get('/Add-domain', [DepartementController::class, 'getFacultyOfDomain'])->name('get.faculty.domain');

Route::get('/getDomains', [DepartementController::class, 'getAllDomains'])->name('domain.index');

//------------DEVISION---------------------------------------------------------------------------------------------

//Route::get('/Add-devision', [DepartementController::class, 'devision'])->name('Add-devision.index');

Route::post('/Add-devision-sub', [DepartementController::class, 'addDevision'])->name('devision.sub');

Route::get('/Add-devision', [DepartementController::class, 'getFacultyOfDevision'])->name('get.faculty.devision');

Route::get('/getDomainOfDevision/{id}', [DepartementController::class, 'getDomainOfDevision'])->name('get.domain.devision');

Route::get('/getDivisions', [DepartementController::class, 'getAllDivision'])->name('division.index');

//------------SPECIALITY---------------------------------------------------------------------------------------------

Route::post('/Add-speciality-sub', [DepartementController::class, 'addSpeciality'])->name('speciality.sub');

Route::get('/Add-speciality', [DepartementController::class, 'getFacultyOfSpeciality'])->name('get.faculty.speciality');

Route::get('/getDomainOfSpeciality/{id}', [DepartementController::class, 'getDomainOfSpeciality'])->name('get.domain.Speciality');

Route::get('/getDevisionOfSpeciality/{id}', [DepartementController::class, 'getDevisionOfSpeciality'])->name('get.devision.Speciality');

Route::get('/getSpecialities', [DepartementController::class, 'getAllSpeciality'])->name('speciality.index');




Route::get('/getPDF', [\App\Http\Controllers\PrintController::class, 'getPDF'])->name('get.pdf');

Route::get('/printPDF/{id}', [\App\Http\Controllers\PrintController::class, 'printPDF'])->name('print.pdf');

Route::get('/printPDFmaster/{id}', [\App\Http\Controllers\PrintController::class, 'printPDFmaster'])->name('master.print.pdf');




















Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class SendRequestController extends Controller
{
    public function index($name = null){
        return view('pages.send-request');
    }

    // public function getAlllevel(){
    //     $level = DB::table('level')->get();
    //     return view('pages.send-request',compact('level'));
    // }

    public function addRequest(Request $request){

        $validated = Validator::make($request->all(),
            [
                'firstname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'lastname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'firstname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'lastname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'dateOfBirth' => ['before:18 years ago'],
                'diplomanumber' => 'required|unique:request_bachlor,bachlor_diploma_number|numeric',
                'faculty' => 'required',


            ]);
        if($validated -> fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }
//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('request_veterinary')->insert([

            'veterinary_student_first_name' => $request->firstname,
            'veterinary_student_last_name' => $request->lastname,
            'veterinary_student_birthday' => $request->dateOfBirth,
            'veterinary_diploma_number' => $request->diplomanumber,
            'veterinary_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'veterinary_note' => $request->note,
            'willaya' => $request->Willaya,
            'veterinary_status_date' => Carbon::now()->toDateTimeString(),


        ]);
        return back()->with('request_sent', 'request sent successfully!');
    }



    public function getByIdVeterinary($id){

        $requests = DB::table('request_veterinary')->where('request_veterinary_id',$id)->first();
        return view('admin.edit-request',compact('requests'));

    }


    public function updateByIdVeterinary($request){



        date_default_timezone_set('Africa/Algiers');
        DB::table('requests')->where('requests_id',$request->id)->update([
            'veterinary_student_first_name' => $request->firstname,
            'veterinary_student_last_name' => $request->lastname,
            'veterinary_student_birthday' => $request->dateOfBirth,
            'veterinary_diploma_number' => $request->diplomanumber,
            'veterinary_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'veterinary_note' => $request->note,
            'veterinary_status_date' => Carbon::now()->toDateTimeString(),
            ]);
        return back()->with('request_updated', 'request updated successfully!');


    }


    public function getLevelFaculty(){
        $faculties = DB::table('faculty')->get();
        $willaya = DB::table('willaya')->get();


        return View('admin.send-request')->with(compact('faculties','willaya'));

    }




//    ------------------------------------Licence---------------------------------------------------

    public function indexLicence($name = null){
        return view('admin.send-request-licence');
    }

    // public function getAlllevel(){
    //     $level = DB::table('level')->get();
    //     return view('pages.send-request',compact('level'));
    // }

    public function addRequestLicence(Request $request){

        $validated = Validator::make($request->all(),
        [
            'firstname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
            'lastname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
            'firstname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
            'lastname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
            'dateOfBirth' => ['before:19 years ago'],
            'diplomanumber' => 'required|unique:request_veterinary,veterinary_diploma_number|numeric',
            'faculty' => 'required',
            'domain' => 'required',
            'devision' => 'required',
            'speciality' => 'required',


        ]);
        if($validated -> fails()){
           return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

        date_default_timezone_set('Africa/Algiers');
        DB::table('request_bachlor')->insert([

            'bachlor_student_first_name' => $request->firstname,
            'bachlor_student_last_name' => $request->lastname,
            'bachlor_student_first_name_ar' => $request->firstname_ar,
            'bachlor_student_last_name_ar' => $request->lastname_ar,
            'bachlor_student_birthday' => $request->dateOfBirth,
            'bachlor_diploma_number' => $request->diplomanumber,
            'bachlor_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'bachlor_domain' => $request->domain,
            'bachlor_division' => $request->devision,
            'bachlor_speciality' => $request->speciality,
            'willaya' => $request->Willaya,
            'bachlor_status_date' => Carbon::now()->toDateTimeString(),


        ]);

//        date_default_timezone_set('Africa/Algiers');
//        DB::table('bachlor_status')->insert([
//            'request_bachlor_id' => $id,
//            'bachlor_status_date' => Carbon::now()->toDateTimeString(),
//            'bachlor_status_code' => 'Demandé',
//
//        ]);
        return back()->with('request_sent', 'request sent successfully!');
    }



    public function getByIdLicence($id){

        $requests = DB::table('request_bachlor')->where('request_bachlor_id',$id)
        ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')
            ->join('willaya', 'willaya.id', '=', 'request_bachlor.willaya')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*','willaya.*')
            ->where('request_bachlor_id',$id)
            ->first();
        $faculty = DB::table('faculty');
        return view('admin.edit-request',compact('requests','faculty'));

    }


    public function updateByIdLicence($request,$id){


        $validated = Validator::make($request->all(),
            [
                'firstname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'lastname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'firstname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'lastname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'dateOfBirth' => ['before:19 years ago'],
                'diplomanumber' => 'required|unique:request_veterinary,veterinary_diploma_number|numeric',
                'faculty' => 'required',
                'domain' => 'required',
                'devision' => 'required',
                'speciality' => 'required',


            ]);
        if($validated -> fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

        $requests =  DB::table('request_bachlor')->find($id);
        date_default_timezone_set('Africa/Algiers');
        $requests->update([

            'bachlor_student_first_name' => $request->firstname,
            'bachlor_student_last_name' => $request->lastname,
            'bachlor_student_first_name_ar' => $request->firstname_ar,
            'bachlor_student_last_name_ar' => $request->lastname_ar,
            'bachlor_student_birthday' => $request->dateOfBirth,
            'bachlor_diploma_number' => $request->diplomanumber,
            'bachlor_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'bachlor_domain' => $request->domain,
            'bachlor_division' => $request->devision,
            'bachlor_speciality' => $request->speciality,
            'willaya' => $request->Willaya,
            'bachlor_status_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('request_updated', 'request updated successfully!');


    }


    public function getlicenceFaculty(){
        $faculties = DB::table('faculty')->get();
        $willaya = DB::table('willaya')->get();

        return View('admin.send-request-licence')->with(compact('faculties','willaya'));

    }


    public function getDomainOfBachlor($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }

    public function getDevisionOfBachlor($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('division')->where('division.domain_id',$id)->get();

    }

    public function getSpecialityOfBachlor($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('speciality')->where('speciality.division_id',$id)->get();

    }


//----edit-licence----


    public function getLevelFacultylicence(){
        $faculties = DB::table('faculty')->get();

        return View('admin.edit-request')->with(compact('faculties'));

    }





//----------------------MASTER-------------------------------------------

    public function indexMaster($name = null){
        return view('admin.send-request-master');
    }


    public function addRequestMaster(Request $request){

        $validated = Validator::make($request->all(),
            [
                'firstname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'lastname' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'firstname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'lastname_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'dateOfBirth' => ['before:18 years ago'],
                'diplomanumber' => 'required|unique:request_master,master_diploma_number|numeric',
                'faculty' => 'required',
                'domain' => 'required',
                'devision' => 'required',
                'speciality' => 'required',

            ]);
        if($validated -> fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }


//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('request_master')->insert([

            'master_student_first_name' => $request->firstname,
            'master_student_last_name' => $request->lastname,
            'master_student_first_name_ar' => $request->firstname_ar,
            'master_student_last_name_ar' => $request->lastname_ar,
            'master_student_birthday' => $request->dateOfBirth,
            'master_diploma_number' => $request->diplomanumber,
            'master_diploma_date' => $request->dateOfDiploma,
            'faculty_id' => $request->faculty,
            'master_domain' => $request->domain,
            'master_division' => $request->devision,
            'master_speciality' => $request->speciality,
            'master_status_date' => Carbon::now()->toDateTimeString(),
            'willaya' => $request->Willaya,



        ]);
        return back()->with('request_sent', 'request sent successfully!');
    }


    public function getMasterFaculty(){
        $faculties = DB::table('faculty')->get();
        $willaya = DB::table('willaya')->get();

        return View('admin.send-request-master')->with(compact('faculties','willaya'));

    }


    public function getDomainOfMaster($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }

    public function getDevisionOfMaster($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('division')->where('division.domain_id',$id)->get();

    }

    public function getSpecialityOfMaster($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('speciality')->where('speciality.division_id',$id)->get();

    }

}

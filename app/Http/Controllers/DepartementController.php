<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DepartementController extends Controller
{


    public function index($name = null){
        return view('admin.depertement.add-faculty');
    }

    public function addFaculty(Request $request){

        $validated = Validator::make($request->all(),
            [
                'faculty_name' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'faculty_name_ar' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',

            ]);
        if($validated -> fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }


//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('faculty')->insert([

            'faculty_code' => $request->faculty_name,
            'faculty_code_ar' => $request->faculty_name_ar,
            'faculty_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('faculty_added', 'la faculté a été ajoutée avec succès!');
    }


    public function getAllFaculties(){
        $faculties = DB::table('faculty')->get();


        return view('admin.depertement.faculties',compact('faculties'));
    }











//-----------------------DOMAIN----------------------------

    public function domain($name = null){
        return view('admin.depertement.add-domain');
    }

    public function addDomain(Request $request){

        $validated = Validator::make($request->all(),
            [
                'domain_name_fr' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'domain_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'faculty' => 'required',

            ]);
        if($validated -> fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('domain')->insert([

            'domain_code' => $request->domain_name,
            'domain_code_fr' => $request->domain_name_fr,
            'faculty_id' => $request->faculty,
            'domain_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('domain_added', 'le domaine a été ajouté avec succès!');
    }



    public function getFacultyOfDomain(){
        $faculties = DB::table('faculty')->get();

        return View('admin.depertement.add-domain')->with(compact('faculties'));

    }



    public function getAllDomains(){
        $domains = DB::table('domain')
          ->join('faculty' , 'domain.faculty_id', '=','faculty.faculty_id')
             ->select('faculty.*','domain.*')
              ->get();


        return view('admin.depertement.domain',compact('domains'));
    }






//------------------------------DEVISION-------------------------------------------

    public function devision($name = null){
        return view('admin.depertement.add-devision');
    }

    public function addDevision(Request $request){

        $validated = Validator::make($request->all(),
            [
                'devision_name_fr' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'devision_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'domain' => 'required',

            ]);
        if($validated -> fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('division')->insert([
            'domain_id' => $request->domain,
            'division_code_fr' => $request->devision_name_fr,
            'division_code' => $request->devision_name,
            'division_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('devision_added', 'filière a été ajouté avec succès!');
    }


    public function getFacultyOfDevision(){
        $faculties = DB::table('faculty')->get();
        return View('admin.depertement.add-devision')->with(compact('faculties'));

    }

    public function getDomainOfDevision($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }

    public function getAllDivision(){
        $divisions = DB::table('division')
            ->join('domain' , 'division.domain_id', '=','domain.domain_id')
            ->select('division.*','domain.*')
            ->get();


        return view('admin.depertement.division',compact('divisions'));
    }











//------------------------------SPECIALITY-------------------------------------------

    public function speciality($name = null){
        return view('admin.depertement.add-speciality');
    }

    public function addSpeciality(Request $request){

        $validated = Validator::make($request->all(),
            [
//                'devision_name_fr' => 'required|regex:/^[a-zA-Z\s]*$/|min:3|max:255',
                'speciality_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u|min:3|max:255',
                'devision' => 'required',

            ]);
        if($validated -> fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }

//        $request -> all();
//        DB::table('requests')->insert($request -> all());
        date_default_timezone_set('Africa/Algiers');
        DB::table('speciality')->insert([
            'division_id' => $request->devision,
            'speciality_code' => $request->speciality_name,
            'speciality_creation_date' => Carbon::now()->toDateTimeString(),

        ]);
        return back()->with('speciality_added', 'speciality has been added successfully!');
    }

    public function getFacultyOfSpeciality(){
        $faculties = DB::table('faculty')->get();
        return View('admin.depertement.add-speciality')->with(compact('faculties'));

    }


    public function getDomainOfSpeciality($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('domain')->where('domain.faculty_id',$id)->get();

    }

    public function getDevisionOfSpeciality($id){

//      echo json_encode(DB::table('domain')->where('domain.faculty_id',$id)->get());
//        dd($id,DB::table('domain')->where('domain.faculty_id',$id)->toSql(),DB::table('domain')->where('domain.faculty_id',$id)->get());
        return DB::table('division')->where('division.domain_id',$id)->get();

    }

    public function getAllSpeciality(){
        $specialities = DB::table('speciality')
            ->join('division' , 'division.division_id', '=','speciality.division_id')
            ->select('division.*','speciality.*')
            ->get();


        return view('admin.depertement.speciality',compact('specialities'));
    }









}





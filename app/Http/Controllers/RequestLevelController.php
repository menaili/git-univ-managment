<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestLevelController extends Controller
{
    public function getAllBachlorRequests(){
        $requests = DB::table('request_bachlor')
        ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
            ->get();


        return view('admin.request-view.licence-request',compact('requests'));
    }



    public function getAllRequestsStatus(){
        $requests = DB::table('request_bachlor')->get();

        $faculty = DB::table('faculty')
            ->join('request_bachlor','faculty.faculty_id','=','request_bachlor.faculty_id')
            ->select('faculty.faculty_code')
            ->get();



        return view('admin.request-view.licence-request',compact('requests','faculty'));
    }


    public function deleteById($id){
        DB::table('bachlor_status')->where('bachlor_status.request_bachlor_id',$id)->delete();

        DB::table('request_bachlor')->where('request_bachlor_id',$id)->delete();
        return back()->with('request_deleted', 'request deleted successfully!');


    }

//    public function changeStatus($id){
//
//        $req = DB::table('requests')->where('requests_id',$id)->first();
//
//        if ($req->request_status == 'Demandé'){
//
//            DB::table('requests')->where('requests_id',$id)->update([
//                'request_status' => 'Consulté',
//            ]);
//
//            date_default_timezone_set('Africa/Algiers');
//            DB::table('requests_status')->insert([
//                'requests_id' => $id,
//                'requests_status_date' => Carbon::now()->toDateTimeString(),
//                'requests_status_code' => 'Consulté',
//
//            ]);
//
//            return back()->with('status_updated', 'status updated successfully!');
//        }
//        if ($req->request_status == 'Consulté'){
//
//            DB::table('requests')->where('requests_id',$id)->update([
//                'request_status' => 'doyen',
//            ]);
//
//            date_default_timezone_set('Africa/Algiers');
//            DB::table('requests_status')->insert([
//                'requests_id' => $id,
//                'requests_status_date' => Carbon::now()->toDateTimeString(),
//                'requests_status_code' => 'doyen',
//
//            ]);
//
//            return back()->with('status_updated', 'status updated successfully!');
//        }
//
//
//
//
//    }









//----------------VETERINARY---------------------------------------------------------------



    public function getAllVeterinaryRequests(){
        $requests = DB::table('request_veterinary')
            ->join('faculty', 'request_veterinary.faculty_id', '=', 'faculty.faculty_id')


            ->select('request_veterinary.*','faculty.*')
            ->get();


        return view('admin.request-view.veterinary-request',compact('requests'));
    }



//    public function getAllRequestsStatus(){
//        $requests = DB::table('request_bachlor')->get();
//
//        $faculty = DB::table('faculty')
//            ->join('request_bachlor','faculty.faculty_id','=','request_bachlor.faculty_id')
//            ->select('faculty.faculty_code')
//            ->get();
//
//
//
//        return view('admin.request-view.licence-request',compact('requests','faculty'));
//    }


    public function deleteByIdVeterinary($id){

        DB::table('request_veterinary')->where('request_veterinary_id',$id)->delete();
        return back()->with('request_deleted', 'request deleted successfully!');


    }

//    public function changeStatus($id){
//
//        $req = DB::table('requests')->where('requests_id',$id)->first();
//
//        if ($req->request_status == 'Demandé'){
//
//            DB::table('requests')->where('requests_id',$id)->update([
//                'request_status' => 'Consulté',
//            ]);
//
//            date_default_timezone_set('Africa/Algiers');
//            DB::table('requests_status')->insert([
//                'requests_id' => $id,
//                'requests_status_date' => Carbon::now()->toDateTimeString(),
//                'requests_status_code' => 'Consulté',
//
//            ]);
//
//            return back()->with('status_updated', 'status updated successfully!');
//        }
//        if ($req->request_status == 'Consulté'){
//
//            DB::table('requests')->where('requests_id',$id)->update([
//                'request_status' => 'doyen',
//            ]);
//
//            date_default_timezone_set('Africa/Algiers');
//            DB::table('requests_status')->insert([
//                'requests_id' => $id,
//                'requests_status_date' => Carbon::now()->toDateTimeString(),
//                'requests_status_code' => 'doyen',
//
//            ]);
//
//            return back()->with('status_updated', 'status updated successfully!');
//        }
//
//
//
//
//    }



//-------------------MASTER-------------------------------------------

    public function getAllMasterRequests(){
        $requests = DB::table('request_master')
            ->join('faculty', 'request_master.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_master.master_domain')
            ->join('division', 'division.division_id', '=', 'request_master.master_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_master.master_speciality')

            ->select('request_master.*','faculty.*','domain.*','division.*','speciality.*')
            ->get();


        return view('admin.request-view.master-request',compact('requests'));
    }
    public function deleteByIdMaster($id){

        DB::table('request_master')->where('request_master_id',$id)->delete();
        return back()->with('request_deleted', 'request deleted successfully!');


    }






}

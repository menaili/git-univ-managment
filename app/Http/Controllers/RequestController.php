<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Reques;

use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function getAllRequests(){
        $requests = DB::table('requests')->get();

        $faculty = DB::table('faculty')
            ->join('requests','faculty.faculty_id','=','requests.faculty_id')
            ->select('faculty.faculty_code')
            ->get();

        $level = DB::table('level')
            ->join('requests','level.level_id','=','requests.level_id')
            ->select('level.level_code')
            ->get();

        return view('admin.requests',compact('requests','faculty','level'));
    }



    public function getAllRequestsStatus(){
        $requests = DB::table('requests')->get();

        $faculty = DB::table('faculty')
            ->join('requests','faculty.faculty_id','=','requests.faculty_id')
            ->select('faculty.faculty_code')
            ->get();

        $level = DB::table('level')
            ->join('requests','level.level_id','=','requests.level_id')
            ->select('level.level_code')
            ->get();

        return view('admin.request-status',compact('requests','faculty','level'));
    }


    public function deleteById($id){

        DB::table('requests')->where('requests_id',$id)->delete();
        return back()->with('request_deleted', 'request deleted successfully!');


    }

    public function changeStatus($id){

        $req = DB::table('requests')->where('requests_id',$id)->first();

        if ($req->request_status == 'Demandé'){

        DB::table('requests')->where('requests_id',$id)->update([
            'request_status' => 'Consulté',
        ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('requests_status')->insert([
                'requests_id' => $id,
                'requests_status_date' => Carbon::now()->toDateTimeString(),
                'requests_status_code' => 'Consulté',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        if ($req->request_status == 'Consulté'){

            DB::table('requests')->where('requests_id',$id)->update([
                'request_status' => 'doyen',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('requests_status')->insert([
                'requests_id' => $id,
                'requests_status_date' => Carbon::now()->toDateTimeString(),
                'requests_status_code' => 'doyen',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }




    }




}

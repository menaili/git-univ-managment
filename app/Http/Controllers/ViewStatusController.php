<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewStatusController extends Controller
{
    public function ViewStatus($id)
    {

        $view = DB::table('bachlor_status')
            ->where('bachlor_status.request_bachlor_id', $id)
        ->get();


        return view('admin.status.view-bachlor-status',compact('view'));

    }
}

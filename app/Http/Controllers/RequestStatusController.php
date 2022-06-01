<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDFC;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;
use Response;




class RequestStatusController extends Controller
{

//------------VETERENARY---------------------------------------------------------


    public function getAllRequestsStatusVeterinary(){
        $requests = DB::table('request_veterinary')
            ->join('faculty', 'request_veterinary.faculty_id', '=', 'faculty.faculty_id')


            ->select('request_veterinary.*','faculty.*')
            ->get();



        return view('admin.status.veterinary',compact('requests'));
    }


    public function changeStatusVeterinary($id){

        $reqs= DB::table('veterinary_status')->where('veterinary_status.request_veterinary_id',$id)->first();

        $req = DB::table('request_veterinary')->where('request_veterinary_id',$id)->first();

        if ($req->veterinary_status == 'Demandé'){

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Consulté',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Consulté',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        elseif ($req->veterinary_status == 'Consulté' && $reqs->veterinary_status_valider == 'valider'){


            DB::table('veterinary_status')->where('veterinary_status.request_veterinary_id',$id)->update([
                'veterinary_status_valider' => '',
            ]);

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Signature doyen',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Signature doyen',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        elseif ($req->veterinary_status == 'Signature doyen' && $reqs->veterinary_status_valider == 'valider'){


            DB::table('veterinary_status')->where('veterinary_status.request_veterinary_id',$id)->update([
                'veterinary_status_valider' => '',
            ]);

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Signature directeur',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Signature directeur',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        elseif ($req->veterinary_status == 'Signature directeur' && $reqs->veterinary_status_valider == 'valider'){


            DB::table('veterinary_status')->where('veterinary_status.request_veterinary_id',$id)->update([
                'veterinary_status_valider' => '',
            ]);

            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Enregistrement',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Enregistrement',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        elseif ($req->veterinary_status == 'Enregistrement' && $reqs->veterinary_status_valider == 'valider'){


            DB::table('veterinary_status')->where('veterinary_status.request_veterinary_id',$id)->update([
                'veterinary_status_valider' => '',
            ]);
            DB::table('request_veterinary')->where('request_veterinary_id',$id)->update([
                'veterinary_status' => 'Validé',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('veterinary_status')->insert([
                'request_veterinary_id' => $id,
                'veterinary_status_date' => Carbon::now()->toDateTimeString(),
                'veterinary_status_code' => 'Validé',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        elseif ($req->veterinary_status == 'Validé'){

            $requests_veterinary = DB::table('request_bachlor')

                ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
                ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
                ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
                ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

                ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
                ->where('request_bachlor_id',$id)
                ->get();
            $pdf = PDF::loadView('admin.request-view.delivred-veterinary',compact('requests_veterinary'));

            return $pdf->download('request-veterinary.pdf');

        }
        else{
            return back()->with('status_updated_not', 'status non valider!');
        }




    }


//-------------------BACHLOR-----------------------------------------------------------



    public function getAllRequestsStatusBachlor(){
        $requests = DB::table('request_bachlor')

            ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
            ->get();



        return view('admin.status.bachlor',compact('requests'));
    }


    public function changeStatusBachlor($id){

        $req = DB::table('request_bachlor')->where('request_bachlor_id',$id)->first();
        $reqs = DB::table('bachlor_status')->where('bachlor_status.request_bachlor_id',$id)->first();

        if ($req->bachlor_status == 'Demandé' ){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Consulté',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Consulté',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        elseif ($req->bachlor_status == 'Consulté' && $reqs->bachlor_status_valider == 'valider'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Signature doyen',
            ]);

            DB::table('bachlor_status')->where('bachlor_status.request_bachlor_id',$id)->update([
                'bachlor_status_valider' => '',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Signature doyen',

            ]);

            return back()->with('status_updated', 'status updated successfully!');


        }

        elseif ($req->bachlor_status == 'Signature doyen' && $reqs->bachlor_status_valider == 'valider'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Signature directeur',
            ]);

            DB::table('bachlor_status')->where('bachlor_status.request_bachlor_id',$id)->update([
                'bachlor_status_valider' => '',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Signature directeur',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }


        elseif ($req->bachlor_status == 'Signature directeur' && $reqs->bachlor_status_valider == 'valider'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Enregistrement',
            ]);

            DB::table('bachlor_status')->where('bachlor_status.request_bachlor_id',$id)->update([
                'bachlor_status_valider' => '',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Enregistrement',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }


        elseif ($req->bachlor_status == 'Enregistrement' && $reqs->bachlor_status_valider == 'valider'){

            DB::table('request_bachlor')->where('request_bachlor_id',$id)->update([
                'bachlor_status' => 'Validé',
            ]);

            DB::table('bachlor_status')->where('bachlor_status.request_bachlor_id',$id)->update([
                'bachlor_status_valider' => '',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('bachlor_status')->insert([
                'request_bachlor_id' => $id,
                'bachlor_status_date' => Carbon::now()->toDateTimeString(),
                'bachlor_status_code' => 'Validé',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        elseif ($req->bachlor_status == 'Validé'){
            date_default_timezone_set('Africa/Algiers');
            DB::table('print_bachlor')->insert([
                'request_bachlor_id' => $id,

                'status' => 'en attendant',

            ]);

            return back()->with('status_updated', 'status est valider!');


//            $requests = DB::table('request_bachlor')
//
//                ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
//                ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
//                ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
//                ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')
//
//                ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
//                ->where('request_bachlor_id',$id)
//                ->get();
//
//            $pdf = Pdf::loadView('delivred',compact('requests'),[],'UTF-8')
//            ->setPaper('a4','landscape');
//
//            return $pdf->download('request-veterinary.pdf');
//
//            $pdf = PDF::loadView('delivred',compact('requests'));
//            return $pdf->download('Licence.pdf');


//            $request = $requests->first();
//            $pdf = new TCPDF('landscape', PDF_UNIT, 'A4', true, 'UTF-8', true);
//


//            $html = '
//            <h1>hello<h1>
//            ';
//
//// output the HTML content
////            $pdf->writeHTML($html, true, 0, true, 0);
//          //  $view = \View::make('delivred',compact('requests'));
//        //    $html = $view->render();
//            $pdf->SetFont('aealarabiya','', 18);
//            $pdf->SetTitle('Hello World');
//            $pdf->Text(0,0,$request->bachlor_student_last_name_ar);
//            $pdf->AddPage();
//           $pdf->WriteHTML($html, '', 0, 'L', true, 0);
//            $pdf->Output('Licence.pdf');
//


//
//            $domPdfPath = base_path( 'vendor/dompdf/dompdf');
//            Settings::setPdfRendererPath($domPdfPath);
//            Settings::setPdfRendererName('DomPDF');
//
//            $request = $requests->first();
//
//
//
//            $file = "licence.docx";
//            $tmpFile = "licence-output.pdf";
//            $outfile = "licence-output.docx";
//
//            $template = new TemplateProcessor($file);
//            $template->setValue('LAST_NAME',$request->bachlor_student_last_name_ar);
//            $template->setValue('FIRST_NAME',$request->bachlor_student_first_name_ar);
//
//            $template->setValue('BIRTHDAY',$request->bachlor_student_birthday);
//            $template->setValue('DOMAIN',$request->domain_code);
//            $template->setValue('FILLIERE',$request->division_code);
//            $template->setValue('SPECIALITY',$request->speciality_code);
//
//            $template->saveAs($outfile);
//
//            $phpWord = IOFactory::load($outfile);
//            $phpWord->save($tmpFile,'PDF');
//
//            return  response()->download($outfile);

        }
        else{
            return back()->with('status_updated_not', 'status non valider!');
        }


    }






//-------------------MASTER-----------------------------------------------------------


    public function getAllRequestsStatusMaster(){
        $requests = DB::table('request_master')
        ->join('faculty', 'request_master.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_master.master_domain')
            ->join('division', 'division.division_id', '=', 'request_master.master_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_master.master_speciality')

            ->select('request_master.*','faculty.*','domain.*','division.*','speciality.*')
            ->get();



        return view('admin.status.master',compact('requests'));
    }


    public function changeStatusMaster($id){

        $req = DB::table('request_master')->where('request_master_id',$id)->first();
        $reqs = DB::table('master_status')->where('master_status.request_master_id',$id)->first();


        if ($req->master_status == 'Demandé'){

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Consulté',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Consulté',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        elseif ($req->master_status == 'Consulté' && $reqs->master_status_valider == 'valider'){


            DB::table('master_status')->where('master_status.request_master_id',$id)->update([
                'master_status_valider' => '',
            ]);

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Signature doyen',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Signature doyen',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        elseif ($req->master_status == 'Signature doyen'&& $reqs->master_status_valider == 'valider'){


            DB::table('master_status')->where('master_status.request_master_id',$id)->update([
                'master_status_valider' => '',
            ]);

            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Signature directeur',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Signature directeur',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        elseif ($req->master_status == 'Signature directeur' && $reqs->master_status_valider == 'valider'){


            DB::table('master_status')->where('master_status.request_master_id',$id)->update([
                'master_status_valider' => '',
            ]);
            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Enregistrement',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Enregistrement',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }

        elseif ($req->master_status == 'Enregistrement' && $reqs->master_status_valider == 'valider'){


            DB::table('master_status')->where('master_status.request_master_id',$id)->update([
                'master_status_valider' => '',
            ]);
            DB::table('request_master')->where('request_master_id',$id)->update([
                'master_status' => 'Validé',
            ]);

            date_default_timezone_set('Africa/Algiers');
            DB::table('master_status')->insert([
                'request_master_id' => $id,
                'master_status_date' => Carbon::now()->toDateTimeString(),
                'master_status_code' => 'Validé',

            ]);

            return back()->with('status_updated', 'status updated successfully!');
        }
        elseif ($req->master_status == 'Validé'){

            date_default_timezone_set('Africa/Algiers');
            DB::table('print_master')->insert([
                'request_master_id' => $id,

                'status' => 'en attendant',

            ]);

            return back()->with('status_updated', 'status est valider!');

        }
        else{
            return back()->with('status_updated_not', 'status non valider!');
        }


    }







}

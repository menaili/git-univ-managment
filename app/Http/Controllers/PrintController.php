<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class PrintController extends Controller
{
    public function getPDF(){
        $requests = DB::table('request_bachlor')

            ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*')
            ->where('request_bachlor_id',9)
            ->get();

        return view('delivred',compact('requests'));
    }


//---------------VETERINARY--------------------------------------------

    public function getAllRequestsPrintVeterinary(){
        $requests = DB::table('request_veterinary')
            ->join('faculty', 'request_veterinary.faculty_id', '=', 'faculty.faculty_id')
            ->join('faculty', 'request_veterinary.faculty_id', '=', 'faculty.faculty_id')

            ->select('request_veterinary.*','faculty.*')
            ->get();



        return view('admin.status.veterinary',compact('requests'));
    }

//    ------------BACHELOR-----------------------

    public function getAllRequestsPrintBachlor(){
        $requests = DB::table('request_bachlor')

            ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')
            ->join('willaya', 'willaya.id', '=', 'request_bachlor.willaya')
            ->join('print_bachlor', 'print_bachlor.request_bachlor_id', '=', 'request_bachlor.request_bachlor_id')


            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*','print_bachlor.*','willaya.*')
            ->get();



        return view('admin.print.licence-print',compact('requests'));
    }

//    ------------------------MASTER---------------------------------

    public function getAllRequestsPrintMaster(){
        $requests = DB::table('request_master')

            ->join('faculty', 'request_master.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_master.master_domain')
            ->join('division', 'division.division_id', '=', 'request_master.master_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_master.master_speciality')
            ->join('willaya', 'willaya.id', '=', 'request_master.willaya')
            ->join('print_master', 'print_master.request_master_id', '=', 'request_master.request_master_id')


            ->select('request_master.*','faculty.*','domain.*','division.*','speciality.*','print_master.*','willaya.*')
            ->get();



        return view('admin.print.master-print',compact('requests'));
    }






















    public function printPDF($id){

        DB::table('print_bachlor')->where('print_bachlor.request_bachlor_id',$id)->update([
            'status' => 'Imprimé',
        ]);

        $requests = DB::table('request_bachlor')

            ->join('faculty', 'request_bachlor.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_bachlor.bachlor_domain')
            ->join('division', 'division.division_id', '=', 'request_bachlor.bachlor_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_bachlor.bachlor_speciality')
            ->join('willaya', 'willaya.id', '=', 'request_bachlor.willaya')

            ->select('request_bachlor.*','faculty.*','domain.*','division.*','speciality.*','willaya.*')
            ->where('request_bachlor_id',$id)
            ->get();

//        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('delivred',compact('requests'),[],'UTF-8')
//            ->setPaper('a4','landscape');
//
//        return $pdf->download('request-veterinary.pdf');

//            $pdf = PDF::loadView('delivred',compact('requests'));
//            return $pdf->download('Licence.pdf');
//
//
//            $request = $requests->first();
//            $pdf = new TCPDF('landscape', PDF_UNIT, 'A4', true, 'UTF-8', true);



//            $html = '
//            <h1>hello<h1>
//            ';

// output the HTML content
//            $pdf->writeHTML($html, true, 0, true, 0);
          //  $view = \View::make('delivred',compact('requests'));
        //    $html = $view->render();
//            $pdf->SetFont('aealarabiya','', 18);
//            $pdf->SetTitle('Hello World');
//            $pdf->Text(0,0,$request->bachlor_student_last_name_ar);
//            $pdf->AddPage();
//           $pdf->WriteHTML($html, '', 0, 'L', true, 0);
//            $pdf->Output('Licence.pdf');




            $domPdfPath = base_path( 'vendor/dompdf/dompdf');
            Settings::setPdfRendererPath($domPdfPath);
            Settings::setPdfRendererName('DomPDF');

            $request = $requests->first();



            $file = "licence.docx";
            $tmpFile = "licence-output.pdf";
            $outfile = "licence-output.docx";

            $template = new TemplateProcessor($file);
            $template->setValue('LAST_NAME',$request->bachlor_student_last_name_ar);
            $template->setValue('FIRST_NAME',$request->bachlor_student_first_name_ar);

        $template->setValue('LAST_NAM',$request->bachlor_student_last_name);
        $template->setValue('FIRST_NAM',$request->bachlor_student_first_name);

            $template->setValue('BIRTHDAY',$request->bachlor_student_birthday);

            $template->setValue('DOMAIN_AR',$request->domain_code);
            $template->setValue('FILLIERE_AR',$request->division_code);
            $template->setValue('SPECIALITY_AR',$request->speciality_code);

        $template->setValue('DOMAIN',$request->domain_code_fr);
        $template->setValue('FILLIERE',$request->division_code_fr);
        $template->setValue('SPECIALITY',$request->speciality_code_fr);

        $template->setValue('WILLAYA',$request->willaya_code);
        $template->setValue('WILLAYA_FR',$request->willaya_code_fr);



        $template->saveAs($outfile);

            $phpWord = IOFactory::load($outfile);
            $phpWord->save($tmpFile,'PDF');

            return  response()->download($outfile);


    }



    public function printPDFmaster($id){

        DB::table('print_master')->where('print_master.request_master_id',$id)->update([
            'status' => 'Imprimé',
        ]);

        $requests = DB::table('request_master')

            ->join('faculty', 'request_master.faculty_id', '=', 'faculty.faculty_id')
            ->join('domain', 'domain.domain_id', '=', 'request_master.master_domain')
            ->join('division', 'division.division_id', '=', 'request_master.master_division')
            ->join('speciality', 'speciality.speciality_id', '=', 'request_master.master_speciality')
            ->join('willaya', 'willaya.id', '=', 'request_master.willaya')

            ->select('request_master.*','faculty.*','domain.*','division.*','speciality.*','willaya.*')
            ->where('request_master_id',$id)
            ->get();

//        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('delivred',compact('requests'),[],'UTF-8')
//            ->setPaper('a4','landscape');
//
//        return $pdf->download('request-veterinary.pdf');

//            $pdf = PDF::loadView('delivred',compact('requests'));
//            return $pdf->download('Licence.pdf');
//
//
//            $request = $requests->first();
//            $pdf = new TCPDF('landscape', PDF_UNIT, 'A4', true, 'UTF-8', true);



//            $html = '
//            <h1>hello<h1>
//            ';

// output the HTML content
//            $pdf->writeHTML($html, true, 0, true, 0);
        //  $view = \View::make('delivred',compact('requests'));
        //    $html = $view->render();
//            $pdf->SetFont('aealarabiya','', 18);
//            $pdf->SetTitle('Hello World');
//            $pdf->Text(0,0,$request->master_student_last_name_ar);
//            $pdf->AddPage();
//           $pdf->WriteHTML($html, '', 0, 'L', true, 0);
//            $pdf->Output('Licence.pdf');




        $domPdfPath = base_path( 'vendor/dompdf/dompdf');
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');

        $request = $requests->first();



        $file = "licence.docx";
        $tmpFile = "licence-output.pdf";
        $outfile = "licence-output.docx";

        $template = new TemplateProcessor($file);
        $template->setValue('LAST_NAME',$request->master_student_last_name_ar);
        $template->setValue('FIRST_NAME',$request->master_student_first_name_ar);

        $template->setValue('LAST_NAM',$request->master_student_last_name);
        $template->setValue('FIRST_NAM',$request->master_student_first_name);

        $template->setValue('BIRTHDAY',$request->master_student_birthday);

        $template->setValue('DOMAIN_AR',$request->domain_code);
        $template->setValue('FILLIERE_AR',$request->division_code);
        $template->setValue('SPECIALITY_AR',$request->speciality_code);

        $template->setValue('DOMAIN',$request->domain_code_fr);
        $template->setValue('FILLIERE',$request->division_code_fr);
        $template->setValue('SPECIALITY',$request->speciality_code_fr);

        $template->setValue('WILLAYA',$request->willaya_code);
        $template->setValue('WILLAYA_FR',$request->willaya_code_fr);



        $template->saveAs($outfile);

        $phpWord = IOFactory::load($outfile);
        $phpWord->save($tmpFile,'PDF');

        return  response()->download($outfile);


    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Models\Report;
use Carbon\Carbon;
use PDF;

class ReportsController extends Controller
{
    function get_rooms_data()
    {
     $rooms_data = DB::table('rooms')
         ->limit(100)
         ->get();
     return $rooms_data;
    }
    function reportShow(Report $report)
    {
        $report = DB::table('reports')->where('id_reports', $report->id_reports)->first();
        return response()->file(public_path('/uploads/laporan/' . $report->file));

    }
    function index()
    {
        $rooms_data = $this->get_rooms_data();
        $report = Report::all()->sortBy('tanggal');
        return view('admin.reports', ['report' => $report, 'rooms_data' => $rooms_data]);

    }
    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_rooms_data_to_html());
        $pdf_name = time() . ".pdf";
        $pdf->save(public_path('/uploads/laporan/' . $pdf_name));
        $mytime = Carbon::now();
        Report::create([
                'tanggal' => $mytime,
                'file' => $pdf_name,
                'status' => 'SEMUA',
            ]);
        return $pdf->stream();
    }

    function convert_rooms_data_to_html()
    {
     $rooms_data = $this->get_rooms_data();
     $mytime = Carbon::now();
     $output = '
     <h3 align="center">Laporan Kebersihan Ruangan<br> '.$mytime.'</h3>
     
          <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="30%">Ruangan</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Gedung</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Petugas</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Status</th>
   </tr>
     ';  
     foreach($rooms_data as $room)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$room->nama_ruang.'</td>
       <td style="border: 1px solid; padding:12px;">'.$room->gedung.'</td>
       <td style="border: 1px solid; padding:12px;">'.$room->petugas.'</td>
       <td style="border: 1px solid; padding:12px;">'.$room->status.'</td>
      </tr>
      ';
     }
     $output .= '</table> 
     <div class="col-md-5" style="text-align:right"> <br> <br>
                <a>Approval</a> <br><br>
                <a> <ttd> </a> <br><br><br>
                <a>Arif Sutowo</a> <br>
                <a>Manajer</a> <br><br>
            </div>';
     return $output;
    }
    public function destroyReport(Report $report) 
    {
    $report = DB::table('reports')->where('id_reports', $report->id_reports)->delete(); 
    return redirect()->action([ReportsController::class, 'index']);
    }
    public function destroyAllReport(Report $report) 
    {
        $report = DB::table('reports')->delete();
    return redirect()->action([ReportsController::class, 'index']);
    }
}
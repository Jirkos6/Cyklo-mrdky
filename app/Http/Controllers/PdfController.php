<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Rider;


class PdfController extends Controller
{
    public function downloadPDF($filename, $data) {
        $options = new Options();
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view($filename, compact('data'))->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        $pdfPath = public_path('pdfs/' . $filename . '.pdf');
        file_put_contents($pdfPath, $output);
        return response()->file($pdfPath);
    }

    public function streamRiderPDF() {
        $data = Rider::limit(10)->get();
        return $this->downloadPDF('rider-data', $data);
    }

    public function regeneratePDFs() {
        $this->streamRiderPDF();
        return view('download-pdf');
    }
}
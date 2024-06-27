<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Subtask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubtaskPDFController extends Controller
{
    public function generatePDF($subtask)
    {
        // Mock data
        $subtask = Subtask::with('components')->findOrFail($subtask);

        // Load the view and pass the data
        $pdfContent = view('pdf.subtask', compact('subtask'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Stream the generated PDF back to the browser
        return $dompdf->stream('subtask.pdf');
    }
}

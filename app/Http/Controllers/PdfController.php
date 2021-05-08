<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function show()
    {
        $disk = 's3';  // or 's3'
        $storage = Storage::disk($disk);
        $file_name = 'test.pdf';
        $pdf_path= 'test/'. $file_name;
        $file_path = Storage::disk('s3')->url($pdf_path);
        // dd($file_path);
        // return response($file, 200)
        //     ->header('Content-Type', 'application/pdf')
        //     ->header('Content-Disposition', 'inline; filename="' . $file_name . '"');
        return view('pdf.show', compact('file_path'));
    }
}

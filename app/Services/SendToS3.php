<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;


class SendToS3
{

    public static function sendImage($image_file)
    {
        $today = date("Y-m-d");
        $path = Storage::disk('s3')->put('bookapp/bookimg'.$today, $image_file, 'public');
        return $image_path = Storage::disk('s3')->url($path);
    }

    public static function sendPDF($PDF_file)
    {
        $today = date("Y-m-d");
        $path = Storage::disk('s3')->put('bookapp/bookimg'.$today, $PDF_file, 'public');
        return $pdf_path = Storage::disk('s3')->url($path);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generateInitialQrCode()
    {
        $url = 'localhost:8000';
        $imagePath = 'qrcodes/qrcode.png';

        $tempImagePath = storage_path('app/' . $imagePath);
        QrCode::format('png')->size(400)->generate($url, $tempImagePath);

        Storage::disk('public')->put($imagePath, file_get_contents($tempImagePath));

        unlink($tempImagePath);

        return 'Initial QR Code generated successfully.';
    }
}

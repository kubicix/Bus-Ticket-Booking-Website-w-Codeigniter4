<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;

class PnrController extends Controller
{
    public function generateQRCode($ticketDetails)
    {
        
        // QR kodu oluşturma
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($ticketDetails)
            ->encoding(new Encoding('UTF-8'))
            ->size(300)
            ->margin(10)
            ->build();

        // QR kodunu resim olarak oluştur
        header('Content-Type: ' . $result->getMimeType());
        echo $result->getString();
    }
}

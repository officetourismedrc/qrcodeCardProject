<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class GenerateCardController extends Controller
{
    //
    public function downloadQrcode(Card $card){
        
        $content =  $card->qr_path;

        return Storage::download($content);
    }
}

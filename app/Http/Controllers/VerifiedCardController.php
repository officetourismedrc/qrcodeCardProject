<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\Employee;
use App\Models\Card;

class VerifiedCardController extends Controller
{
    //
    public function index(Request $request){

        try {
            $employeeId = Crypt::decryptString($request->attr1);
            $cardNumber = Crypt::decryptString($request->attr2);

            $card = Card::where('card_numb', $cardNumber)->get();
            $employee = Employee::where('id', $cardNumber)->get();

            if($card !== null && $employee !== null){
                return 'card verified '.$card .' employee '.$employee;
            }
        } catch (DecryptException $e) {
            // ...
        }
          
    }
}

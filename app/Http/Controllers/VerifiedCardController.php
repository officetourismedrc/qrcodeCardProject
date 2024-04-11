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
            //Crypt::decryptString($request->attr1);
            //Crypt::decryptString($request->attr2);
            $employeeId = $request->attr1;
            $cardNumber = $request->attr2;

            $card = Card::where('card_numb', $cardNumber)->get();
            $employee = Employee::where('id', $employeeId)->get();
            
            
            if($card !== null && $employee !== null){
                //return 'card verified '.$card .' employee '.$employee;
                return view('card-verification',['card'=>$card, 'employee'=>$employee]);
            }
            return 'failled';
        } catch (DecryptException $e) {
            // ...
        }
          
    }
}

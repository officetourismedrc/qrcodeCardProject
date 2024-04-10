<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
 


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DB::table('cards as c')
                         ->join('employees as e','e.id','=','c.employees_id')
                         ->select('e.f_name as employee_first_name','e.last_name as employee_last_name','e.middle_name as employee_middle_name',
                         'c.id as card_id','c.card_numb as card_numb', 'c.qr_path as qr_code_path','c.card_path as card_path')
                         ->get();
        //return $data;              
        return view('adminPanel.cardFolder.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $employee = Employee::find($request->emp);
        return view('adminPanel.cardFolder.add',['data'=>$employee]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $employee = Employee::find($request->empl);

       
        
        if(isset($employee)){
        $validated = $request->validate([
            'card_numb' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
            'image' => 'required|image'
        ]);
       
        $string = str_replace(' ', '-', $employee->f_name);
        $employeeName =  preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
        
        $directory = $employeeName.$validated['card_numb'];

        $cardNumber = Crypt::encryptString($validated['card_numb']);
        $employeeId = Crypt::encryptString( $employee->id);
        
        
        if (!Storage::disk('public')->exists($directory.'/qrcode/'.$employeeName.'.svg')) {
            $content = QrCode::size(300)
                    //    ->eye('circle')
                        ->format('svg')
                    //    ->merge('/public/assets/images/LOGOVECTORIEL.png')
                    //    ->errorCorrection('M')
                       ->margin(1)
                       ->generate(
                           'http://localhost/card-qrcode/public/'.'qrcode/'.$employeeId.'/'.$cardNumber
                       );
            Storage::disk('public')->put($employeeName.'/qrcode/'.$employeeName.'.svg', $content);
         
        }
        
         $content = Storage::disk('public')->url($employeeName.'/qrcode/'.$employeeName.'.svg'); 

         $card = new Card();

         $card->card_numb = $validated['card_numb'];
         $card->desc = $validated['desc'];
         $card->qr_path = $content;
         $card->employees_id = $employee->id;

          
         if($request->hasfile('image'))
         {
            

             $file = $request->file('image');
             $fileName = $file->hashName().'.'.$file->extension();
             Storage::disk('public')->put($employeeName.'/card/'.$fileName, $file);
             $pathToImg = Storage::disk('public')->url($employeeName.'/card/'.$fileName);

             $card->card_path =  $pathToImg/*$fileName*/;
            
         }
        
        $card->save();

        return to_route('employee.show',['employee'=>$employee->id]);
       }
       return to_route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
        return view('adminPanel.cardFolder.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
        $employee = DB::table('cards as c')
                         ->join('employees as e','e.id','=','c.employees_id')
                         ->where('c.employees_id','=', $card->employee_id)
                         ->select('e.f_name as employee_first_name',
                                  'c.card_numb as card_numb')
                         ->get();

        $string = str_replace(' ', '-', $employee->f_name);
        $employeeName =  preg_replace('/[^A-Za-z0-9\-]/', '', $string); 

        $directory = $employee->f_name.$employee->card_numb;

        Storage::deleteDirectory($directory);

    }
}

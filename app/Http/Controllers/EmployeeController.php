<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Card;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\GenerateCardController;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Employee::all();
        return view('adminPanel.employeeFolder.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('adminPanel.employeeFolder.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // {{-- ['f_name','last_name','middle_name','dob','email','phone_numb'] --}}

        $validated = $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Employee::class],
            'dob' => ['date', 'before_or_equal:'.Carbon::now()],
            'phone_numb'=>['required','regex:/((\+|00)?[1-9]{2}|0)[1-9]([0-9]){8}/','unique:employees'],
           
        ]);


       $user = Employee::create($validated);
      
       return redirect()->action([GenerateCardController::class, 'store'],['request'=>$request, 'employee'=>$user]);

        return to_route('employee.index');

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
        $card = Card::where('employees_id', $employee->id)->get();
        //dd($card);
        return view('adminPanel.employeeFolder.show',['data'=>$employee, 'card'=>$card]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {

        return view('adminPanel.employeeFolder.edit', ['data'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        
        $validated = $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'lowercase', 'email', 'max:255',],
            'dob' => ['date', 'before_or_equal:'.Carbon::now()],
            'phone_numb'=>['required','regex:/((\+|00)?[1-9]{2}|0)[1-9]([0-9]){8}/',],
           
        ]);

        $employee->f_name = $validated['f_name'];
        $employee->last_name =  $validated['last_name'];
        $employee->middle_name =  $validated['middle_name'];
        $employee->phone_numb =  $validated['phone_numb'];
        $employee->email =  $validated['email'];
        $employee->dob =  $validated['dob'];
        
        $employee->save();
        return to_route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return to_route('employee.index');
    }
}

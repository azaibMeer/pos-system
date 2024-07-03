<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['customers'] = Customer::orderBy('id','desc')->get();
        return view('main.customer.list',$data);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('main.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // dd($request->expectsJson());
        $request->validate([
            'name' => 'required',  
            'phone' => 'required|unique:customers', 
           ]);

         $customer = new Customer; 
         $customer->name = $request->name;
         $customer->email = $request->email;
         $customer->phone = $request->phone; 
         $customer->created_user_id = auth()->id();
         $customer->save(); 

         if ($request->expectsJson())  
           return response()->json(['message' => 'Customer added successfully.']); 

         return redirect(url('/customer/list'))->with('message', 'Customer add successfully.'); 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
          $data ['customers'] = Customer::where('id',$id)->first();
          return view('main.customer.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // dd($request);
        $request->validate([
            'name' => 'required|unique:customers', 
            'email' => 'required|unique:customers', 
            'phone' => 'required|unique:customers', 
           ]);

         $customer = Customer::find($id); 
         $customer->name = $request->name;
         $customer->email = $request->email;
         $customer->phone = $request->phone; 
         $customer->created_user_id = auth()->id();
         $customer->save(); 

         return redirect(url('/customer/list'))->with('message', 'Customer update successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id); 
        $customer->delete();
        return redirect('/customer/list')->with('error', 'Customer deleted successfully.');
    }
}

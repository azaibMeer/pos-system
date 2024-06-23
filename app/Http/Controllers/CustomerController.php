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
        $data ['customers'] = Customer::get();
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
        // dd($request);
        $request->validate([
            'name' => 'required', 
           ]);

         $customer = new Customer; 
         $customer->name = $request->name;
         $customer->email = $request->email;
         $customer->phone = $request->mobile;
         $customer->cnic = $request->cnic;
         $customer->created_user_id = auth()->id();
         $customer->save(); 

         return redirect(url('/customer/list'))->with('success', 'Customer add successfully.'); 

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

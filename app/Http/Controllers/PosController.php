<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Customer;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd();
        if(session()->has('outlet_id')){
            $data['customers'] = Customer::get();
             // $data['customers'] = json_decode($customers);
            return view('main.pos',$data);
        }else{

            $data['outlets'] = Outlet::where('status', 1)->get();
            return view('main.choose_outlet',$data);
            
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

     public function search(Request $request)
    {
        $query = $request->input('query');
        $customers = Customer::where('name', 'LIKE', "%{$query}%")->orWhere('phone', 'LIKE', "%{$query}%")->get();
        return response()->json($customers);
    }
}

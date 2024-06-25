<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data ['outlets'] = Outlet::get();
        return view('main.outlet.list',$data);
    }

    public function outletupdate($id)
    {
        Session::put('outlet_id', $id);
        return redirect('/pos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required', 
            'contact_number' => 'required', 
           ]);

         $outlet = new Outlet; 
         $outlet->name = $request->name;
         $outlet->address = $request->address;
         $outlet->contact_number = $request->contact_number; 
         $outlet->receipt_header = $request->receipt_header; 
         $outlet->receipt_footer = $request->saveToLocal; 
         $outlet->created_user_id = auth()->id();
         $outlet->status = $request->status; 
         $outlet->save(); 

         return redirect(url('/outlet/list'))->with('message', 'Outlet add successfully.'); 
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
         $data ['outlets'] = Outlet::where('id',$id)->first();
          return view('main.outlet.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required', 
            'phone' => 'required', 
           ]);

         $outlet = Outlet::find($id); 
         $outlet->name = $request->name;
         $outlet->email = $request->email;
         $outlet->phone = $request->phone; 
         $outlet->created_user_id = auth()->id();
         $outlet->save(); 

         return redirect(url('/outlet/list'))->with('message', 'Outlet update successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outlet = Outlet::find($id); 
        $outlet->delete();
        return redirect('/outlet/list')->with('message', 'Outlet deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.attribute.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:attributes'
        ]);

        $userId = Auth()->id();

        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'user_id' => $userId,
        ];

        Attribute::create($data);
        return redirect('/attribute/list')->with('message','Attribute add successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data['attributes'] = Attribute::get();
        return view('main.attribute.list',$data);
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

    public function attribute_value_create()
    {
        $data['attributes'] = Attribute::get();
        return view('main.attribute.attribute_value_create',$data);
    }

    public function attribute_value_store(Request $request)
    {
        
        $userId = Auth()->id();

        $data = [
            'value' => $request->attribute_value,
            'status' => $request->status,
            'user_id' => $userId,
            'attribute_id' => $request->attribute_id,
        ];

        AttributeValue::create($data);
        return redirect('/attribute/list')->with('message','Attribute value add successfully.');
    }
}

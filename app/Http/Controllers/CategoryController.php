<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('main.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'unique:categories'
        ]);

        $userId = Auth()->id();

        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'created_user_id' => $userId,
        ];

        Category::create($data);
        return redirect('/category/list')->with('message','Category add successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data['categories'] = Category::get();
        return view('main.category.list', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['category'] = Category::find($id);
        return view('main.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);  
        $category->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect('/category/list')->with('message','Category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/list')->with('message','Category deleted successfully.');
    }

    public function active($id)
    {    
        $active = Category::find($id);
        $active->status = 1;
        $active->save();
        return redirect('/category/list')->with('message','Category active successfully.');
    }

     public function inactive($id)
    {    
        $inactive = Category::find($id);
        $inactive->status = 0;
        $inactive->save(); 
        return redirect('/category/list')->with('error','Category inactive successfully.');
    }
}

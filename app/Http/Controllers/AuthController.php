<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
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
        return view('auth.login');
    }

    /**
     * Authenticate the users.
     */
    public function authenticate(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
           
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) 
        {

            $user = Auth::User();
            return redirect('/dashboard');
        }

        else
            {
                return redirect()->back()
                ->with('error','Credentials are Incorrect');
            }
            
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
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

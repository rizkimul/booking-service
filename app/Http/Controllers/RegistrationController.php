<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request -> validate([
        //     'username' => 'required|unique:users',
        //     'password' => 'required|min:4',
        //     'fullname' => 'required',
        //     'email' => 'required',
        //     'phoneNumber' => 'required'
        // ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);

        // User::create($validatedData);

        $password = Hash::make($request->input('password'));
        $user = new User();
        $user->username = $request->input('username');
        $user->fullname = $request->input('fullName');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phoneNumber');
        $user->password = $password;
        $user->usertype = 'User';
        $user->instansi = 'Warga';
        $user->save();
        // return redirect('/gedung')->with('statusAdd', 'Added data sucessfully !');

        $request->session()->flash('succes', 'Registration sucessfull! Please login');

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.datauser.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.datauser.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'username' => 'required',
        'nama_lengkap' => 'required',
        'email' => 'required',
        'password' => 'required',
       ]);

       $user = New User;
       $user->username = $request->username;
       $user->nama_lengkap = $request->nama_lengkap;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->level = $request->level;
       $user->save();

       return redirect()->route('datauser.index');
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
        return view('admin.datauser.edit')->with(['user' => User::find($id),]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'level' => 'required',
           ]);
    
           $user = User::find($id);
           $user->username = $request->username;
           $user->nama_lengkap = $request->nama_lengkap;
           $user->email = $request->email;
           $user->level = $request->level;
           $user->save();
    
           return redirect()->route('datauser.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}

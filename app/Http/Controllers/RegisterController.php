<?php

namespace App\Http\Controllers;
use Str;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'foto' => 'required',
        ]);
        $user = new User();
        $user->nama_lengkap = $request->nama;
        $user->email = $request->email;
        $user->password = $request->password;
        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profil', $randomName, 'public');
            // memasukan nama image nya ke database
            $user->foto = $path;
        }
        $user->save();
        return redirect()->route('login');
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

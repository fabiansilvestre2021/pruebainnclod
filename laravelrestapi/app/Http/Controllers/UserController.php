<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->password = Hash::make($request->password);
        $credentials = $request->only('email', 'password');
        

    // Validar las credenciales del usuario
    if (Auth::attempt($credentials)) {
        // Las credenciales son válidas

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Devolver los detalles del usuario como respuesta JSON
        return response()->json($user);
    } else {
        // Las credenciales son inválidas
        return response()->json(['error' => 'Credenciales inválidas'], 401);
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
    public function show()
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

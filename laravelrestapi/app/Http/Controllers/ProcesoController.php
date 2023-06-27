<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proceso;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proc = Proceso::all();
        return $proc;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proc = new Proceso();
        $proc->PRO_PREFIJO = $request->PRO_PREFIJO;
        $proc->PRO_NOMBRE = $request->PRO_NOMBRE;
        

        $proc->save();
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

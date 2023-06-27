<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDoc;

class TipDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipDoc = TipoDoc::all();
        return $tipDoc;
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
        $tipDoc = new TipoDoc();
        $tipDoc->TIP_NOMBRE = $request->TIP_NOMBRE;
        $tipDoc->TIP_PREFIJO = $request->TIP_PREFIJO;

        $tipDoc->save();
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

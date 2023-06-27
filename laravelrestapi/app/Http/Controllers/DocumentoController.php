<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DOC_DOCUMENTO = Documento::all();
        return $DOC_DOCUMENTO;
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

        
        $document = new Documento();
        $document->DOC_NOMBRE = $request->DOC_NOMBRE;
        $document->DOC_CODIGO = $request->DOC_CODIGO;
        $document->DOC_CONTENIDO = $request->DOC_CONTENIDO;
        $document->DOC_ID_TIPO = $request->DOC_ID_TIPO;
        $document->DOC_ID_PROCESO = $request->DOC_ID_PROCESO;

        $document->save();

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
        $document = Documento::findOrFail($request->id);
        $document->$DOC_NOMBRE = $request->$DOC_NOMBRE;
        // $document->$DOC_CODIGO = $request->$DOC_;
        $document->$DOC_CONTENIDO = $request->$DOC_CONTENIDO;
        $document->$DOC_ID_TIPO = $request->$DOC_ID_TIPO;
        $document->$DOC_ID_PROCESO = $request->$DOC_ID_PROCESO;

        $document->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $document = Documento::destroy($request->id);
    }
}

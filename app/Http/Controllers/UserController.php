<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function verContenido()
    {
        // Recoger datos de tabla contenido los cuales sean publicos y pasarlos a la vista
        $tableData = [];

        return view("user.ver");
    }

    public function subirContenido(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $owner_id = Auth::id();
            $nombreArchivo = $archivo->getClientOriginalName();; // Nombre del archivo
            $archivo->move(public_path('storage/ficheros/'.$owner_id), $nombreArchivo);
            dd($archivo);
            $hashChecksum = md5_file(public_path('storage/ficheros/' . $nombreArchivo));
            
            $content = new Content();
            $content->file = $nombreArchivo;
            $content->checksum = $hashChecksum;
            $content->public = true; // Suponiendo que por defecto es público
            $content->type_id = $request->tipo; // Asignar el tipo seleccionado
            $content->owner_id = Auth::id(); // Obtener el ID del propietario de la sesión
            
            $content->save();
            
            return redirect()->route('subir.contenido')->with('success', 'Contenido subido y guardado en la base de datos exitosamente.');
        } else {
            return redirect()->route('subir.contenido')->with('error', 'Error al subir el archivo.');
        }
    }

    public function mostrarFormularioSubida()
    {
        return view("user.subir");
    }
    
}

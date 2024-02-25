<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\User;
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

    public function borrarContenido($id)
    {
        $content = Content::find($id);

        if (!$content) {
            return redirect()->back()->with('error', 'El contenido no se encontró.');
        }

        // Verificar si el usuario tiene permiso para borrar el contenido (puedes agregar lógica de autorización aquí)

        // Eliminar el archivo asociado
        $owner_id = $content->owner_id;
        $nombreArchivo = $content->file;
        $rutaArchivo = public_path('storage/ficheros/' . $owner_id . '/' . $nombreArchivo);

        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo); // Eliminar el archivo del sistema de archivos
        }

        // Eliminar el contenido de la base de datos
        $content->delete();

        return redirect()->back()->with('success', 'Contenido y archivo asociado borrados exitosamente.');
    }

    public function cambiarVisibilidad($id)
    {
        $content = Content::find($id);
    
        if (!$content) {
            return redirect()->back()->with('error', 'El contenido no se encontró.');
        }
    
        // Cambiar la visibilidad del contenido
        $content->public = !$content->public; // Cambiar de público a privado o viceversa
        $content->save();
    
        return redirect()->back()->with('success', 'Visibilidad cambiada exitosamente.');
    }

    public function mostrarFormularioEditar($id)
    {
        $contenido = Content::find($id);
        
        if (!$contenido) {
            return redirect()->back()->with('error', 'El contenido no se encontró.');
        }

        return view('user.editar', compact('contenido'));
    }

    public function actualizarContenido(Request $request, $id)
{
    $contenido = Content::find($id);
    $owner_id = Auth::id();

    if (!$contenido) {
        return redirect()->back()->with('error', 'El contenido no se encontró.');
    }

    // Subir y sustituir el archivo si se proporciona uno nuevo
    if ($request->hasFile('archivo')) {
        // Borrar el archivo anterior si existe
        $archivoAnterior = public_path('storage/ficheros/'. $owner_id . '/' . $contenido->file);
        if (file_exists($archivoAnterior)) {
            unlink($archivoAnterior);
        }

        $archivo = $request->file('archivo');
        $nombreArchivo = $archivo->getClientOriginalName();

        // Mover el archivo al directorio deseado sin crear una carpeta adicional con el nombre del archivo
        $archivo->move(public_path('storage/ficheros/'. $owner_id), $nombreArchivo);

        // Actualizar el nombre del archivo en el modelo
        $contenido->file = $nombreArchivo;
    }

    // Actualizar la visibilidad del contenido
    $contenido->public = $request->visibilidad;

    // Guardar los cambios en el contenido
    $contenido->save();

    return redirect()->route('editar.contenido', ['id' => $id])->with('success', 'Contenido actualizado exitosamente.');
}

    public function showContentUser()
    {
        $owner_id = Auth::id();
        $tableData = Content::where('owner_id', $owner_id)->get();

        // Asignar el propietario a cada elemento de $tableData
        foreach ($tableData as $data) {
            $data->owner = User::find($data->owner_id);
        }

        return view('user.ver', compact('tableData'));
    }


    public function subirContenido(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $owner_id = Auth::id();
            $nombreArchivo = $archivo->getClientOriginalName();
            
            // Mover el archivo a la carpeta de almacenamiento
            $archivo->move(public_path('storage/ficheros/'.$owner_id), $nombreArchivo);
            
            // Obtener la ruta completa del archivo
            $rutaArchivo = public_path('storage/ficheros/' . $owner_id . '/' . $nombreArchivo);
            
            // Verificar si el archivo se movió correctamente
            if (file_exists($rutaArchivo)) {
                // Calcular el checksum MD5 del archivo
                $hashChecksum = md5_file($rutaArchivo);
                
                $content = new Content();
                $content->file = $nombreArchivo;
                $content->checksum = $hashChecksum;
                $content->public = true;
                $content->type_id = $request->tipo;
                $content->owner_id = Auth::id();
                
                $content->save();
                
                return redirect()->route('subir.contenido')->with('success', 'Contenido subido y guardado en la base de datos exitosamente.');
            } else {
                return redirect()->route('subir.contenido')->with('error', 'Error al mover el archivo.');
            }
        } else {
            return redirect()->route('subir.contenido')->with('error', 'Error al subir el archivo.');
        }
    }

    public function mostrarFormularioSubida()
    {
        return view("user.subir");
    }
    
}

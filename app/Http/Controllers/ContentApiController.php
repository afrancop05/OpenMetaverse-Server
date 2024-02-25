<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;

class ContentApiController extends Controller
{
    /**
     * Devuelve un Json con todos los recursos públicos
     */
    public function index()
    {
        $content = Content::select("file")->where("public", true)->get();
        return response()->json([$content], 200);
    }

    /**
     * Devuelve el archivo correspondiente si es público, 403 si no lo es.
     */
    public function show($id)
    {
        $content = Content::find($id);
        if (!$content) return response()->json(["status"=>"error"], 404);
        if (!$content->public) return response()->json(["error"=>"403"], 403);
        return response()->file(public_path("storage/ficheros/".$content->user->id."/".$content->file));
    }
}

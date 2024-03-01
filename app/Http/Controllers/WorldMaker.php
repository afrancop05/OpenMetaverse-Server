<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorldMaker extends Controller
{
    public function crearMundo() {
        return view("WorldMaker.crear");
    }

    public function guardarMundo(Request $request) {
        $params = [
            "name" => $request->post("name", "Undefined"),
            "author" => User::find(Auth::id())->name,
            "description" => $request->post("descripcion", ""),
            "plane_size" => $request->post("tamanio", "100"),
            "shape" => $request->post("forma", "cube"),
            "shape_size" => $request->post("tamanioforma", "1"),
            "light_shadow" => $request->post("sombraluz", "soft"),
            "light_direction" => $request->post("dirluz", "-45"),
            "light_color" => $request->post("colorluz", "#ffffff")
        ];
        $world_request = Request::create("/api/world-maker", "GET", $params);
        $world_response = app()->handle($world_request);
        $owner_id = Auth::id();
        $route = public_path("/storage/ficheros/".$owner_id."/");
        if (!file_exists($route)) mkdir($route, 0777, true);
        $file_path = $route.$request->name.".xml";
        file_put_contents($file_path, $world_response);

        $hashChecksum = md5_file($file_path);
        $content = new Content();
        $content->file = $request->name.".xml";
        $content->checksum = $hashChecksum;
        $content->public = $request->visibilidad;
        $content->type_id = 2;
        $content->owner_id = $owner_id;

        $content->save();
        return redirect('http://192.168.33.20:8000/ver');
    }
}

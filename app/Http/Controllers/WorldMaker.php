<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorldMaker extends Controller
{

    const VALID_SHAPES = ["cube", "sphere", "cylinder", "capsule"];

    /**
     * Genera a través de parámetros un mundo de muestra
     */
    public function index(Request $request)
    {
        $name = $request->query("name", "Unnamed World");
        $author = $request->query("author", "Unknown");
        $description = $request->query("description", "");
        $plane_size = $request->query("plane_size", "200");
        $shape = strtolower($request->query("shape", "cube"));
        $shape_size = $request->query("shape_size", "1");
        $light_shadow = $request->query("light_shadow", "soft");
        $light_direction = $request->query("light_direction", "-45");
        $light_color = $request->query("light_color", "#FFFFFF");
        if(!in_array($shape, self::VALID_SHAPES)) $shape = "cube";
        if(!is_numeric($plane_size)) $plane_size = "200";
        if(!is_numeric($shape_size)) $shape_size = "1";
        if(!is_numeric($light_direction)) $light_direction = "-45";
        $attributes = [];
        $attributes["name"] = $name;
        $attributes["author"] = $author;
        $attributes["description"] = $description;
        $attributes["plane_size"] = $plane_size;
        $attributes["shape"] = $shape;
        $attributes["shape_size"] = $shape_size;
        $attributes["light_shadow"] = $light_shadow;
        $attributes["light_direction"] = $light_direction;
        $attributes["light_color"] = $light_color;
        $content = view("WorldMaker.index", $attributes);
        $reponse = response($content, 200)->header("Content-Type", "text/xml");
        return $reponse;
    }
}

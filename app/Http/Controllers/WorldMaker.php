<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorldMaker extends Controller
{

    const VALID_SHAPES = ["cube", "sphere", "cylinder", "capsule"];

    /**
     * Genera un mundo plano con una forma geométrica física que se desee.
     */
    public function index(Request $request)
    {
        $shape = strtolower($request->query("shape", "cube"));
        $size = strtolower($request->query("size", "1"));
        if(!in_array($shape, self::VALID_SHAPES)) $shape = "cube";
        if(!is_numeric($size)) $size = "1";
        $content = view("WorldMaker.index", ["shape"=>$shape, "size"=>$size]);
        $reponse = response($content, 200)->header("Content-Type", "text/xml");
        return $reponse;
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index()
    {
        // Recoger datos de tabla contenido que sean públicos
        $tableData = Content::where('public', true)->get();
        $tableData->first()->owner = User::find($tableData->first()->owner_id);

        return view("home", compact('tableData'));
    }

    public function showContent()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $tableData = Content::all();
        } elseif ($user->hasRole('user')) {
            $tableData = Content::where('public', true)->get();
        }

        // Asignar el propietario a cada elemento de $tableData
        foreach ($tableData as $data) {
            $data->owner = User::find($data->owner_id);
        }

        return view('home', compact('tableData'));
    }
}

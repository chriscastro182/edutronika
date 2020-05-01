<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $catPrincipales = Categoria::where('orden', '!=', 0)->orderBy('orden', 'asc')->get();

        $prodNuevos     = Producto::where('nuevo', '=', 1)->get();

        return view('welcome', compact('catPrincipales', 'prodNuevos'));
    }
}

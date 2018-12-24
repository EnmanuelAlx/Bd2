<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $empresas = Empresa::paginate(5);
        $categorias = Categoria::all();
        return view('Home.index', ['empresas' => $empresas, 'categorias' => $categorias]);
    }

    public function withCategory($categoria_id){
        $empresas = Empresa::where('id_categoria', '=', $categoria_id)->paginate(5);
        $categorias = Categoria::all();
        return view('Home.index', ['empresas' => $empresas, 'categorias' => $categorias]);
    }
}

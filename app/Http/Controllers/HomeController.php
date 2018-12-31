<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $empresas = Empresa::paginate(5);
        $categorias = Categoria::all();
        return view('Home.index', ['empresas' => $empresas, 'categorias' => $categorias]);
    }

    public function withCategory(Request $request, $categoria_id)
    {
        $empresas = Empresa::where('id_categoria', '=', $categoria_id)->paginate(5);
        $categorias = Categoria::all();
        $view = view('Home.index', ['empresas' => $empresas, 'categorias' => $categorias]);
        if($request->ajax()){
            $section = $view->renderSections();
            return response()->json($section['content']);
        }
        return view('Home.index', ['empresas' => $empresas, 'categorias' => $categorias]);
    }
}

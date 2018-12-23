<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
class HomeController extends Controller
{
    public function index(){
        $empresas = Empresa::paginate(5);
        return view('Home.index', ['empresas' => $empresas]);
    }
}

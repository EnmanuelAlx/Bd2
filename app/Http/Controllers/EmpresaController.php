<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EmpresaController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'empresa';
    protected $redirectTo = '/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest:empresa')->except('logout');
        // $this->middleware('auth:empresa', ['only' => ['']]);
        // $this->middleware('guest', ['only' => ['showLoginForm']]);

    }

    protected function guard()
    {
        return \Auth::guard('empresa');
    }

    public function showLoginForm(){
        return view('auth.empresa.login');
    }

    public function authenticated(Request $request, $user){
        return redirect('/');
    }


    public function index($empresa_id)
    {
        $productos = Producto::where('id_empresa', '=', $empresa_id)->paginate(5);
        $empresa = Empresa::find($empresa_id);
        return view('Empresa.index', ['productos' => $productos, 'empresa'=>$empresa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}

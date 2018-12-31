<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
        AuthenticatesUsers::guard insteadof RegistersUsers;
    }
    protected $guard = 'empresa';
    protected $redirectTo = '/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth:empresa', ['only' => ['perfil']]);
        // $this->middleware('guest', ['only' => ['showLoginForm']]);

    }

    protected function guard()
    {
        return Auth::guard('empresa');
    }

    public function showLoginForm(){
        return view('auth.empresa.login');
    }

    public function authenticated(Request $request, $user){
        return redirect('/');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:empresas',
            'password' => 'required|string|min:3|confirmed',
            'imagen' => 'image'
        ]);
    }

    protected function create(array $data)
    {
        $request = new Request($data);
        $imagen = null;
        $empresa = Empresa::create($request->all());

        if ($request->input('imagen')) {
            $empresa->imagen = $request->input('imagen')->store('public/img_empresa');
        }
        $empresa->save();
        return $empresa;

    }

    public function index($empresa_id)
    {
        $productos = Producto::where('id_empresa', '=', $empresa_id)->paginate(5);
        $empresa = Empresa::find($empresa_id);
        return view('Empresa.index', ['productos' => $productos, 'empresa'=>$empresa]);
    }


    public function perfil(){
        return view('Empresa.perfil');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

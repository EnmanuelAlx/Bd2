<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        $productos = Producto::where('id_empresa', '=', $empresa_id)->paginate(8);
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
        if(Auth::guard('empresa')->user()->id != $empresa->id){
            return back();
        }
        $categorias = Categoria::all();
        return view('Empresa.edit', compact('empresa', 'categorias'));
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
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'telefono' => 'string|required',
            'password' => 'nullable|min:6|confirmed',
            'email' => 'nullable|email|unique:empresas,email,'.$empresa->id,
            'imagen' => 'image'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if ($request->hasFile('imagen')) {
            $empresa->imagen = $request->file('imagen')->store('public/img_producto');
        }
        if($request->input('password')!=''){
            $empresa->password = bcrypt($request->input('password'));
        }

        $empresa->update($request->only('name', 'telefono', 'email', 'id_categoria'));
        return back()->with('info', 'Empresa Actualizada');
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

<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Adicional;
use App\AdicionalProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{


    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $empresa = Auth::guard('empresa')->user()->id;
        $productos = Producto::where('id_empresa', '=', $empresa); 
        return view('Producto.index')->with(['productos'=> $productos]);
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
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string|max:255',
            'precio' => 'integer|required',
            'imagen' => 'image|required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $producto = Producto::create([
            'precio' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
            'id_empresa' => Auth::guard('empresa')->user()->id,
        ]);

        if($request->file('imagen')){
            $producto->imagen = $request->file('imagen')->store('public/img_producto');
        }
        $producto->id_empresa = Auth::guard('empresa')->user()->id;
        $producto->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        if($producto->id_empresa != Auth::guard('empresa')->user()->id){
            return back()->withErrors(['validate' => 'No tiene permiso para ver ese producto']);
        }
        // dd($producto->adicionales);
        return view('Producto.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('Producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {

        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string|max:255',
            'precio' => 'integer|required',
            'imagen' => 'image|required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        
        if(Auth::guard('empresa')->user()->id != $producto->id_empresa){
            return back()->withErrors(['validate' => 'No tiene permiso para editar ese producto']);
        }

        if($request->hasFile('imagen')){
            $producto->imagen = $request->file('imagen')->store('public/img_producto');
        }

        $producto->update($request->only('descripcion', 'precio'));
        return back()->with('info', 'Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect('/productos');
    }

    public function eliminarAdicional(Request $request){
        $producto = $request->input('producto');
        $adicional = $request->input('adicional');
        $adicionalProducto = AdicionalProducto::where('id_producto', '=', $producto)
                                                ->where('id_adicional', '=', $adicional)->first();
        $adicionalProducto->delete();
        return response()->json('ok');
    }

    public function agregarAdicionales(Request $request){
        $producto = Producto::find($request->input('producto'));
        $adicionales = $request->input('adicional');
        $producto->adicionales()->attach($adicionales);
        return back();
    }
    

}

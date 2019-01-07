<?php

namespace App\Http\Controllers;

use App\User;
use App\Orden;
use App\AdicionalOrden;
use App\AdicionalProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\OrdenProducto;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        if(Auth::user()->id != $usuario->id){
            return back();
        }
        return view('Usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'string|required',
            'password' => 'nullable|min:3|confirmed',
            'email' => 'nullable|email|unique:users,email,' . $usuario->id,
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if ($request->input('password') != '') {
            $usuario->password = bcrypt($request->input('password'));
        }

        $usuario->update($request->only('name', 'telefono', 'email', 'direccion'));
        return back()->with('info', 'Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        //
    }


    public function agregarAOrden(Request $request){
        // dd($request->all());
        $producto = $request->input('producto');
        $adicionales = $request->input('adicionales');
        $isOrden = Orden::where('id_usuario', '=', Auth::user()->id)->where('status', '=', 0)->get();
        $orden = Auth::user()->ordenes->filter(function ($item) {
            return $item->status == 0;
        })->first();
        // dd($adicionales);
        if($orden){
            $this->agregarProducto($orden, $producto, $adicionales);
        }
        else{
            $this->crearOrden($producto, $adicionales);
        }
    }

    private function agregarProducto($orden, $producto, $adicionales){  
        if($adicionales){
            foreach ($adicionales as $adicional) {
                DB::select("CALL addProductoToOrder($orden->id,$producto,$adicional,@ok)");
                $ok = (DB::select('SELECT @ok as ok'))[0]->ok;
                if ($ok) {
                    continue;
                } else {
                    OrdenProducto::create([
                        'id_orden' => $orden->id,
                        'id_producto' => $producto,
                        'id_adicional' => $adicional,
                    ]);
                }
                
            }
            return response()->json(['ok' => 1]);            
        }else{
            $ok = 0;
            DB::select("CALL addProductoToOrder($orden->id,$producto,0,@ok)");
            $ok = (DB::select('SELECT @ok as ok'))[0]->ok;
            if($ok){
                return response()->json(['ok' => 1]);
                
            }else{
                $orden->productos()->attach($producto);
                return response()->json(['ok'=> 1]);
            }
        }

    }

    private function crearOrden($producto, $adicionales){
        $orden = Orden::create([
            'status' => 0,
            'id_usuario' => Auth::user()->id,
        ]);
        if($adicionales){
            foreach ($adicionales as $adicional) {
                OrdenProducto::create([
                    'id_orden' => $orden->id,
                    'id_producto' => $producto,
                    'id_adicional' => $adicional,
                ]);
            }
            return response()->json(['ok' => 1]);            
        }else{
            $orden->productos()->attach($producto);
            return response()->json(['ok' => 1]);
        }
    }

}

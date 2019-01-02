<?php

namespace App\Http\Controllers;

use App\Adicional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdicionalController extends Controller
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
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|integer|',
        ]);
        if($validator->fails()){
            return back();
        }

        Adicional::create([
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'id_categoria' => Auth::guard('empresa')->user()->id_categoria
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function show(Adicional $adicional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function edit(Adicional $adicional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adicional $adicional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adicional  $adicional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adicional $adicional)
    {
        //
    }
}

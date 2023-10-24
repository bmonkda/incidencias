<?php

namespace App\Http\Controllers;

use App\Models\Emergencia;
use Illuminate\Http\Request;

class EmergenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emergencias = Emergencia::all();
        return view('admin.emergencias.index', compact('emergencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emergencias.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:emergencias,nombre',
            'color1' => 'required|unique:emergencias,color',
            'color2' => 'required|unique:emergencias,color2',
        ]);

        $emergencia = new Emergencia;
        $emergencia->nombre = $request->nombre;
        $emergencia->color = $request->color1;
        $emergencia->color2 = $request->color2;

        $emergencia->save();

        return redirect()->route('emergencias.index')->with('status', 'Emergencia creada satisfactoriamente');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emergencia  $emergencia
     * @return \Illuminate\Http\Response
     */
    public function show(Emergencia $emergencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emergencia  $emergencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Emergencia $emergencia)
    {
        return view('admin.emergencias.edit', compact('emergencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emergencia  $emergencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emergencia $emergencia)
    {
        $request->validate([
            'nombre' => 'required',
            'color1' => 'required',
            'color2' => 'required',
        ]);

        if($emergencia->nombre != $request->nombre && $emergencia->color != $request->color1 && $emergencia->color2 != $request->color2) {
            $emergencia->save();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emergencia  $emergencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emergencia $emergencia)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $laboratorios = app\Laboratorio::orderby('nombre', 'asc')->get();
            return view('laboratorio.index', compact('laboratorios'));
        }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratorio.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar que llenen todos los campos
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);
        app\Laboratorio::create($request->all());
        return redirect()->route('laboratorio.index')
                ->with('exito', 'Se ha creado el laboratorio correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laboratorio = App\Laboratorio::findorfail($id);

        return view('laboratorio.view', compact ('laboratorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laboratorio = App\Laboratorio::findorfail($id);

        return view('laboratorio.edit', compact('laboratorio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'telefono' => 'required'
                ]);

        $laboratorio = App\Laboratorio::findorfail($id);

        $laboratorio->update($request->all());

        return redirect()->route('laboratorio.index')
                        ->with('exito','Laboratorio modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laboratorio = App\Laboratorio::findorfail($id);
        $laboratorio->delete('id');
        return redirect()->route('laboratorio.index')
                  ->with('exito','Laboratorio eliminado');
    }
}

<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    public function listar()
    {
        $hospitales = App\Hospital::orderBy('nombre', 'asc')->get();

        return response()->json([
            $hospitales
         ]);   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $hospitales = App\Hospital::orderby('nombre', 'asc')->get();
            return view('hospital.index', compact('hospitales'));
        }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (Gate::denies('crear-hospitales'))
        // {
        //     return redirect(route('hospital.index'));
        // }

       return view('hospital.create');
       
        // return view('hospital.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
            App\Hospital::create($request->all());
            return response()->json([ 
                'mensaje' => 'Creado'
            ]);
        }
        // Validar que llenen todos los campos
    //     $request->validate([
    //         'nombre' => 'required',
    //         'direccion' => 'required',
    //         'telefono' => 'required',
    //         'cantcamas' => 'required'
    //     ]);
    //     App\Hospital::create($request->all());
    //     return redirect()->route('hospital.index')
    //             ->with('exito', 'Se ha creado el hospital correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = App\Hospital::findorfail($id);

        return view('hospital.view', compact ('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = App\Hospital::findorfail($id);

        return response()->json([ 
            $hospital
        ]);

        // return view('hospital.edit', compact('hospital'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'cantcamas' => 'required'
                ]);

        $hospital = App\Hospital::findorfail($id);

        $hospital->update($request->all());

        return response()->json(
            ["mensaje" => "modificado"]
        );

        // return redirect()->route('hospital.index')
        //                 ->with('exito','Hospital modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = App\Hospital::findorfail($id);
        $hospital->delete('id');
        return redirect()->route('hospital.index')
                  ->with('exito','Hospital eliminado');
    }
}

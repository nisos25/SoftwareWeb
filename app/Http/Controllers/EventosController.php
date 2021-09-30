<?php

namespace App\Http\Controllers;

use App\Models\eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['eventos']=eventos::paginate(5);
        return view('Eventos.listar',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('Eventos.create');
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
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosevento = request()->except('_token');

        eventos::insert($datosevento);
        // return response()->json($datosProducto);

        return redirect('Eventos')->with('mensaje','Evento agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $producto=Eventos::findOrFail($id);
        return view('Eventos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>' :attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);
        $datos = request()->except(['_token','_method'] );
        Eventos::insert($datos);
        // return response()->json($datosProducto);

        return redirect('Eventos')->with('mensaje','Inversionita agregado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $producto=Eventos::findOrFail($id);
        Eventos::destroy($id);

         return redirect('Ofertas')->with('mensaje','Oferta borrada');
    }
}

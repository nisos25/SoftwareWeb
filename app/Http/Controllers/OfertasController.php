<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['ofertas']=DB::table('productocanastas')->where('descuento','>','0')->paginate(5);
        return view('Ofertas.listar',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Ofertas.create');
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
            'Cantidad'=>'required|string|max:100',
            'Descuento'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Imagen'=>'required|max:10000|mimes::jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>' :attribute es requerido',
            'Imagen.required'=>'La Imagen es requerida',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except('_token');

        if($request->hasFile('Imagen')){
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        Ofertas::insert($datosProducto);
        // return response()->json($datosProducto);

        return redirect('Ofertas')->with('mensaje','Oferta agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function show(Ofertas $ofertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $producto=Ofertas::findOrFail($id);
        return view('Ofertas.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Cantidad'=>'required|string|max:100',
            'Descuento'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>' :attribute es requerido',
        ];
        if($request->hasFile('Imagen')){
            $campos=['Imagen'=>'required|max:10000|mimes::jpeg,png,jpg',];
            $mensaje=['Imagen.required'=>'La Imagen es requerida'];
        }

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except(['_token','_method'] );

        if($request->hasFile('Imagen')){
            $producto=Ofertas::findOrFail($id);
            Storage::delete('public/'.$producto->Imagen);
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

        Ofertas::where('id','=',$id)->update($datosProducto);
        $producto=Ofertas::findOrFail($id);
        //return view('ProductoCanasta.edit',compact('producto'));
        return redirect('Ofertas')->with('mensaje','Oferta Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ofertas  $ofertas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $producto=Ofertas::findOrFail($id);
        if(Storage::delete('public/'.$producto->Imagen)){
            Ofertas::destroy($id);
        }

         return redirect('Ofertas')->with('mensaje','Oferta borrada');
    }
}

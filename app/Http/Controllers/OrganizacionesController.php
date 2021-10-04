<?php

namespace App\Http\Controllers;

use App\Models\Organizaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['organizaciones']=Organizaciones::paginate(5);
        return view('Organizaciones.listar',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Organizaciones.create');
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
            'Telefono'=>'required|string|max:100',
            'Imagen'=>'required|max:10000|mimes::jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>':attribute es requerido',
            'Imagen.required'=>'La Imagen es requerida',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except('_token');

        if($request->hasFile('Imagen')){
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        Organizaciones::insert($datosProducto);
        // return response()->json($datosProducto);

        return redirect('Organizaciones')->with('mensaje','Organizacion agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizaciones  $organizaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Organizaciones $organizaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizaciones  $organizaciones
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $Organizacion=Organizaciones::findOrFail($id);
        return view('Organizaciones.edit',compact('Organizacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organizaciones  $organizaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Ubicacion'=>'required|string',
            'Telefono'=>'required|string',
        ];
        $mensaje=[
            'required'=>':attribute es requerido',
        ];
        if($request->hasFile('Imagen')){
            $campos=['Imagen'=>'required|mimes::jpeg,png,jpg',];
            $mensaje=['Imagen.required'=>'La Imagen es requerida'];
        }

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except(['_token','_method'] );

        if($request->hasFile('Imagen')){
            $Organizacion=Organizaciones::findOrFail($id);
            Storage::delete('public/'.$Organizacion->Imagen);
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

        Organizaciones::where('id','=',$id)->update($datosProducto);
        $producto=Organizaciones::findOrFail($id);
        //return view('ProductoCanasta.edit',compact('producto'));
        return redirect('Organizaciones')->with('mensaje','Organizacion Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizaciones  $organizaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto=Organizaciones::findOrFail($id);
        if(Storage::delete('public/'.$producto->imagen)){
            Organizaciones::destroy($id);
        }

         return redirect('Organizaciones')->with('mensaje','Organizacion borrado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Inversionista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InversionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['Inversionistas']=Inversionista::paginate(5);
        return view('Inversionistas.listar',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Inversionistas.create');    
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
            'Descripcion'=>'required|string|max:100',
            'Correo'=>'required|string|max:100',
            'Imagen'=>'required|max:10000|mimes::jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>' :attribute es requerido',
            'Imagen.required'=>'La Imagen es requerida',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosinversionista = request()->except('_token');

        if($request->hasFile('Imagen')){
            $datosinversionista['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        Inversionista::insert($datosinversionista);
        // return response()->json($datosProducto);

        return redirect('Inversionista')->with('mensaje','Inversionita agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function show(Inversionista $inversionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $producto=Inversionista::findOrFail($id);
        return view('Inversionistas.edit',compact('producto'));
    }
       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
                //
                $campos=[
                    'Nombre'=>'required|string|max:100',
                    'Descripcion'=>'required|string',
                    'Correo'=>'required|string|max:100',
                ];
                $mensaje=[
                    'required'=>' :attribute es requerido',
                ];
                if($request->hasFile('Imagen')){
                    $campos=['Imagen'=>'required|mimes::jpeg,png,jpg',];
                    $mensaje=['Imagen.required'=>'La Imagen es requerida'];
                }
        
                $this->validate($request,$campos,$mensaje);
        
                $datosProducto = request()->except(['_token','_method'] );
        
                if($request->hasFile('Imagen')){
                    $producto=Inversionista::findOrFail($id);
                    //Storage::delete('public/'.$producto->Imagen);
                    $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
                }
        
                Inversionista::where('id','=',$id)->update($datosProducto);
                $producto=Inversionista::findOrFail($id);
                //return view('ProductoCanasta.edit',compact('producto'));
                return redirect('Inversionista')->with('mensaje','Inversionista Actualizado');
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
        $producto=Inversionista::findOrFail($id);
        if(Storage::delete('public/'.$producto->Imagen)){
            Inversionista::destroy($id);
        }

         return redirect('Inversionista')->with('mensaje','Inversionista borrado');
    }
}

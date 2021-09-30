<?php

namespace App\Http\Controllers;

use App\Models\productocanasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductocanastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productocanasta']=productocanasta::paginate(5);
        return view('ProductoCanasta.menu',$datos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ProductoCanasta.create');
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
            'Precio'=>'required|string|max:100',
            'Cantidad'=>'required|string|max:100',
            'Imagen'=>'required|max:10000|mimes::jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La Imagen es requerida',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except('_token');

        if($request->hasFile('Imagen')){
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        productocanasta::insert($datosProducto);
        // return response()->json($datosProducto);

        return redirect('ProductoCanasta')->with('mensaje','producto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productocanasta  $productocanasta
     * @return \Illuminate\Http\Response
     */
    public function show(productocanasta $productocanasta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productocanasta  $productocanasta
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $producto=productocanasta::findOrFail($id);
        return view('ProductoCanasta.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productocanasta  $productocanasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Cantidad'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        if($request->hasFile('Imagen')){
            $campos=['Imagen'=>'required|max:10000|mimes::jpeg,png,jpg',];
            $mensaje=['Imagen.required'=>'La Imagen es requerida'];
        }

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except(['_token','_method'] );

        if($request->hasFile('Imagen')){
            $producto=productocanasta::findOrFail($id);
            Storage::delete('public/'.$producto->Imagen);
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

        productocanasta::where('id','=',$id)->update($datosProducto);
        $producto=productocanasta::findOrFail($id);
        //return view('ProductoCanasta.edit',compact('producto'));
        return redirect('ProductoCanasta')->with('mensaje','Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productocanasta  $productocanasta
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $producto=productocanasta::findOrFail($id);
        if(Storage::delete('public/'.$producto->Imagen)){
            productocanasta::destroy($id);
        }

         return redirect('ProductoCanasta')->with('mensaje','Producto borrado');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Menu()
    {
        //
        $datos['productocanasta']=productocanasta::paginate(5);
        return view('ProductoCanasta.index',$datos);
    }

    public function Tienda()
    {
        $datos['productocanasta']=productocanasta::paginate(100);
        return view('ProductoCanasta.tienda',$datos);
    }

    public function Inversionistas()
    {
        return view('ProductoCanasta.inversionistas');
    }

    public function Emprendimientos(){
        return view('ProductoCanasta.emprendimientos');
    }
}

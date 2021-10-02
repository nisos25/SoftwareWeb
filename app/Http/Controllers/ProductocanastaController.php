<?php

namespace App\Http\Controllers;

use App\Models\productocanasta;
use App\Models\inversionista;
use App\Models\Organizaciones;
use App\Models\eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        $datos['Inversionistas']=inversionista::paginate(3);
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
        return redirect('Admin')->with('mensaje','Producto Actualizado');
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

         return redirect('Admin')->with('mensaje','Producto borrado');
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
        $datos['productocanasta']=eventos::paginate(5);
        return view('ProductoCanasta.index',$datos);
    }

    public function Tienda()
    {
        $datos['productocanasta']=productocanasta::paginate(100);
        return view('ProductoCanasta.tienda',$datos);
    }

    public function Inversionistas()
    {
        $datos['Inversionistas']=inversionista::paginate(50);
        return view('ProductoCanasta.inversionistas', $datos);
    }

    public function Emprendimientos(){
        $datos['Organizaciones']=Organizaciones::paginate(50);
        return view('ProductoCanasta.emprendimientos', $datos);
    }
    public function Ofertas(){
        $datos['productocanasta']=productocanasta::paginate(50);
        return view('ProductoCanasta.ofertasTienda',$datos);
    }
    public function OfertasDescuento(){
        $datos['productocanasta']=DB::table('productocanastas')->where('descuento','=','1')->paginate(5);
        return view('ProductoCanasta.ofertasTienda',$datos);
    }
}

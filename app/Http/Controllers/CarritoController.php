<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\productocanasta;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['carritos']=productocanasta::select('id_usuario','productocanastas.id','productocanastas.Nombre','productocanastas.imagen',
        'carritos.cantidad','productocanastas.precio','productocanastas.descuento')
        ->from('productocanastas')->join('carritos',function($query){
            $query->on('productocanastas.id','=','carritos.idprod');
        })->get();

        $total['total']=productocanasta::select('id_usuario','productocanastas.precio','carritos.cantidad')->from('productocanastas')->join('carritos',function($query){
            $query->on('productocanastas.id','=','carritos.idprod');
        })->get();
        return view('Carrito.listar',$datos,$total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$id_usuario)
    {
        //
        $producto=DB::insert('insert into carritos (idprod,id_usuario,cantidad) values (?,?,?)',[$id,$id_usuario,1]);
        return redirect('Tienda');
    }

    public function existe($id,$id_usuario)
    {
        $producto=DB::table('carritos')->where('id_usuario','=',$id_usuario,'and')->where('idprod','=',$id)->get();

        if(count($producto)>0){
            $this->actualizar($id, $id_usuario);
        }else{
            $this->create($id,$id_usuario);
        }

         return redirect('Tienda');
    }
    public function actualizar($id, $idUser){
         $datos=DB::update('update carritos set cantidad = cantidad+1 where idprod=? and id_usuario=?',[$id,$idUser]);
         return redirect('Tienda');
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
            'Precio'=>'required|int|max:100',
        ];
        $mensaje=[
            'required'=>':attribute es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosProducto = request()->except(['_token','_method'] );

        carrito::insert($datosProducto);
        //return view('ProductoCanasta.edit',compact('producto'));
        return redirect('AdminHome2')->with('mensaje','Producto Actualizado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(carrito $carrito)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idUser)
    {
        //
        DB::delete('DELETE FROM  carritos WHERE idprod=? and id_usuario=?',[$id, $idUser]);
        return redirect('Carrito')->with('mensaje','Producto Eliminado');
    }

    public function totalPagar(){
        //
        $datos['totalpagar']=productocanasta::SELECT('productocanastas.precio','carritos.cantidad')->from('productocanastas')->join('carritos',function($query){
            $query->on('productocanastas.id','=','carritos.idprod');
        })->get();
        return $datos;
    }
}

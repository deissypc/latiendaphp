<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       echo "aqui va la lista de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //SELECCIONAR MARCAS
        $marcas = Marca::all();
        //SELECCIONAR Categorias
        $categorias = Categoria::all();
        //mostrar

        return view('productos.new')
         ->with('categorias' , $categorias)
         ->with('marcas' , $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //crear el objeto uploadedfile
      $archivo = $request->imagen;
      //capturar nombre "original" del archivo
      // desde el cliente
      $nombre_archivo = $archivo->getClientOriginalName();
      var_dump($nombre_archivo);
      //mover el archivo a la carpeta "public/img"
      $ruta = public_path();
      var_dump($ruta);
      $archivo->move("$ruta/img", $nombre_archivo);
      //registrar producto
      $producto = new Producto;
      $producto->nombre = $request->nombre;
      $producto->descripcion = $request->descripcion;
      $producto->precio = $request->precio;
      $producto->imagen = $request->imagen;
      $producto->marca_id = $request->marca;
      $producto->categoria_id = $request->categoria;
      $producto->save();
      echo "producto registrado";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
       echo "aqui va el detalle de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va el form para editar el produto coin id: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

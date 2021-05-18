<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;

use App\Http\Requests\ProductoRequest;

class Productos extends Controller
{
    public function index(){

        $productos = Producto::simplePaginate(3);

        return view('index',compact('productos'));
    }

    public function crear(){

        return view('crear');

    }

    public function store(ProductoRequest $request){


        $input = $request->input();


        $producto = isset($input['id']) ? Producto::find( $input['id']) : new Producto();

        $producto->nombre = $input['nombre'];
        $producto->descripcion = $input['descripcion'];
        $producto->save();



        return redirect()->route('productos-index');

    }

    public function ver ($id){


        $producto = Producto::find($id);


        return view('ver',compact('producto'));


    }

    public function editar($id){
        $producto = Producto::find($id);


        return view('editar',compact('producto'));
    }

    public function borrar($id){
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->route('productos-index');
    }

    public function filtrar(Request $request){

        $productos = Producto::query();

        $input = $request->input();


        if(isset($input['nombre']) ){
            $productos->where('nombre','LIKE', '%' .$input['nombre'] . '%');
        }
        if(isset($input['descripcion'])){
            $productos->where('descripcion','LIKE', '%' .$input['descripcion'] . '%');
        }
        $productos = $productos->get();

        
        return view('_productos', compact('productos'));
    }
}

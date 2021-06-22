<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
Use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
// use App\Models\Proveedor;
use App\Models\Categoria;
// use App\Models\venta;
// use App\Models\detalle_venta;




class productosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tableProductos = DB::table('productos')
        ->join('categorias', 'productos.categorias_id', '=', 'categorias.id')
        ->select('productos.*', 'categorias.nombre as categorias')
        ->get();


        $whereClause = [];
		if($request->nombre){
			array_push($whereClause, [ "nombre" ,'like', '%'.$request->nombre.'%' ]);
		}
		$tableProductos = Productos::orderBy('nombre')->where($whereClause)->get();
		return view('Productos.index', ["tableProductos" => $tableProductos, "filtroNombre" => $request->nombre ]);


        return view('Productos.index', ["tableProductos" =>  $tableProductos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tableProductos = Categoria::orderBy('nombre')->get()->pluck('nombre','id');        
        return view('Productos.create',[ 'tableProductos' => $tableProductos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:5|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|min:1|max:4',
            
        ]);

        $mProductos = new Productos($request->all());
        if($request->status){
            $mProductos->status = true; 
        } else {
            $mProductos->status = false;
        }

        $mProductos->save();

        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mProductos->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mProductos->imgNombreVirtual = $imgNombreVirtual;
        $mProductos->imgNombreFisico = $imgNombreFisico;
        $mProductos->save();
        }
        // Regresa a lista de productos
        Session::flash('message', 'Producto registrado');
        return Redirect::to('Productos');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $modelo = Productos::find($id);
        return view('Productos.show', ["modelo" => $modelo]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Productos::find($id);
        $tableProductos = Categoria::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Productos.edit', ["modelo" => $modelo, "tableProductos"=>$tableProductos, 'tableProductosP' => $tableProductosP]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:10|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|min:1|max:4',
            'categorias_id' => 'required|exists:categorias,id'
            
        ]);

        $mProductos = Productos::find($id);
        $mProductos->fill($request->all());
        if($request->status){
            $mProductos->status = true; 
        } else {
            $mProductos->status = false;
        }

        $mProductos->save();

        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mProductos->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mProductos->imgNombreVirtual = $imgNombreVirtual;
        $mProductos->imgNombreFisico = $imgNombreFisico;
        $mProductos->save();
        }
        // Regresa a lista de productos
        Session::flash('message', 'Producto actualizado');
        return Redirect::to('Productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mProductos = Productos::find($id);
        $mProductos->delete();
        Session::flash('message', 'Producto eliminado');
        return Redirect::to('Productos');
    }
    public function agregarCarrito(Request $request) {
        $carrito = $request->session()->get('carrito');
        if(!$carrito){
        $carrito = [];
        }

        if($request->cantidad <1){
            return Redirect()->route('Carrito.index')->withErrors(['Stock' => 'La cantidad minima debe de ser 1 '])->withInput();
            }

        array_push($carrito, [
        'id' => $request->id,
        'cantidad' =>intval($request->cantidad),
        'precio' => intval($request->precio),
        'nombre' => $request->nombre
        ] );
        $request->session()->put('carrito', $carrito);
        // echo var_dump($carrito);

        Session::flash('message', 'Producto agregado');
        return Redirect::to('Productos');


        }


        public function ConcretarVenta(Request $request) {
        $carrito = $request->session()->get('carrito');
        if(!$carrito){
        $carrito = [];
        }

// registro de la venta

        foreach ($carrito as $value) {
           

            $producto=Productos::find($value['id']);
            $producto->stock-=($value['cantidad']);

            if($producto->stock <0){
            return Redirect()->route('Carrito.index')->withErrors(['Stock' => 'No hay existencias suficientes del producto '.$producto->nombre])->withInput();
            }
    
        }
// validacion de existencias
        $venta=new venta();
        $venta->user_id=\Auth::user()->id;
        $venta->total=0;
        $venta->save();

      foreach ($carrito as $value) {
            $detalle_venta=new detalle_venta();
            $detalle_venta->cantidad=$value['cantidad'];
            $detalle_venta->productos_id=$value['id'];
            $detalle_venta->venta_id=$venta->id;
            $detalle_venta->precio=$value['precio'];
            $detalle_venta->save();

            $venta->total+=($value['precio']*$value['cantidad']);


            $juego=Productos::find($value['id']);
            $juego->stock-=($value['cantidad']);
            $juego->save();
        }



        $venta->save();
//descontar del inventario 

        $request->session()->put('carrito',[]);
        // echo var_dump($carrito);

        Session::flash('message', 'Venta concretada');
        return Redirect::to('Productos');

        }




        
       
    
}


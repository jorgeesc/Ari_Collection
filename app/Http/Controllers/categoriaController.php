<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class categoriaController extends Controller
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
    public function index()
    {
        $tableCategoria = Categoria::all();
        return view('Categoria.index',["tableCategoria" => $tableCategoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categoria.create');
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
            'nombre' => 'required|min:5|max:30'
        ]);

        $mCategoria = new Categoria($request->all());
        
        $mCategoria->save();

        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mCategoria->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mCategoria->imgNombreVirtual = $imgNombreVirtual;
        $mCategoria->imgNombreFisico = $imgNombreFisico;
        $mCategoria->save();
    }


        // Regresa a lista de productos
        Session::flash('message', 'Categoria registrada');
        return Redirect::to('Categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Categoria::find($id);
        return view('Categoria.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Categoria::find($id);
        $tableCategoria = Categoria::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Categoria.edit', ["modelo" => $modelo, "tableCategoria"=> $tableCategoria]);

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:5|max:30',
 
        ]);

        $mCategoria = Categoria::find($id);
        $mCategoria->fill($request->all());

        $mCategoria->save();
        
        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mCategoria->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mCategoria->imgNombreVirtual = $imgNombreVirtual;
        $mCategoria->imgNombreFisico = $imgNombreFisico;
        $mCategoria->save();
        }
        Session::flash('message', 'Categoria actualizada');
        return Redirect::to('Categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mCategoria = Categoria::find($id);
        $mCategoria->delete();
        Session::flash('message', 'Categoria eliminada');
        return Redirect::to('Categoria');
    }
}

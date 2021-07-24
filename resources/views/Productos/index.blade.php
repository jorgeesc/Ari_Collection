@extends('layouts.admin')
@section('content')
@if( \Auth::user()->rol_id== 2 )

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Juegos') }}</legend>
<div class="card-body">

<a href="{{route('Productos.create')}}">Registrar Producto</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif

<form>
<div class="row">
<div class="form-group col-md-3">
<label for="nombre">Filtrar por nombre</label>
<input type="text" name="nombre" value="{{$filtroNombre}}" class="form-control">
</div>
</div>
<button>Buscar</button>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>status</th>
            <th>stock</th>
            <th>Portada</th>
            <th>Categoria</th>
            <th>Proveedor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableProductos as $rowProductos)
            <tr>
                <td>
                    <a href="{{route('Productos.show', $rowProductos->id)}}">{{$rowProductos->nombre}}</a>
                </td>
                <td>{{$rowProductos->descripcion}}</td>
                <td>{{$rowProductos->precio}}</td>
                <td>{{$rowProductos->status}}</td>
                <td>{{$rowProductos->stock}}</td>
                
                <td>
                        <img src="{{ asset('storage/'.$rowProductos->imgNombreFisico )}}" width="50">
                    </td>
                <td>{{$rowProductos->getCategoria->nombre}}</td>
                <td>{{$rowProductos->getProveedor->nombre}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
                </div>
        </div>
    </div>
</div>



@endif
@endsection

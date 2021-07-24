@extends('layouts.usuario')
@section('content')
@if( \Auth::user()->rol_id== 2 )

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Juegos') }}</legend>
<div class="card-body">

<a href="{{route('Productos.index')}}">Inicio</a> <br><br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Información del Producto</th>
            <th>
                {{ Form::open(array('url' => route('Productos.destroy', $modelo->id), 'class' => 'pull-right')) }}
                    <a class="btn btn-primary" href="{{route('Productos.edit', $modelo->id)}}">Editar</a>
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </th>
        </tr>
    </thead>
    <tbody>
            <tr><td> Nombre del Producto </td> <td>{{$modelo->nombre}}</td></tr>
            <tr><td> Descripción </td> <td>{{$modelo->descripcion}}</td></tr>
            <tr><td> Precio </td> <td>{{$modelo->precio}}</td></tr>
            <tr><td> Estatus </td> <td> @if($modelo->status) Sí @else No @endif </td></tr>
            <tr><td> Stock </td> <td>{{$modelo->stock}}</td></tr>
            <tr><td> Cat </td> <td>{{$modelo->getCategoria->nombre}}</td></tr>
           
            <tr><td> Fecha de registro </td> <td>{{$modelo->created_at}}</td></tr>
            <tr><td> Fecha de modificación </td> <td>{{$modelo->updated_at}}</td></tr>
    </tbody>

</table>

</div>
                </div>
        </div>
    </div>
</div>

@else

<div class="social1">
    <ul>
      <li><a href="https://www.facebook.com/Bolsas-Ari-Collection-392119227638056/" target="_blank" class="icon-facebook2"></a></li>
      <li><a href="https://www.instagram.com/bolsas_ari_collection/" target="_blank" class="icon-instagram"></a></li>
      <li><a href="mailto:modayestilo.ari@gmail.com" class="icon-google-plus2"></a></li>
    </ul>
  </div>
<div class="containerr">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <center><h2><div style="font-family:cursive,sans-serif;background-color: #ff388d;" class="card-header text-white">{{$modelo->nombre}}</div></h2></center>


<div class="card-body">
	<a class="btn-lg text-white" style="font-family:cursive,sans-serif;background-color:#ff388d;" href="{{route('Productos.index')}}">Inicio</a> <br><br>

          <center><td><img src="{{ asset('storage/'.$modelo->imgNombreFisico )}}" width="90%"></td></center><br>
            <h5 style="font-family:cursive,sans-serif; color: #ff388d;">Descripción:</td> <td>{{$modelo->descripcion}}<br></h5>
             <h5 style="font-family:cursive,sans-serif; color: #ff388d;">Precio: </td> <td>{{$modelo->precio}}<br></h5>
             <h5 style="font-family:cursive,sans-serif; color: #ff388d;">Stock: </td> <td>{{$modelo->stock}}<br></h5>
             <h5 style="font-family:cursive,sans-serif; color: #ff388d;">Cat: </td> <td>{{$modelo->getCategoria->nombre}}<br></h5>
             


       
</div>
                </div>
        </div>
    </div>
</div>




@endif

@endsection

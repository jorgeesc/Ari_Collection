@extends('layouts.admin')
@section('content')
@if( \Auth::user()->rol_id== 2 )

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Productos') }}</div>
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
                        <img src="{{ asset('storage/'.$rowProductos->imgNombreFisico )}}" width="30%">
                    </td>
                <td>{{$rowProductos->getCategoria->nombre}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
                </div>
        </div>
    </div>
</div>


@else

@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif

<div class="container">
    <div class="row justify-content-center">
        
            <div class="card">
                <center><div class="card-header"><h1>{{ __('Catálogo de Productos') }}</h1></div></center>
<div class="card-body">
<div class ="row">


 @foreach($tableProductos as $rowProductos)
    <div class="col-md-6">
<center><figure class="figure">
  <a href="{{route('Productos.show', $rowProductos->id)}}" data-size="1200x1017"><h1>{{$rowProductos->nombre}}</h1>
  <img src="{{ asset('storage/'.$rowProductos->imgNombreFisico )}}" class="figure-img img-fluid rounded" width="90%" height="100px" alt="...">  
</figure>
</a>

<h6>{{$rowProductos->genero}}</h6>
<td>
{{ Form::open(['url' => 'agregarCarrito'] ) }}
{{ Form::hidden('id', $rowProductos->id ,
array('class' => 'form-control')) }}

{{ Form::hidden('nombre', $rowProductos->nombre ,
array('class' => 'form-control'))}} <br>  

{{ Form::hidden('precio', $rowProductos->precio ,
array('class' => 'form-control')) }} <br>

{{ Form::text('cantidad', 1 ,
array('class' => 'form-control', 'required'=>true)) }} <br>
{{ Form::submit('Agregar al carrito',['class' => 'btn btn-primary btn-lg btn-block', 'data-toggle'=>"modal",'data-target'=>"#exampleModal" , 'role' => 'button' , 'aria-pressed' => 'true'] ) }}
{{ Form::close()}}
</td>
</center>
<br>                
<a href="{{route('Productos.show', $rowProductos->id)}}" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">Detalle de Producto</a>
                </div>
        
        
@endforeach


    </div>
            </div>
        </div>
    </div>
</div>




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catalogo de Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Juego agregado con exito!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






@endif
@endsection

@extends('layouts.usuario')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <center><h2><div style="font-family:cursive,sans-serif;background-color: #ff388d;" class="card-header text-white">{{ __('Detalle de Compras') }}</div></h2></center>
<div class="card-body">

<div>

    <div class="social1">
    <ul>
      <li><a href="https://www.facebook.com/Bolsas-Ari-Collection-392119227638056/" target="_blank" class="icon-facebook2"></a></li>
      <li><a href="https://www.instagram.com/bolsas_ari_collection/" target="_blank" class="icon-instagram"></a></li>
      <li><a href="mailto:modayestilo.ari@gmail.com" class="icon-google-plus2"></a></li>
    </ul>
  </div>


<h5>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif

{{HTML::ul($errors->all())}}
</h5>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Producto</th>
            <th>precio</th>
            <th>cantidad</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach($carrito as $rowcarro)
        <tr>
            <td>{{$rowcarro['nombre']}}</td>
            <td>{{$rowcarro['precio']}}</td>
            <td>{{$rowcarro['cantidad']}}</td>


        </tr>


        @endforeach

        <td>
          <b class="total">Total: $<?php echo number_format($venta->total, 2);?></b>
        </td>

    </tbody>
</table>

    {{ Form::open(['url' => 'ConcretarVenta'] ) }} <br>

{{ Form::submit('Concretar venta',['class' => 'btn btn-info' , 'role' => 'button' , 'aria-pressed' => 'true'] ) }}
{{ Form::close()}} <br>


{{ Form::open(['url' => 'quitarCarrito'] ) }}

{{ Form::submit('  Vaciar Carrito  ',['class' => 'btn btn-warning' , 'role' => 'button' , 'aria-pressed' => 'true'] ) }}
{{ Form::close()}}
</div>
                </div>
        </div>
    </div>
</div>

@endsection

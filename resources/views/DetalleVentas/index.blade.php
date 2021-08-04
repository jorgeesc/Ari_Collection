@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Detalle de ventas') }}</legend>
<div class="card-body">

@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<div class="panel-body p-20">
<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
  
            <th>precio</th>
            <th>cantidad</th>
            <th>producto</th>
            <th>ID de venta</th>
            <th>Fecha</th>
       
        </tr>
    </thead>
    <tbody>
        @foreach($tableDetalleVentas as $rowDetalleVenta)
            <tr>

                <td>
                    {{$rowDetalleVenta->precio}}
                </td>

                <td>
                    {{$rowDetalleVenta->cantidad}}
                </td>

                <td>
                    {{$rowDetalleVenta->getProductos->nombre}}
                   
                </td>

                <td>
                    {{$rowDetalleVenta->venta_id}}
                </td>

                <td>
                    {{$rowDetalleVenta->getVenta->created_at}}
                </td>

              
            </tr>

        
        @endforeach
    </tbody>
</table>
</div>
                </div>
        </div>
    </div>
</div>




@endsection

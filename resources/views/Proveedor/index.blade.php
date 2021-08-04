@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Proveedor') }}</legend>
<div class="card-body">
    
<a href="{{route('Proveedor.create')}}" class="btn-sm btn-info">Registrar Proveedor</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<div class="panel-body p-20">
<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Proveedor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableProveedor as $rowProveedor)
            <tr>
                <td>
                    <a href="{{route('Proveedor.show', $rowProveedor->id)}}">{{$rowProveedor->nombre}}</a>
                </td>

                  <td>
                    {{$rowProveedor->telefono}}</a>
                </td>

                <td>
                        <img src="{{ asset('storage/'.$rowProveedor->imgNombreFisico )}}" width="20%">
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

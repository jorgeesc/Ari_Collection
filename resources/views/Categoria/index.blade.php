@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-info mb-3" style="max-width: 65rem; , max-heigth: 60rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Categoría') }}</legend>
<div class="card-body">
    
<a href="{{route('Categoria.create')}}">Registrar Categoria</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableCategoria as $rowCategoria)
            <tr>
                <td>
                    <a href="{{route('Categoria.show', $rowCategoria->id)}}">{{$rowCategoria->nombre}}</a>
                </td>
                <td>
                        <img src="{{ asset('storage/'.$rowCategoria->imgNombreFisico )}}" width="20%">
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

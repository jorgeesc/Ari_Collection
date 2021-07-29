@extends('layouts.admin')
@section('content')
@if( \Auth::user()->rol_id== 2 )

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Publicidad') }}</legend>
<div class="card-body">
    
<a href="{{route('Noticias.create')}}">Registrar Publicidad</a> <br> <br>
@if(Session::has('message'))
      {{ Session::get('message') }} <br><br>
@endif
<table class="table table-striped justify-content-center">
    <thead>
        <tr>
            <th>Nombre</th> 
            <th>Fuente</th>
            <th>Portada</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableNoticias as $rowNoticias)
            <tr>
                <td><a href="{{route('Noticias.show', $rowNoticias->id)}}">{{$rowNoticias->nombre}}</a></td>
                <td>{{$rowNoticias->fuente}}</td>
                <td>
                        <a href="{{route('Noticias.show', $rowNoticias->id)}}"><img src="{{ asset('storage/'.$rowNoticias->imgNombreFisico )}}" width="20%"></a>
                    </td>
            </tr>
             </tbody>
        @endforeach
   
</table>
</div>
                </div>
        </div>
    </div>
</div>
@endif
@endsection

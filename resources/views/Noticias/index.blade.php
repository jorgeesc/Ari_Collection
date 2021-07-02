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
            <th>Descripción</th>
            <th>Fuente</th>
            <th>Portada</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tableNoticias as $rowNoticias)
            <tr>
                <td><a href="{{route('Noticias.show', $rowNoticias->id)}}">{{$rowNoticias->nombre}}</a></td>
                <td>
                    {{$rowNoticias->descripcion}}
                    
                </td>
                <td>{{$rowNoticias->fuente}}</td>
                <td>
                        <a href="{{route('Noticias.show', $rowNoticias->id)}}"><img src="{{ asset('storage/'.$rowNoticias->imgNombreFisico )}}" width="20%"></a>
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

@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
<div class="card-header"><center><h1>Breaking News</h1></center></div>
<div class="card-body">
@foreach($tableNoticias as $rowNoticias)
                <hr><center><td><h2>{{$rowNoticias->nombre}}</h2></td></center><br>
<tbody> 

    <center><tr>
                <td>
                    <img src="{{ asset('storage/'.$rowNoticias->imgNombreFisico )}}" width="30%">
                </td><br>
                <th>Desarrollo </th><td>{{$rowNoticias->descripcion}}</td><br>
                <th>Fuente </th><td>{{$rowNoticias->fuente}}</td>
            </tr>
            </center>
        @endforeach
    </tbody>

@endif
</div>
                </div>
        </div>
    </div>
</div>
@endsection

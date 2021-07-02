@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                  <legend class="card header text-white bg-info mb-2 text-center">{{ __('Categoría') }}</legend>
<div class="card-body">

<a href="{{ route('Categoria.show', $modelo->id) }}">Regresar</a> <br> <br>

<h5>Formulario de actualización</h5>

{{ HTML::ul($errors->all()) }}

{{ Form::model( $modelo, array('route' => array('Categoria.update', $modelo->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data' ) ) }}


<div class="row">

    <div class="form-group col-md-4">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', null, 
           array('class' => 'form-control', 'required'=>true)) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('imagen', 'Imagen')}} <br>
        {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg"]) }} <br>
    </div>

</div>


    {{ Form::submit('Actualizar Categoria', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
                </div>
        </div>
    </div>
</div>

@endsection
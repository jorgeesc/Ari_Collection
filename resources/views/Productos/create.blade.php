@extends('layouts.admin')
@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info mb-3" style="max-width: 65rem;">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Creación de Productos') }}</legend>
                    <div class="card-body text-info">
                        <a href="{{URL::to('Productos')}}"> Regresar</a><br><br>
                            {{HTML::ul($errors->all())}}

                            {{Form::open(['url'=> 'Productos', 'enctype' => 'multipart/form-data'])}}
                        <fieldset>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-left"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('nombre', 'Nombre del Producto') }}
                                    {{ Form::text('nombre', Request::old('nombre'),
                                        array('class' => 'form-control', 'required'=>true, 'maxlength'=> 30)) }}
                                </div>    
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-envelope-open-text bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('descripcion', 'Descripción del Producto') }} <br>
                                    {{ Form::textArea('descripcion', Request::old('descripcion'),
                                        array('class' => 'form-control', 'required'=>true, 'maxlength'=> 200, 'rows'=>2)) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('precio', 'Precio') }}
                                    {{ Form::number('precio', Request::old('precio'), 
                                        array('class' => 'form-control', 'required'=>true, 'step'=>'.01')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-user-tag bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('stock', 'Existencias') }}
                                    {{ Form::number('stock', Request::old('stock'), 
                                        array('class' => 'form-control', 'required'=>true)) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('status', 'Estatus') }}
                                    {{ Form::checkbox('status', Request::old('status'), false,  
                                        array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('imagen', 'Imagen')}} <br>
                                    {{ Form::file('imagen', ['accept'=>"image/x-png,image/gif,image/jpeg"]) }}<br>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('categorias_id', 'Categoria del Producto') }}
                                    {{ Form::select('categorias_id', $tableProductos, Request::old('categorias_id'),  
                                        array('class' => 'form-control')) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-4 text-center"><i class="fa fa-key bigicon"></i></span>
                                <div class="col-md-8">
                                    {{ Form::label('proveedor_id', 'proveedor') }}
                                    {{ Form::select('proveedor_id', $tablePProductos, Request::old('proveedor_id'),  
                                        array('class' => 'form-control')) }}
                                </div>
                            </div> 

                            <div class="form-group">
                                <div class="col-md-12 text-left">
                                    {{ Form::submit('Registrar Producto', ['class' => 'btn btn-success'] ) }}
                                    <div class="modal" tabindex="-1" role="dialog">
                                    {{Form::close()}}
                                </div>
                            </div>
                        </fieldset>
            </div>
        </div>
    </div>
</div>

@endsection

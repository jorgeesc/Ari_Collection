@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <legend class="card header text-white bg-info mb-2 text-center">{{ __('Actualización de usuario') }}</legend>
<div class="card-body">

<a href="{{route('users.create')}}" class="btn-sm btn-info">Registrar usuario</a>
<br><br>
@if(Session::has('message'))

{{Session::get('message')}}<br><br>

@endif

<form>
<div class="row">
<div class="form-group col-md-3">
<label for="nombre">Filtrar por nombre</label>
<input type="text" name="nombre" value="{{$filtroNombre}}" class="form-control">
</div>
</div>
<button class="btn-lg btn-success">Buscar</button>
</form>

<div class="panel-body p-20">
<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
		<tr>
			<th>Nombre</th><br>
			<th>Correo</th>
			<th>Rol</th>
		</tr>
</thead> 
<tbody>
	@foreach($tableUsers as $rowUser)
	<tr>
		<td>
            <a href="{{route('users.show', $rowUser->id)}}">{{$rowUser->name}}</a>
        </td>
		
		<td>{{$rowUser->email}}</td>
		<td>{{$rowUser->getRol->nombre}}</td>


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
@extends('layouts.usuario')
@section('content')
@if( \Auth::user()->rol_id== 1 )

@if(Session::has('message'))
      {{ Session::get('message') }} 
@endif

  <div class="social1">
    <ul>
      <li><a href="https://www.facebook.com/Bolsas-Ari-Collection-392119227638056/" target="_blank" class="icon-facebook2"></a></li>
      <li><a href="https://www.instagram.com/bolsas_ari_collection/" target="_blank" class="icon-instagram"></a></li>
      <li><a href="mailto:modayestilo.ari@gmail.com" class="icon-google-plus2"></a></li>
    </ul>
  </div>

<div class="container">

<center><h2><div style="font-family:cursive,sans-serif;background-color: #ff388d;" class="card-header text-white">{{ __('Catálogo de Productos') }}</div></h2></center>




    <div class="row">

 @foreach($tableProductos as $rowProductos)



 <div class="col-md-4 col-sm-7">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" >
                        <img  class="pic-1" src="{{ asset('storage/'.$rowProductos->imgNombreFisico )}}" > 
                        
                    </a>
                    <ul class="social">
                        <li><a href="{{route('Productos.show', $rowProductos->id)}}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">Venta</span>
            
                </div>
               
                <div class="product-content">
                    <h3 class="title">{{$rowProductos->nombre}}</h3>
                    <div class="price">{{$rowProductos->precio}}
                    
                    </div>
                    {{ Form::open(['url' => 'agregarCarrito'] ) }}
                    {{ Form::hidden('id', $rowProductos->id ,
array('class' => 'form-control')) }}

                    {{ Form::submit('Agregar al carrito',['class' => ' btn-lg btn-info add-to-cart ', 'data-toggle'=>"modal",'data-target'=>"#exampleModal" , 'role' => 'button' , 'aria-pressed' => 'true'] ) }}

                
                </div>
            </div>
            {{ Form::number('cantidad', 1 ,
array('class' => 'form-control', 'id'=>'cantidad', 'onchange'=>'javascript: validaDias();', 'value'=>'1', 'min'=>'1', 'required'=>true)) }} 
 <br><br>
        </div>

        {{ Form::hidden('nombre', $rowProductos->nombre ,
array('class' => 'form-control'))}} <br>  

{{ Form::hidden('precio', $rowProductos->precio ,
array('class' => 'form-control')) }} <br>



        {{ Form::close()}}
        
@endforeach

   </div>

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
        Producto agregado con exito!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</div>
@endif
@endsection

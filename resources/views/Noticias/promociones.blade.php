@extends('layouts.usuario')
@section('content')
@if( \Auth::user()->rol_id== 1 )


@foreach($tableNoticias as $rowNoticias)

<div class="col-md-6 col-sm-10">
            <div class="product-grid">
                <div class="product-image">
                    <center><h4><div style="font-family:cursive,sans-serif;background-color: #ff388d;" class="card-header text-white">{{$rowNoticias->nombre}}</div></h4></center>
                
                        <br>
                    <a href="#" >
                        <img src="{{ asset('storage/'.$rowNoticias->imgNombreFisico )}}" width="30%"> 
                        
                    </a>
                   
       
            
                </div>
               
                <div class="product-content">
                    <h3 class="title">{{$rowNoticias->descripcion}}</h3>
                    <div class="price">{{$rowNoticias->fuente}}
                    
                    </div>

                </div>
            </div>

        </div>











        @endforeach


@endif
</div>
                </div>
        </div>
    </div>
</div>


@endsection

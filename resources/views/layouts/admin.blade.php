<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title class="ee">Ari Collection</title>
        
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/toastr/toastr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/stylesG.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/carga.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <div id="contenedor_carga">
            <div id="carga"></div>
        </div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" style="color:yellow;" href="home">ARI COLLECTION</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @if( \Auth::user()->rol_id== 2 )

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Roles.index') }}">Roles</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('users.index') }}">Usuarios</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Categoria.index') }}">Categorias</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Proveedor.index') }}">Proveedores</a></li>
                        
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Productos.index') }}">Productos</a></li>
                        
                         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Noticias.index') }}">Publicidad</a></li>

                         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('DetalleVentas.index') }}">Ventas</a></li>
                        
                        @else

                        
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Productos.index') }}">Productos</a></li>

                         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Noticias.index') }}">Noticias</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Conocenos.index') }}">Conocenos</a></li>

                          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('Carrito.index') }}">Carrito</a></li>
                        
                        @endif
                          @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesi??n') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                           

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('users.show', \Auth::user()->id)}}";>
                                        {{ __('Perfil') }}
                                    </a>

                                 <!--    <a class="dropdown-item" href="{{route('Ventas.index', \Auth::user()->id)}}";>
                                        {{ __('M Compras') }}
                                    </a> -->
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesi??n') }}
                                    </a>
                                    
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->


        <section class="signup-admin">
            <div class="container">
                <!-- Featured Project Row-->
                <div class="row">
                   @yield('content')
                  
                </div>
                <!-- Project Two Row-->
         
            </div>
        </section>




        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright ?? Ari Collection 2021</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/toastr/toastr.min.js"></script>


        <script type="text/javascript">
        

                window.onload = function(){
    var contenedor = document.getElementById('contenedor_carga');

    contenedor.style.visibility = 'hidden';
    contenedor.style.opacity = '0';
}
        </script>
    </body>
</html>

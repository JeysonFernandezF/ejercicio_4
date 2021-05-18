<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  
                    @guest
                    <a class="btn nav-link" href="{{route('index')}}" >Iniciar Sesión</a>
                    @else
                    <a class="btn nav-link" href="{{route('logout')}}" >Logout</a>
                    @endguest
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="productos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Productos
                  </a>
                  <div class="dropdown-menu" aria-labelledby="productos">
                    <a class="dropdown-item" href="{{route('productos-index')}}">Inicio</a>
                    <a class="dropdown-item" href="{{route('crear-producto')}}">Crear</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>

          <section>
            <div class="container">

                <div class="row mt-5 ">
                    <div class="col-12">
                            <h3>Productos</h3>
                            <div class="form-row">
                              <div class="form-group col-md-5">
                                <label for="input_nombre">Nombre</label>
                                <input type="text" class="form-control" id="input_nombre" placeholder="Nombre">
                              </div>
                              <div class="form-group col-md-5">
                                <label for="input_descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="input_descripcion" placeholder="Descripcion">
                              </div>
                             
                              <div class="form-group col-md-2 " style="margin-top: 31px ">
                              <button type="submit" id="buscar" class="btn btn-primary">Buscar</button>
                              </div>
                            </div>     

                    </div>

                </div>

                <div class="row " id="row-productos">
                    @isset($productos)
                     @include('_productos', ['productos' => $productos])
                    @endisset
                    
                    <div class="col-12 mt-5">
                        {{ $productos->links() }}
                    </div>
                </div>
                
                
            </div>


          </section>
        

          <script src="{{ asset('js/app.js') }}"></script>
          <script>
                $("#buscar").on('click',function(){


                    $.ajax({
                        url: "{{route('filtrar-productos')}}",
                        type:'get',
                        data:{
                            nombre: $('#input_nombre').val(),
                            descripcion: $('#input_descripcion').val(),
                        },
                        beforeSend:function(){
                            $("#buscar").html('Cargando...');
                        },
                        success:function(response){
                            console.log(response);
                            $("#row-productos").html(response);
                        },
                        complete:function(response){

                            $("#buscar").html('buscar');
                        }
                    });
                });
          </script>
    </body>
</html>

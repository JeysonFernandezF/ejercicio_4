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

                <div class="row mt-5">
                    
                    <div class="col-12">
                        <div class="card" style="width: 80%;">
                            <div class="card-body">
                              <h5 class="card-title">{{$producto->nombre}}</h5>
                              <p class="card-text">{{$producto->descripcion}}</p>
                              <a class="btn btn-success" href="{{route('editar-producto', [ 'id' => $producto->id])}}" class="card-link">Editar</a>
                              <a class="btn btn-danger" href="{{route('borrar-producto', [ 'id' => $producto->id])}}" class="card-link">Borrar</a>
                            </div>
                          </div>
                    </div>
                </div>

            </div>


          </section>
        

          <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

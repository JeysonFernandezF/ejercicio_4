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

                <div class="row">
                    <div class="col-12 mt-5 card">
                        <h2>Crear Producto</h2>
                        <form action="{{route('guardar-producto')}}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-5">
                                <label for="input_nombre">Nombre</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" name="nombre" id="input_nombre" placeholder="Nombre">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @else
                                    <small id="emailHelp" class="form-text text-muted">Porfavor ingresa un nombre</small>
                                @enderror
                              </div>
                              <div class="form-group col-md-5">
                                <label for="input_descripcion">Descripcion</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}" name="descripcion" id="input_descripcion" placeholder="Descripcion">
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @else
                                    <small id="emailHelp" class="form-text text-muted">Porfavor ingresa una descripción</small>
                                @enderror
                              </div>
                             
                              <div class="form-group col-md-2 " style="margin-top: 31px ">
                              <button type="submit" class="btn btn-primary">Crear</button>
                              </div>
                            </div>                            
                          </form>

                    </div>

                </div>
            </div>


          </section>
        

          <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

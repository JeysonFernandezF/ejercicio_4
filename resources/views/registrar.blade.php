<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Cuenta usuario</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            
            <div class="col-sm-10 mx-auto">
              <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Registrarse</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('registrar')}}" method="POST">
                        @csrf


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" name="nombre" id="nombre" aria-describedby="emailHelp" placeholder="Nombre Apellido" required>
                           
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @else
                            <small id="emailHelp" class="form-text text-muted">Porfavor ingresa un nombre</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Eléctronico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email" aria-describedby="emailHelp" placeholder="correo_eléctronico@correo.cl" autocomplete="off" required>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @else
                            <small id="emailHelp" class="form-text text-muted">Porfavor ingresa un correo eléctronico</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contrasena_inicio">Contraseña</label>
                            <input type="password" class="form-control @error('contrasena_inicio') is-invalid @enderror" name="contrasena_inicio" id="contrasena_inicio" placeholder="Contraseña" autocomplete="off" required  >
                            
                            @error('contrasena_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @else
                            <small id="emailHelp" class="form-text text-muted">La contraseña debe tener minimo 6 caracteres</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contrasena_inicio_confirmation">Repetir Contraseña</label>
                            <input type="password" class="form-control  @error('contrasena_inicio_confirmation') is-invalid @enderror" name="contrasena_inicio_confirmation" id="contrasena_inicio_confirmation" placeholder="Contraseña" autocomplete="off" required>
                            @error('contrasena_inicio_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @else
                            <small role="alert class=" invalid-feedback">Las contraseñas deben ser iguales</small>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                        <br>
                        <a href="{{route('index')}}">Ya tienes cuenta ¡Click Aquí!</a>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
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
                    <h5 class="card-title">Iniciar Sesión</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{__('Correo Electrónico o Contraseña incorrectos.')}}
                            </div>
                        @endif

                        @csrf
                        <div class="form-group">
                            <label for="correo_iniciar">Correo Eléctronico</label>
                            <input type="email" class="form-control" name="email" id="correo_iniciar"  placeholder="correo_eléctronico@correo.cl" autocomplete="off" required>
                            
                            @error('contrasena_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @else
                            <small id="emailHelp" class="form-text text-muted">Porfavor ingresa un correo eléctronico</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contrasena_inicio">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="contrasena_inicio" placeholder="Contraseña" autocomplete="off" required>
                            @error('contrasena_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        <br>
                        <a href="{{route('registrarse')}}">No tienes cuenta ¡Click Aquí!</a>
                    </form>
                </div>
              </div>
            </div>
            
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
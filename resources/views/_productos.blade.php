@foreach ($productos as $producto)
    <div class="col-md-6 col-xl-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$producto->nombre}}</h5>
                <p class="card-text">{{$producto->descripcion}}</p>
                <a class="btn btn-success" href="{{route('ver-producto', ['id' => $producto->id])}}" class="card-link">Ver Detalles</a>
            </div>
            </div>
    </div>
    
@endforeach

@if($productos->count() < 1)
    <h4>No hay productos con esos parametros</h4>
@endif
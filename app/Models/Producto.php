<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';


    protected $fillable = [
        'nombre',
        'descripcion',
    ];

   
}

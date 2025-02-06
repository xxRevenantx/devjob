<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo', 'salario_id', 'categoria_id', 'empresa', 'ultimo_dia', 'descripcion', 'imagen', 'user_id', 'publicado'
    ];

    // Para que Laravel sepa que es una fecha y no un string o un número entero (timestamp) y pueda hacer las conversiones necesarias para trabajar con fechas en PHP y MySQL (o cualquier otro motor de base de datos).
    protected $casts = [
        'ultimo_dia' => 'date'
    ];


    // public function getRouteKeyName()
    // {
    //     return  'titulo';
    // }


}

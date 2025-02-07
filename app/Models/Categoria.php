<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['categoria'];


public function categorias()
    {
        return $this->hasMany(Vacante::class);
    }


}


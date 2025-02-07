<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    use HasFactory;

    protected $table = 'salarios';

    protected $fillable = ['salario'];


    public function salarios()
    {
        return $this->hasMany(Vacante::class);

    }
}

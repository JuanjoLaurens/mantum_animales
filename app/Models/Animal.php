<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animales';
    protected $fillable = ['nombre', 'tipo_id', 'fecha_nacimiento'];

    public function tipoAnimal()
    {
        return $this->belongsTo(TipoAnimal::class, 'tipo_id');
    }
}

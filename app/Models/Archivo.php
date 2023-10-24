<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ruta'];

    // Relación inversa con la tabla de incidencias
    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }
    
}

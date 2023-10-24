<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'incidencia_id', 'contenido'];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'idusuario');
    }
 
    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }
}

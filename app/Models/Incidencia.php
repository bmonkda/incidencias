<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Incidencia extends Model
{
    use HasFactory;

    protected $attributes = [
        'asignado_id' => null,
        'asigna_id' => null,
        'statu_id' => 1,
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // public function estatus(): HasOne
    // {
    //     return $this->hasOne(Statu::class, 'id', 'statu_id');
    // }

    /**
     * Relaciones uno a muchos inversa
     */

    public function statu(){
        return $this->belongsTo(Statu::class);
    }

    public function emergencia(){
        return $this->belongsTo(Emergencia::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    
    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }

    public function asignadoA() //usuario que asigna la incidencia
    {
        return $this->belongsTo(User::class, 'asignado_id'/* , 'idusuario' */);
        // return $this->belongsTo(Usuario::class);
    }
    
    public function adjuntos()
    {
        return $this->hasMany(AdjuntoIncidencia::class, 'incidencia_id');
    }

    // Relación con la tabla de archivos
    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

    // Relación con la tabla de usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'idusuario');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }

    // public function misIncidencias()
    // {
    //     return $this->belongsTo(User::class, 'asignado_id', 'idusuario');
    // }

}

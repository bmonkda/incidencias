<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación uno a muchos
    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

    // Relación uno a muchos inversa
    public function categoria(){
        return $this->belongsTo(Categoria::class)/* ->where('category_id', '$this->id') */;
    }
}

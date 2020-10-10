<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];

    public function episodios()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $appends = ['links'];
    // protected $perPage = 3; // default 15

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/series/' . $this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios'
        ];
    }
}

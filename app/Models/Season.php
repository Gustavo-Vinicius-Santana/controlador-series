<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public function series(){
        return $this->belongTo(Serie::class);
    }

    // RELACIONAMENTO ENTRE SERIES E EPISODIOS
    public function episodes(){
        return $this->hasMany(Episodes::class);
    }

    // EPISODIOS ASSISTIDOS POR TEMPORADA
    public function numberOfWatchedEpisodes(): int
    {
        return $this->episodes->filter(fn ($episode) => $episode->watched)->count();
    }
}

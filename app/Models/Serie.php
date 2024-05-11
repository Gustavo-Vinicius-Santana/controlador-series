<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Builder;

class Serie extends Model
{
    use HasFactory;

    // APPENDS DOS LINKS DE NAVEGAÇÃO
    protected $appends = ['links'];
    // FILTRAGEM DA INSERÇÃO
    protected $fillable = ['nome', 'cover_path'];

    // RELACIONAMENTO ENTRE SERIES E TEMPORADAS
    public function seasons(){
        return $this->hasMany(Season::class, 'series_id');
    }

    // RELACIONAMENTO ENTRE SERIES EPISODIOS
    public function episodes(){
        return $this->hasManyThrough(Episodes::class, Season::class, 'series_id', 'season_id');
    }

    // ORDENAÇÃO PADRÃO DE LISTAGEM DE SERIE
    protected static function booted(){
        self::addGlobalScope('ordered', function (Builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }

    public function links(): Attribute{
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "/api/series/{$this->id}",
                ],
                [
                    'rel' => 'seasons',
                    'url' => "/api/series/{$this->id}/seasons",
                ],
                [
                    'rel' => 'episodes',
                    'url' => "/api/series/{$this->id}/episodes",
                ]
            ],
        );

    }
}

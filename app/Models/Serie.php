<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Builder;

class Serie extends Model
{
    use HasFactory;

    // FILTRAGEM DA INSERÇÃO
    protected $fillable = ['nome'];

    // RELACIONAMENTO ENTRE SERIES E TEMPORADAS
    public function season(){
        return $this->hasMany(Season::class, 'series_id');
    }

    // ORDENAÇÃO PADRÃO DE LISTAGEM DE SERIE
    protected static function booted(){
        self::addGlobalScope('ordered', function (Builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Episodes extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public $timetamps = false;

    public function season(){
        return $this->belongTo(Serie::class);
    }

    protected function watched(): Attribute{
        return new Attribute(
            get: fn($watched) => (bool) $watched,
            set: fn($watched) => (bool) $watched
        );

    }

    public $timestamps = false;
}

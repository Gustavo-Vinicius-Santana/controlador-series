<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public $timetamps = false;

    public function season(){
        return $this->belongTo(Serie::class);
    }
}

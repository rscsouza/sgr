<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    public static function cidades(){
        return Cidade::orderBy('nome','ASC')->get();
    }
}

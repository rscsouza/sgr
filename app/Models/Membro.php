<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

class Membro extends Model
{
    use HasFactory;

    public function curso()
    {
        return $this->hasOne(Curso::class,'id','curso_id');
    }
    public function cidade()
    {
        return $this->hasOne(Cidade::class,'id','cidade_id');
    }
}

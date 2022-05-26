<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morador extends Model
{
    use HasFactory;

    public function membro()
    {
        return $this->hasOne(Membro::class,'id','membro_id');
    }

    public static function menorHierarquia(){
        $menorHierarquia=self::where('morando',1)->orderBy('hierarquia','DESC')->first();
        if(is_null($menorHierarquia)){
            return 1;
        }else{
            return $menorHierarquia->hierarquia;
        }
    }
}

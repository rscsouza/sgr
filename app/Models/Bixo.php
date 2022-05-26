<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Morador;
use App\Models\Membro;

class Bixo extends Model
{
    use HasFactory;

    public function membro()
    {
        return $this->hasOne(Membro::class,'id','membro_id');
    }
    const MENSAGENS=array(
        "promocaoComSucesso"=>"O bixo foi promovido a morador com sucesso",
        "promocaoComErro"=>"A promoção do bixo não pode ser realizada, possíveis motivos, este já foi promovido anteriormente."
    );

    public static function promocaoMorador($id){
        $bixo=Bixo::findOrFail($id);
        if(!is_null($bixo)){
            if($bixo->processo_seletivo && !$bixo->escolhido){
                // Bixo é promovido a Morador e tem seu processo seletivo encerrado
                $bixo->processo_seletivo=0;
                $bixo->escolhido=1;
                $bixo->data_fim=date("Y-m-d H:i:s");
                $bixo->save();

                // Membro tem seu perfil atualizado de Bixo para Morador
                $membro=Membro::find($bixo->membro_id);
                $membro->perfil=2;
                $membro->save();

                // Bixo é cadastrado como novo Morador na mais baixa hierarquia
                $novoMorador= new Morador();
                $novoMorador->membro_id=$membro->id;
                $novoMorador->hierarquia=Morador::menorHierarquia()+1;
                $novoMorador->save();

                return array("status"=>true,"msg"=>self::MENSAGENS["promocaoComSucesso"].": ".$bixo->membro->nome."/".$bixo->membro->apelido);
            }
            else{
                return array("status"=>false,"msg"=>self::MENSAGENS["promocaoComErro"].": ".$bixo->membro->nome."/".$bixo->membro->apelido);
            }
        }

    }
}

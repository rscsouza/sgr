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


    const MENSAGENS=array(
        "existeMembroComApelido"=>"Já existe um membro com este apelido cadastrado",
        "cadastroComSucesso"=>"Membro cadastrado com sucesso!",
        "alteradoComSucesso"=>"Membro editado com sucesso!",
        "alteradoComErro"=>"Membro não pode ser alterado",
        "excluidoComSucesso"=>"Membro foi excluído com sucesso!",
        "excluidoComErro"=>"Membro não pode ser excluído!",
        "falecido"=>"Membro faleceu",
        "naoFalecido"=>"Membro não faleceu",
        "ativo"=>"Membro está ativo",
        "inativo"=>"Membro está inativo",
        "erroExistemPerfis"=>"Membro não pode ser excluído pois existem perfis de Bixo, Morador ou Ex-Aluno vinculados!",
    );

    public static function cadastrar($dados){

        $membro= new Membro();
        foreach($dados as $chave=>$dado){
            if($chave=="apelido"){
                //inserir método verificacao apelido
                if(!self::existeMembroComApelido($dado,0,'cadastrar')){

                }
                else{
                    return array("status"=>false,"msg"=>self::MENSAGENS["existeMembroComApelido"]);
                }
            }
            if($chave!="_token"){
                $membro->{$chave}=trim($dado);
            }
        }
        $membro->save();
        return array("status"=>true,"msg"=>self::MENSAGENS["cadastroComSucesso"].": ".$membro->nome."/".$membro->apelido);
    }

    public static function recuperar($id){
        $membro=Membro::findOrFail($id);
        return $membro;
    }

    public static function alterar($id,$dados){
        $membro=Membro::findOrFail($id);
        if(!is_null($membro)){
            foreach($dados as $chave=>$dado){
                if($chave=="apelido"){
                    //inserir método verificacao apelido
                    if(!self::existeMembroComApelido($dado,$membro->id,'editar')){

                    }
                    else{
                        return array("status"=>false,"msg"=>self::MENSAGENS["existeMembroComApelido"]);
                    }
                }
                if($chave!="_token"){
                    $membro->{$chave}=trim($dado);
                }
            }
            $membro->update();
            return array("status"=>true,"msg"=>self::MENSAGENS["alteradoComSucesso"].": ".$membro->nome."/".$membro->apelido);

        }
        return array("status"=>false,"msg"=>self::MENSAGENS["alteradoComErro"]);
    }

    public static function excluir($id){
        $membro=Membro::findOrFail($id);
        if(!is_null($membro)){
            if($membro->perfil!=0){
                return array("status"=>false,"msg"=>self::MENSAGENS["erroExistemPerfis"].": ".$membro->nome."/".$membro->apelido);
            }
            Membro::destroy($id);
            return array("status"=>true,"msg"=>self::MENSAGENS["excluidoComSucesso"] .": ".$membro->nome."/".$membro->apelido);
        }
        return array("status"=>false,"msg"=>self::MENSAGENS["excluidoComErro"]);
    }

    public static function existeMembroComApelido($apelido,$id,$operacao){
        $apelido=trim($apelido);
        if($operacao=="cadastrar"){
            $consulta=Membro::where('apelido','like',"%$apelido%")->count();
            //var_dump($consulta);
        }
        else
        if($operacao=="editar"){
            $consulta=Membro::where('apelido','like',"%$apelido%")->where('id','<>',$id)->count();
            //var_dump($consulta);
        }
        return $consulta;
    }

    public static function falecido($id){

        $membro=Membro::findOrFail($id);
        if(!is_null($membro)){
            $estaFalecido=$membro->falecido;
            if($estaFalecido){
                $estaFalecido=0;
                $membro->falecido=$estaFalecido;
                $membro->save();
                return array("status"=>true,"msg"=>self::MENSAGENS["naoFalecido"].": ".$membro->nome."/".$membro->apelido);
            }else{
                $estaFalecido=1;
                $membro->falecido=$estaFalecido;
                $membro->save();
                return array("status"=>true,"msg"=>self::MENSAGENS["falecido"].": ".$membro->nome."/".$membro->apelido);
            }
        }
        return array("status"=>false,"msg"=>self::MENSAGENS["alteradoComErro"]);
    }

    public static function ativo($id){
        $membro=Membro::findOrFail($id);
            if(!is_null($membro)){
            $estaAtivo=$membro->ativo;
            if($estaAtivo){
                $estaAtivo=0;
                $membro->ativo=$estaAtivo;
                $membro->save();
                return array("status"=>true,"msg"=>self::MENSAGENS["inativo"].": ".$membro->nome."/".$membro->apelido);
            }else{
                $estaAtivo=1;
                $membro->ativo=$estaAtivo;
                $membro->save();
                return array("status"=>true,"msg"=>self::MENSAGENS["ativo"].": ".$membro->nome."/".$membro->apelido);
            }
        }
        return array("status"=>false,"msg"=>self::MENSAGENS["alteradoComErro"]);
    }

}

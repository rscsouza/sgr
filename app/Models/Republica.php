<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Republica extends Model
{
    use HasFactory;

    const MENSAGENS=array(
        "republicaInexistente"=>"Para listar, cadastrar, editar, excluir membros, a República deve ser criada inicialmente.",
        "erroNumeroDeVagas"=>"A República deve possuir ao menos uma vaga cadastrada",
        "anuncioEfetuadoComSucesso"=>"Anúncio de vagas efetuado com sucesso",
        "anuncioRemovidoComSucesso"=>"Anúncio de vagas removido com sucesso",
        "cadastroComSucesso"=>"República cadastrada com sucesso!",
        "cadastroComErro"=>"República não pode ser criada, pois já existe um registro associado",
        "alteradoComSucesso"=>"República editada com sucesso!",
        "alteradoComErro"=>"República não pode ser alterada",
        "excluidoComSucesso"=>"República foi excluída com sucesso!",
        "excluidoComErro"=>"República não pode ser excluída!",
        "erroExistemMembros"=>"República não pode ser excluída pois existem membros cadastrados!",
    );

    public static function cadastrar($dados){
        if(!self::existeRepublicaCriada()){
           $republica= new Republica();
           foreach($dados as $chave=>$dado){
            if($chave=="vagas" && (int)$dado==0){
                return array("status"=>false,"msg"=>self::MENSAGENS["erroNumeroDeVagas"]);
            }
            if($chave!="_token"){
                $republica->{$chave}=$dado;
            }
           }
           $republica->save();
           return array("status"=>true,"msg"=>self::MENSAGENS["cadastroComSucesso"]);
        }
        return array("status"=>false,"msg"=>self::MENSAGENS["cadastroComErro"]);
    }

    public static function recuperar($id){
        $republica=Republica::find($id);
        return $republica;
    }

    public static function alterar($id,$dados){
        $republica=Republica::findOrFail($id);
        if(!is_null($republica)){
            foreach($dados as $chave=>$dado){
                if($chave=="vagas" && (int)$dado==0){
                    return array("status"=>false,"msg"=>self::MENSAGENS["erroNumeroDeVagas"]);
                }
                if($chave!="_token"){
                    $republica->{$chave}=$dado;
                }
            }
            $republica->update();
            return array("status"=>true,"msg"=>self::MENSAGENS["alteradoComSucesso"]);

        }
        return array("status"=>false,"msg"=>self::MENSAGENS["alteradoComErro"]);
    }

    public static function excluir($id){
        $republica=Republica::findOrFail($id);
        if(!is_null($republica)){
            $membros=count(Membro::all());
            if($membros!=0){
                return array("status"=>false,"msg"=>self::MENSAGENS["erroExistemMembros"]);
            }
            Republica::destroy($id);
            return array("status"=>true,"msg"=>self::MENSAGENS["excluidoComSucesso"]);
        }
        return array("status"=>false,"msg"=>self::MENSAGENS["excluidoComErro"]);
    }

    public function anunciarVagas(){
        $this->anunciar_vagas=!$this->anunciar_vagas;
        $this->save();
        if($this->anunciar_vagas){
            return self::MENSAGENS["anuncioEfetuadoComSucesso"];
        }
        return self::MENSAGENS["anuncioRemovidoComSucesso"];
    }

    public static function existeRepublicaCriada(){
        $republica=count(Republica::all());
        if($republica>0){
            return true;
        }
        return false;
    }

    public static function gerenciarRota(){
        if(!self::existeRepublicaCriada()){
            return route("formulario_cadastrar_republica");
        }else{
            $republica= Republica::first();
            return route("formulario_editar_republica",["id"=>$republica->id]);
        }
    }
}

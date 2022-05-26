<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Republica;
use App\Models\Morador;


class MoradorControlador extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        if(Republica::existeRepublicaCriada()){
            $moradores=Morador::where('morando',1)->orderBy('hierarquia','asc')->paginate(5);
            return view('moradores.listar_moradores')
            ->with('titulo','Moradores')
            ->with('moradores',$moradores);
        }
        else{
            Session::flash('mensagem',Republica::MENSAGENS["republicaInexistente"]);
            Session::flash('alert-info', 'info');
            return view('republica.formulario_cadastrar_republica')
            ->with('titulo','Cadastrar República');
        }
    }

}

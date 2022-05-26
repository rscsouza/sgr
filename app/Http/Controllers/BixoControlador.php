<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Republica;
use App\Models\Bixo;

class BixoControlador extends Controller
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
            $bixos=Bixo::orderBy('data_inicio','asc')->paginate(5);
            return view('bixos.listar_bixos')
            ->with('titulo','Bixos')
            ->with('bixos',$bixos);
        }
        else{
            Session::flash('mensagem',Republica::MENSAGENS["republicaInexistente"]);
            Session::flash('alert-info', 'info');
            return view('republica.formulario_cadastrar_republica')
            ->with('titulo','Cadastrar República');
        }
    }


    public function promocaoMorador($id){
        $promocao=Bixo::promocaoMorador($id);
        Session::flash('mensagem',$promocao['msg']);
        if(!$promocao['status']){
            Session::flash('alert-danger', 'danger');
            return redirect()->route('home');
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('listar_moradores');
    }


}

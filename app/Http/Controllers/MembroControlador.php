<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Republica;
use App\Models\Membro;

class MembroControlador extends Controller
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
            $membros=Membro::orderBy('nome','asc')->paginate(5);
            return view('membros.listar_membros')
            ->with('titulo','Membros')
            ->with('membros',$membros);
        }
        else{
            Session::flash('mensagem',Republica::MENSAGENS["republicaInexistente"]);
            Session::flash('alert-info', 'info');
            return view('republica.formulario_cadastrar_republica')
            ->with('titulo','Cadastrar República');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formularioCadastro()
    {
        if(!Republica::existeRepublicaCriada()){
            return view('republica.formulario_cadastrar_republica')
            ->with('titulo','Cadastrar República');
        }
        else{
            Session::flash('mensagem',Republica::MENSAGENS["cadastroComErro"]);
            Session::flash('alert-danger', 'danger');
        }
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Request $request)
    {
        $cadastroEfetuado=Republica::cadastrar($request->all());
        Session::flash('mensagem',$cadastroEfetuado['msg']);
        if(!$cadastroEfetuado['status']){
            Session::flash('alert-danger', 'danger');
            if(Republica::MENSAGENS["erroNumeroDeVagas"]==$cadastroEfetuado['msg']){
                return redirect()->route('formulario_cadastrar_republica')->withInput();
            }
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $republica = Republica::recuperar($id);
        return view('republica.formulario_editar_republica')
            ->with('titulo','Editar República')
            ->with(compact("republica"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alterar(Request $request)
    {
        //dd($request->all());
        $cadastroAlterado=Republica::alterar($request->id,$request->all());
        Session::flash('mensagem',$cadastroAlterado['msg']);
        if(!$cadastroAlterado['status']){
            Session::flash('alert-danger', 'danger');
            if(Republica::MENSAGENS["erroNumeroDeVagas"]==$cadastroAlterado['msg']){
                return redirect()->route('formulario_editar_republica',['id'=>$request->id])->withInput();
            }
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id)
    {
        $cadastroExcluir=Republica::excluir($id);
        Session::flash('mensagem',$cadastroExcluir['msg']);
        if(!$cadastroExcluir['status']){
            Session::flash('alert-danger', 'danger');
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Republica;
use App\Models\Membro;
use App\Models\Curso;
use App\Models\Cidade;

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
            return view('membros.formulario_cadastrar_membro')
            ->with('titulo','Cadastrar Membro')
            ->with('cursos',Curso::cursos())
            ->with('cidades',Cidade::cidades());
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
        $cadastroEfetuado=Membro::cadastrar($request->all());
        Session::flash('mensagem',$cadastroEfetuado['msg']);
        if(!$cadastroEfetuado['status']){
            Session::flash('alert-danger', 'danger');
            if(Membro::MENSAGENS["existeMembroComApelido"]==$cadastroEfetuado['msg']){
                return redirect()->route('formulario_cadastrar_membro')->withInput();
            }
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('listar_membros');

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
        $membro = Membro::recuperar($id);
        return view('membros.formulario_editar_membro')
            ->with('titulo','Editar Membro')
            ->with(compact("membro"))
            ->with('cursos',Curso::cursos())
            ->with('cidades',Cidade::cidades());

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
        $cadastroAlterado=Membro::alterar($request->id,$request->all());
        Session::flash('mensagem',$cadastroAlterado['msg']);
        if(!$cadastroAlterado['status']){
            Session::flash('alert-danger', 'danger');
            if(Membro::MENSAGENS["existeMembroComApelido"]==$cadastroAlterado['msg']){
                return redirect()->route('formulario_editar_membro',['id'=>$request->id])->withInput();
            }
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('listar_membros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id)
    {
        $cadastroExcluir=Membro::excluir($id);
        Session::flash('mensagem',$cadastroExcluir['msg']);
        if(!$cadastroExcluir['status']){
            Session::flash('alert-danger', 'danger');
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('listar_membros');
    }

    public function falecido($id){
        $falecido=Membro::falecido($id);
        Session::flash('mensagem',$falecido['msg']);
        if(!$falecido['status']){
            Session::flash('alert-danger', 'danger');
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('listar_membros');
    }

    public function ativo($id){
        $ativo=Membro::ativo($id);
        Session::flash('mensagem',$ativo['msg']);
        if(!$ativo['status']){
            Session::flash('alert-danger', 'danger');
        }
        else{
            Session::flash('alert-success', 'success');
        }
        return redirect()->route('listar_membros');
    }
}

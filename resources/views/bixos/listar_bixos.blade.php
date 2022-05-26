@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 area_container">
          @component("componentes.cabecalho_modulo",["icone"=>"icone_bixos","titulo"=>$titulo])
          @endcomponent
          <div class="alert alert-info">
            <div class="row">
                <div class="col-md-3">
                    <img src="/imagens/info.png" width="32px"/> Nome/Apelido
                </div>
                <div class="col-md-6">
                    <img src="/imagens/icone_historico.png" width="32px"/> Histórico
                </div>
                <div class="col-md-3">
                    <img src="/imagens/icone_acao.png" width="32px"/> Ações
                </div>
            </div>
          </div>
            @foreach($bixos as $bixo)
            <div class="row linha_{{ $loop->index%2 }}">
                <div class="col-md-3">
                    @if ($bixo->membro->perfil==3)
                    <img src="/imagens/icone_ex_alunos.png" width="32px"/>
                    @elseif ($bixo->membro->perfil==2)
                    <img src="/imagens/icone_moradores.png" width="32px"/>
                    @elseif ($bixo->membro->perfil==1)
                    <img src="/imagens/icone_bixos.png" width="32px"/>
                    @else
                    <img src="/imagens/icone_membros.png" width="32px"/>
                    @endif
                    {{$bixo->membro->nome}} / {{$bixo->membro->apelido}}
                </div>
                <div class="col-md-6">
                    <b>Perfil atual: </b>
                    @if ($bixo->membro->perfil==3)
                        Ex Aluno
                    @elseif ($bixo->membro->perfil==2)
                        Morador
                    @elseif ($bixo->membro->perfil==1)
                        Bixo
                    @else
                        Nenhum

                    @endif
                    <br/>
                    <b>Início: </b>{{date_format(date_create($bixo->data_inicio),"d/m/Y")}}<br/>
                    <b>Fim: </b>@if(is_null($bixo->data_fim)) Não informado @else {{date_format(date_create($bixo->data_fim),"d/m/Y")}} @endif <br/>
                    <b>Processo Seletivo: </b>@if($bixo->processo_seletivo) Sim @else Não @endif<br/>
                    <b>Vetado: </b>@if(!$bixo->escolhido && !$bixo->processo_seletivo) Sim @else Não @endif<br/>
                    <b>Escolhido: </b>@if($bixo->escolhido && !$bixo->processo_seletivo) Sim @else Não @endif<br/>
                </div>
                <div class="col-md-3">
                    @if($bixo->membro->perfil==1)
                    <select class="form-select form-select-sm opcoes_select" aria-label=".form-select-sm example">
                        <option selected>Selecione ação...</option>
                        <option value="" disabled>Editar</option>
                        <option value="{{route('promocao_bixo_a_morador',['id'=>$bixo->id])}}">Promover a Morador</option>
                        <option value="" disabled>Efetuar veto</option>
                        <option value="" disabled>Excluir</option>
                      </select>

                      @else
                        <b>Membro já consolidado como
                            @if ($bixo->membro->perfil==3)
                            Ex Aluno
                            @elseif ($bixo->membro->perfil==2)
                            Morador
                            @endif
                        </b>
                      @endif
                </div>
            </div>
            @endforeach
            <div class="col-md-12">
                {{ $bixos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

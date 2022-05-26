@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 area_container">
          @component("componentes.cabecalho_modulo",["icone"=>"icone_membros","titulo"=>$titulo,"cadastroRota"=>route('cadastrar_membro')])
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
            @foreach($membros as $membro)
            <div class="row linha_{{ $loop->index%2 }}">
                <div class="col-md-3">
                    @if ($membro->perfil==3)
                    <img src="/imagens/icone_ex_alunos.png" width="32px"/>
                    @elseif ($membro->perfil==2)
                    <img src="/imagens/icone_moradores.png" width="32px"/>
                    @elseif ($membro->perfil==1)
                    <img src="/imagens/icone_bixos.png" width="32px"/>
                    @else
                    <img src="/imagens/icone_membros.png" width="32px"/>
                    @endif
                    {{$membro->nome}} / {{$membro->apelido}}
                </div>
                <div class="col-md-6">
                    <b>Perfil atual: </b>
                    @if ($membro->perfil==3)
                        Ex Aluno
                    @elseif ($membro->perfil==2)
                        Morador
                    @elseif ($membro->perfil==1)
                        Bixo
                    @else
                        Nenhum

                    @endif
                    <br/>
                    <b>Curso: </b>{{$membro->curso->nome}}<br/>
                    <b>Cidade: </b>{{$membro->cidade->nome}}/{{$membro->cidade->estado}}<br/>
                    <b>E-mail: </b>{{$membro->email}}<br/>
                    <b>Falecido: </b>@if($membro->falecido) Sim @else Não @endif<br/>
                    <b>Ativo: </b>@if($membro->ativo) Sim @else Não @endif<br/>
                    <b>Pai: </b>{{$membro->filiacao_pai}} - <b>Telefone: </b>{{$membro->telefone_pai}}<br/>
                    <b>Mãe: </b>{{$membro->filiacao_mae}} - <b>Telefone: </b>{{$membro->telefone_mae}} <br/>
                    @if($membro->observacoes!="")
                    <b>Observações: </b>{!! nl2br($membro->observacoes) !!}
                    @endif
                </div>
                <div class="col-md-3">
                    <select class="form-select form-select-sm opcoes_select" aria-label=".form-select-sm example">
                        <option selected>Selecione ação...</option>
                        @if($membro->perfil==0)
                            <option value="1" disabled>Criar perfil de bixo</option>
                        @endif
                        <option value="{{route('formulario_editar_membro',['id'=>$membro->id])}}">Editar</option>
                        <option value="{{route('falecido_membro',['id'=>$membro->id])}}">
                            @if($membro->falecido)
                                Remover falecimento
                            @else
                                Informar falecimento
                            @endif
                        </option>
                        <option value="{{route('ativo_membro',['id'=>$membro->id])}}">
                            @if($membro->ativo)
                                Desativar
                            @else
                                Ativar
                            @endif
                        </option>
                        <option value="{{route('excluir_membro',['id'=>$membro->id])}}">Excluir</option>
                      </select>
                </div>
            </div>
            @endforeach
            <div class="col-md-12">
                {{ $membros->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

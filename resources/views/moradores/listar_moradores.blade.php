@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 area_container">
          @component("componentes.cabecalho_modulo",["icone"=>"icone_moradores","titulo"=>$titulo])
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
            @foreach($moradores as $morador)
            <div class="row linha_{{ $loop->index%2 }}">
                <div class="col-md-3">
                    <img src="/imagens/icone_moradores.png" width="32px"/>
                    {{$morador->membro->nome}} / {{$morador->membro->apelido}}
                </div>
                <div class="col-md-6">
                    <b>Perfil atual: </b>
                        Morador
                    <br/>
                    <b>Decano: </b>@if($morador->decano) Sim @else Não @endif<br/>
                    <b>Hierarquia: </b>{{ $morador->hierarquia }}<br/>
                </div>
                <div class="col-md-3">

                    <select class="form-select form-select-sm opcoes_select" aria-label=".form-select-sm example">
                        <option selected>Selecione ação...</option>
                        <option value="" disabled>Promover a Decano</option>
                        <option value="" disabled>Subir Hierarquia</option>
                        <option value="" disabled>Rebaixar Hierarquia</option>
                      </select>

                </div>
            </div>
            @endforeach
            <div class="col-md-12">
                {{ $moradores->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

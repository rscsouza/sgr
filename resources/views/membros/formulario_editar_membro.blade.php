@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 area_container">
          @component("componentes.cabecalho_modulo",["icone"=>"icone_membros","titulo"=>$titulo])
          @endcomponent

          <form method="POST" action="{{ route('alterar_membro')}}" autocomplete="off" id="formulario">
            <input type="hidden" name="id" value="{{ $membro->id }}"/>
            @csrf
            <div class="form-group row">
              <label for="nome" class="col-sm-2 col-form-label">Nome</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{old('nome', $membro->nome)}}" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group row">
                <label for="apelido" class="col-sm-2 col-form-label">Apelido</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="apelido"  name="apelido" placeholder="Apelido" value="{{old('apelido', $membro->apelido)}}" autocomplete="off" required>
                </div>
                <label for="email" class="col-sm-1 col-form-label">E-mail</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" id="email"  name="email" placeholder="E-mail" value="{{old('email', $membro->email)}}" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="curso_id" class="col-sm-2 col-form-label">Curso</label>
                <div class="col-sm-10">
                    <select name="curso_id" id="curso_id" class="form-control form-select">
                        @foreach($cursos as $curso)
                        <option value="{{$curso->id}}" @if(old('curso_id', $membro->curso_id)==$curso->id) selected @endif>{{$curso->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="cidade_id" class="col-sm-2 col-form-label">Cidade</label>
                <div class="col-sm-10">
                    <select name="cidade_id" id="cidade_id" class="form-control form-select">
                        @foreach($cidades as $cidade)
                        <option value="{{$cidade->id}}" @if(old('cidade_id', $membro->cidade_id)==$cidade->id) selected @endif>{{$cidade->nome}}/{{$cidade->estado}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="filiacao_pai" class="col-sm-2 col-form-label">Pai</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="filiacao_pai"  name="filiacao_pai" placeholder="Nome do pai" value="{{old('filiacao_pai', $membro->filiacao_pai)}}" autocomplete="off" required>
                </div>
                <label for="telefone_pai" class="col-sm-1 col-form-label">Telefone</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="telefone_pai"  name="telefone_pai" placeholder="telefone do pai" value="{{old('telefone_pai', $membro->telefone_pai)}}" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="filiacao_mae" class="col-sm-2 col-form-label">Mãe</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="filiacao_mae"  name="filiacao_mae" placeholder="Nome da mãe" value="{{old('filiacao_mae', $membro->filiacao_mae)}}" autocomplete="off" required>
                </div>
                <label for="telefone_mae" class="col-sm-1 col-form-label">Telefone</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="telefone_mae"  name="telefone_mae" placeholder="telefone da mãe" value="{{old('telefone_mae', $membro->telefone_mae)}}" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="estrutura" class="col-sm-2 col-form-label">Observações</label>
                <div class="col-sm-10">
                    <textarea id="observacoes" name="observacoes" class="form-control">{{old('observacoes', $membro->observacoes)}}</textarea>
                </div>
            </div>
            <div class="row">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection

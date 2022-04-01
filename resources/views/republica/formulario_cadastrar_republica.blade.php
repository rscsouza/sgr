@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 area_container">
          @component("componentes.cabecalho_modulo",["icone"=>"icone_republica","titulo"=>$titulo])
          @endcomponent

          <form method="POST" action="{{ route('cadastrar_republica')}}" autocomplete="off" id="formulario">
            @csrf
            <div class="form-group row">
              <label for="nome" class="col-sm-2 col-form-label">Nome</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{old('nome')}}" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email"  name="email" placeholder="E-mail" value="{{old('email')}}" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="telefone"  name="telefone" placeholder="Telefone" value="{{old('telefone')}}" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="historia" class="col-sm-2 col-form-label">História</label>
                <div class="col-sm-10">
                    <textarea id="historia" name="historia" class="form-control">{{old('historia')}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="estrutura" class="col-sm-2 col-form-label">Estrutura</label>
                <div class="col-sm-10">
                    <textarea id="estrutura" name="estrutura" class="form-control">{{old('estrutura')}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="localizacao" class="col-sm-2 col-form-label">Localização</label>
                <div class="col-sm-10">
                    <textarea id="localizacao" name="localizacao" class="form-control"> {{old('localizacao')}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="vagas" class="col-sm-2 col-form-label">Vagas</label>
                <div class="col-sm-10">
                    <input type ="number" class="form-control" id="vagas" name="vagas" min="1" value="{{old('vagas')}}" autocomplete="off" required/>
                </div>
            </div>
            <div class="row">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection

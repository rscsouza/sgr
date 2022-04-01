<img src="/imagens/{{ $icone }}.png" width="48px;" style="float:left; padding-right:10px;">
<h3 style="float:left;">{{$titulo}}</h3>
@if(isset($exclusaoRota))
<a href="{{$exclusaoRota}}" title="Excluir">
<img src="/imagens/delete.png" width="36px;" style="float:right;">
</a>
@endif
@if(isset($cadastroRota))
<a href="{{$cadastroRota}}" title="Adicionar">
<img src="/imagens/add.png" width="36px;" style="float:right;">
</a>
@endif
<div style="clear:both;">
</div>
<hr/>

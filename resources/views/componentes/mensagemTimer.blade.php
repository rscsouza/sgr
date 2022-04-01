@if(Session::has('mensagem'))
    setTimeout(function(){ $("#mensagem").hide(500); }, 5000);
@endif

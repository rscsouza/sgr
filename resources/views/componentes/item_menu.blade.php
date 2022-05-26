@if ($titulo=="República")

@elseif($titulo=="Membros")

@elseif($titulo=="Relatórios")

@endif
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img src="/imagens/{{$icone}}.png" style="width:32px;"/>
         {{$titulo}}
    </a>

    @if ($titulo=="República")
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{$link}}">
            <img src="/imagens/icone_republica.png" style="width:16px;"/> Gerenciar República
        </a>
        @if($republicaCriada)
        <a class="dropdown-item" href="#" onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
            <img src="/imagens/icone_anuncio.png" style="width:16px;"/> Anunciar Vagas
        </a>
        <a class="dropdown-item" href="#" onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
            <img src="/imagens/icone_fotos.png" style="width:16px;"/> Fotos
        </a>
        <a class="dropdown-item" href="#" onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
            <img src="/imagens/icone_videos.png" style="width:16px;"/> Vídeos
        </a>
        @endif
    </div>
    @elseif($titulo=="Membros")
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{$link}}">
            <img src="/imagens/icone_membros.png" style="width:16px;"/> Gerenciar Membros
        </a>
        <a class="dropdown-item" href="#" onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
            <img src="/imagens/icone_ex_alunos.png" style="width:16px;"/> Gerenciar Ex Alunos
        </a>
        <a class="dropdown-item" href="{{route('listar_moradores')}}">
            <img src="/imagens/icone_moradores.png" style="width:16px;"/> Gerenciar Moradores
        </a>
        <a class="dropdown-item" href="{{route('listar_bixos')}}">
            <img src="/imagens/icone_bixos.png" style="width:16px;"/> Gerenciar Bixos
        </a>
    </div>

    @elseif($titulo=="Relatórios")
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#" onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
            <img src="/imagens/icone_relatorios.png" style="width:16px;"/> Taxa de Ocupação
        </a>
        <a class="dropdown-item" href="#" onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
            <img src="/imagens/icone_homenageados.png" style="width:16px;"/> Homenageados
        </a>
    </div>

    @endif

</li>


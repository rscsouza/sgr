@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center" id="area_home">
        @if($republicaCriada)
            @component('componentes.card',
            ['icone'=>'icone_republica',
            'titulo'=>'República',
            'descricao'=>'Gerenciar República'
            ,'link'=>$republicaRota
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_fotos',
            'titulo'=>'Fotos',
            'descricao'=>'Gerenciar Fotos da República'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_videos',
            'titulo'=>'Vídeos',
            'descricao'=>'Gerenciar Vídeos da República'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_anuncio',
            'titulo'=>'Anunciar Vagas',
            'descricao'=>'Gerenciar Anúncio de Vagas'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_membros',
            'titulo'=>'Membros',
            'descricao'=>'Gerenciar Membros'
            ,'link'=>route('listar_membros')
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_ex_alunos',
            'titulo'=>'Ex Alunos',
            'descricao'=>'Gerenciar Ex Alunos'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_moradores',
            'titulo'=>'Moradores',
            'descricao'=>'Gerenciar Moradores'
            ,'link'=>route('listar_moradores')
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_bixos',
            'titulo'=>'Bixos',
            'descricao'=>'Gerenciar Bixos'
            ,'link'=>route('listar_bixos')
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_homenageados',
            'titulo'=>'Homenageados',
            'descricao'=>'Listar Homenageados'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_relatorios',
            'titulo'=>'Relatórios',
            'descricao'=>'Gerenciar Relatórios'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_cursos',
            'titulo'=>'Cursos',
            'descricao'=>'Gerenciar Cursos'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent

            @component('componentes.card',
            ['icone'=>'icone_cidades',
            'titulo'=>'Cidades',
            'descricao'=>'Gerenciar Cidades'
            ,'link'=>"javascript:alert('Em desenvolvimento')"
            ])
            @endcomponent
            @else
            <div class="col-12 area_container">
                <center>
                <img src="/imagens/warning.png"/><br/>
                Prezado Administrador, não temos nenhuma República criada ainda.<br/>
                Favor clicar no botão "República" no menu acima.
                </center>
            </div>
            @endif

    </div>
</div>
@endsection

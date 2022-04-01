<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SGR - Sistema de Gestão de Repúblicas</title>

    <!-- Scripts -->
    <?php /*
    <script src="{{ asset('js/app.js') }}" defer></script>
    */ ?>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" title="Página Inicial SGR">
                   <img src="/imagens/logo.png" style="width:64px;"/>
                   <span class="d-none d-sm-block" style="float:right;text-transform:uppercase; padding-left:10px;padding-top:10px;font-weight:bold;">
                    <span style="color:cornflowerblue; text-shadow: 1px 1px rgb(219, 217, 217);">S</span>istema de <span style="color:cornflowerblue; text-shadow: 1px 1px rgb(219, 217, 217);">G</span>estão de <span style="color:cornflowerblue; text-shadow: 1px 1px rgb(219, 217, 217);">R</span>epúblicas
                   </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                        @else
                        @component('componentes.item_menu',
                        ['icone'=>'icone_republica',
                        'titulo'=>'República',
                        'link'=>$republicaRota
                        ])
                        @endcomponent
                        @if($republicaCriada)
                            @component('componentes.item_menu',
                            ['icone'=>'icone_membros',
                            'titulo'=>'Membros',
                            'link'=>route('listar_membros')
                            ])
                            @endcomponent

                            @component('componentes.item_menu',
                            ['icone'=>'icone_relatorios',
                            'titulo'=>'Relatórios',
                            'link'=>"javascript:alert('Em desenvolvimento')"
                            ])
                            @endcomponent



                        @endif

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/imagens/icone_admin.png" style="width:24px;"/> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"
                                   onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
                                    <img src="/imagens/icone_admin.png" style="width:16px;"/> Gerenciar Usuários
                                </a>

                                <a class="dropdown-item" href="#"
                                   onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
                                    <img src="/imagens/icone_cursos.png" style="width:16px;"/> Gerenciar Cursos
                                </a>

                                <a class="dropdown-item" href="#"
                                onclick="javascript:alert('Em desenvolvimento'); event.preventDefault();">
                                 <img src="/imagens/icone_cidades.png" style="width:16px;"/> Gerenciar Cidades
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <img src="/imagens/icone_logout.png" style="width:16px;"/> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 fundo">
            @component('componentes.mensagem')
            @endcomponent
            <div style="clear: both;"></div>
            @yield('content')
            <div id="processando_solicitacao">
                <center>
                    <img src="/imagens/loading.gif" style="width:100%;" id="processando_solicitacao_imagem"/>
                </center>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function(){
            @component('componentes.mensagemTimer')
            @endcomponent
            @component('componentes.processando_solicitacao')
            @endcomponent
        });
    </script>
</body>
</html>

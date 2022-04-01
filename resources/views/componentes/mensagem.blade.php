@if(Session::has('mensagem'))
<div class="container">
    <div class="row">
        @foreach (['danger', 'warning', 'success', 'info'] as $status)
        @if(Session::has('alert-' . $status))
        <div class="alert alert-{{ $status }}" id="mensagem">
            <img src="/imagens/{{ $status }}.png" width="32px;"/> {!! Session::get('mensagem') !!}
        </div>
        @endif
        {{ Session::forget('alert-'.$status)}}
        @endforeach
    </div>
</div>
@endif


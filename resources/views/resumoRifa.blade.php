<!-- thegreg -->
@extends('layouts.app')

@section('title', 'Resumo' . $rifa->name)
@section('description', '')
@section('ogTitle', $rifa->name)
@section('ogUrl', url(''))
@section('ogImage', url('/products/' . $rifa->image))
@section('sidebar')

@section('ogContent')
    <meta property="og:title" content="{{ 'Resumo' . $rifa->name }}">
    <meta property="og:description" content="{{ $rifa->subname }}">
    <meta property="og:image" itemprop="image" content="{{ url('/products/' . $rifa->image) }}">
    <meta property="og:type" content="website">
@endsection

<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<style>
    body {
        background: #000 !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(function(e) {
        // if (isIOS()) {
        //     $('#app-main').attr('style', 'margin-top: 100px !important');
        // }
    })

    function isIOS() {
        var ua = navigator.userAgent.toLowerCase();

        //Lista de dispositivos que acessar
        var iosArray = ['iphone', 'ipod'];

        var isApple = false;

        if (ua.includes('iphone') || ua.includes('ipod')) {
            isApple = true
        }

        return isApple;
    }



    function verRifa(route) {
        window.location.href = route
    }
</script>


<style>
    @media (max-width: 768px) {
        .app-main {
            margin-top: 50px !important;
        }

        .header-resumo {
            display: none !important;
        }
    }

    @media only screen and (-webkit-min-device-pixel-ratio: 1) {

        ::i-block-chrome,
        .app-main {
            margin-top: 100px !important;
        }
    }

    .app-main {
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        max-width: 600px;
        margin-top: 40px;
        margin-bottom: 50px;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .app-main a {
        text-decoration: none;
    }

    .app-main a:hover {
        text-decoration: none;
    }

    .app-title {
        display: flex;
        align-items: self-end;
        padding-bottom: 10px;
    }

    .app-title h1 {
        color: rgba(0, 0, 0, .9);
        padding-right: 5px;
        font-weight: 600;
        font-size: 1.3em;
        margin: 0;
        padding-top: 10px;
    }

    .app-title .app-title-desc {
        color: rgba(0, 0, 0, .5);
        padding-top: 6px;
        font-size: .9em;
    }


    /* *************************************************************** */
    /* Card Rifa em Destaque */
    /* *************************************************************** */
    .rifas {
        background: #e4e4e4;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        position: absolute;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .rifa-dark {
        background-color: #383838;
    }

    .card-rifa-destaque .img-rifa-destaque img {
        width: 100%;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
    }

    .card-rifa-destaque {
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        padding-bottom: 10px;
        background: #fff;
        margin-bottom: 10px;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .title-rifa-destaque {
        padding-top: 5px;
        padding-left: 10px;
    }

    .title-rifa-destaque h1 {
        color: #202020;
        -webkit-line-clamp: 2 !important;
        margin-bottom: 1px;
        font-weight: 500;
        font-size: 1em;
    }

    .title-rifa-destaque p {
        color: rgba(0, 0, 0, .7);
        font-size: .75em;
        max-width: 96%;
        margin: 0;
    }

    /* *************************************************************** */


    /* *************************************************************** */
    /* Card Rifa Normal */
    /* *************************************************************** */
    .card-rifa img {
        width: 100px;
        height: 100px;
        border-radius: 10px;
    }

    .card-rifa {
        background: #fff;
        padding: 5px;
        margin-bottom: 10px;
        border-radius: 10px;
        display: flex
    }

    .title-rifa {
        margin-left: 15px;
        width: 100%;
    }

    .blink {
        margin-top: 5px;
        animation: animate 1.5s linear infinite;
    }



    @keyframes animate {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 0.7;
        }

        100% {
            opacity: 0;
        }
    }
</style>


@section('content')
    <style>
        .duvida {
            background-color: #ffffff5e;
            border-radius: 10px;
            height: 60px;
            align-items: center;
            justify-content: center;
            margin-top: 7px;
            cursor: pointer;
        }

        .icone-duvidas {
            width: 50px;
            justify-content: center;
            align-items: center;
            background-color: #b9b9b9;
            height: 35px;
            border-radius: 10px;
            text-align: center;
            font-size: 20px;
        }

        .text-duvidas {
            display: flex !important;
            flex-direction: column;
            justify-content: center
        }

        .f-15 {
            font-size: 15px;
        }

        .f-12 {
            font-size: 12px;
        }

        .data-sorteio {
            /* float: right; */
            padding-right: 10px;
            font-weight: thin;
            text-align: center;
            /* margin-top: 10px; */
            color: #000;
        }

        .rifas.dark {
            background: #383838;
        }

        .app-title.dark h1 {
            color: #fff;
        }

        .app-title-desc.dark {
            color: #fff;
        }

        .card-rifa-destaque.dark {
            background: #222222;
        }

        .title-rifa-destaque.dark h1 {
            color: #fff;
        }

        .title-rifa-destaque.dark p {
            color: #fff;
        }

        .card-rifa.dark {
            background: #222222;
        }

        .text-duvidas.dark h6 {
            color: #fff;
        }

        .text-duvidas.dark p {
            color: #fff !important;
        }

        .data-sorteio.dark {
            color: #fff !important;
        }

        .app-title.dark {
            color: #fff;
        }

        /* width */
        #div-cotas::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        #div-cotas::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        #div-cotas::-webkit-scrollbar-thumb {
            background: #28a745 !important;
            border-radius: 10px;
        }

        /* Handle on hover */
        #div-cotas::-webkit-scrollbar-thumb:hover {
            background: #28a745 !important;
        }

        .header-resumo {
            border-bottom: 1px solid #000;
        }

        .body-resumo {
            border-bottom: 1px solid #000;
        }
    </style>
    <br> <br>
    <div class="container app-main" id="app-main">

        <div class="row justify-content-center">
            <div class="col-md-8 col-12 rifas mb-4">
                <div class="text-center">
                    <br>
                    <h1 class="display-6">{{ $rifa->name }}</h1>
                    <p>Para fazer uma busca mais eficaz, aperte no seu teclado <b>[ CTRL + F ]</b> para pesquisar o
                        ganhador!<br> Obs: Essa função está disponivel para acesso pelo notebook ou computador!</p>
                </div>
                <hr>

                <div class="container">
                    <div class="row header-resumo">
                        <div class="col-md-3 ">
                            <strong>Participante</strong>
                        </div>
                        <div class="col-md-3">
                            <strong>Telefone ou Whatsapp</strong>
                        </div>
                        <div class="col-md-3">
                            <strong>Cotas Selecionadas</strong>
                        </div>
                        <div class="col-md-3">
                            <strong>Status da Compra</strong>
                        </div>
                    </div>
                    {{-- {{ dd($participantes->items) }} --}}
                    @foreach ($participantes as $participante)
                        <div class="row body-resumo pt-2">
                            <div class="col-md-3 d-flex align-items-center">
                                <label>{{ $participante->name }}<br>
                                    {{-- <a href="{{ $participante->linkWpp() }}&text=Olá *{{ $participante->name }}.* Agradecemos a sua participação na ação: *{{ $participante->rifa()->name }}*. Suas cotas são: *{{ $participante->numbersResumo() }}*" target="_blank"><b><span class="badge bg-success"><i class="fab fa-whatsapp"></i> Enviar Bilhete Whatsapp</span></b></a> --}}
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <label>{{ '(**) ***** - ' . substr($participante->telephone, -4) }}</label>
                            </div>
                            <div id="div-cotas" class="col-md-3" style="max-height: 100px; overflow: auto;">
                                <label>
                                    @foreach (json_decode($participante->numbers) as $number)
                                        {{ $number }}
                                    @endforeach
                                </label>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <label><span
                                        class="badge text-bg-success">{{ $participante->reservados > 0 ? 'Reservado' : 'PAGT CONFIRMADO' }}</span></label>
                            </div>
                        </div>
                    @endforeach

                </div>
                </br>
                <div class="w-100 d-flex flex-row align-items-center justify-content-center">
                    <nav aria-label="Page navigation example">
                        {{-- {{ dd($participantes) }} --}}
                        <ul class="pagination">
                            @if ($participantes->onFirstPage())
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            @endif
                            @foreach ($participantes->getUrlRange(1, $participantes->lastPage()) as $page => $url)
                                <li class="page-item {{ $participantes->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            @if ($participantes->hasMorePages())
                                <li class="page-item"><a class="page-link"
                                        href="{{ $participantes->nextPageUrl() }}">Next</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                </br>
            </div>
        </div>
    </div>

    <br><br>
@endsection

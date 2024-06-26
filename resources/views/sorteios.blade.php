@extends('layouts.app')

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

    function duvidas() {
        window.open('https://api.whatsapp.com/send?phone={{ $user->telephone }}', '_blank');
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
    </style>

    <div class="container app-main" id="app-main">
        
        <div class="row justify-content-center">
            <div class="col-md-4 col-12 rifas {{ $config->tema }}">
                <div class="app-title {{ $config->tema }}">
                    <h1><i class="fas fa-gifts"></i> Prêmios</h1>
                    <div class="app-title-desc {{ $config->tema }}">Escolha sua sorte</div>
                </div>
                <div class="content-fluid">
                    <p>🌟 Participe e Transforme Seu Destino! 🌟</p>
                    <p>Não deixe essa <b>oportunidade</b> passar. Participe agora e descubra o que o destino tem reservado para você. A sorte está lançada, e o próximo ganhador pode ser você!<br> Boa sorte! 🍀✨</p>
                </div>

                <div class="d-flex justify-content-center mb-4">
                    <span class="badge bg-info justify-content-center" id="btn-ativos" onclick="showAtivos(this)" style="cursor: pointer;width: 100px; height: 40px; display: flex; align-items: center; text-align: center !important">Ativos</span>
                    <span class="badge bg-secondary justify-content-center ml-2" id="btn-concluidos" onclick="showConcluidos(this)" style=" cursor: pointer;width: 100px; height: 40px; display: flex; align-items: center; text-align: center !important">Concluídos</span>
                </div>

               

                {{-- Outras Rifas --}}
                @foreach ($products->where('favoritar', '=', 0) as $product)
                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="sorteio sorteio-{{ strtolower($product->status) }} {{ $product->status == 'Finalizado' ? 'd-none' : '' }}">
                        <div class="card-rifa {{ $config->tema }}">
                            <div class="img-rifa">
                                <img src="/products/{{ $product->imagem()->name }}" alt="" srcset="">
                            </div>
                            <div class="title-rifa title-rifa-destaque {{ $config->tema }}">


                                <h1>{{ $product->name }}</h1>
                                <p>{{ $product->subname }}</p>

                                <div style="width: 100%;">
                                    {!! $product->status() !!}
                                    @if ($product->draw_date)
                                        <br>
                                        <span class="data-sorteio {{ $config->tema }}" style="font-size: 12px;">
                                            Data do sorteio {{ date('d/m/Y', strtotime($product->draw_date)) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                <hr>
                <!-- proibido para menores de 18 -->
                <div class="content">
                    <div onclick="duvidas()" class="container d-flex duvida" style="">
                        <div class="row">
                            <div class="d-flex icone-duvidas">🔞</div>
                            <div class="col text-duvidas {{ $config->tema }}">
                                <h6 class="mb-0 font-md f-15">Proibido para menores de +18</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Dúvidas pelo WhatsApp. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- proibido para menores de 18 -->
                <hr>
                <!-- Footer -->
            <div class="content mt-2">
                <footer class="bg-dark text-center text-white rounded-3">
                	<div class="text-center p-1" >
                		© 2023-2024 Versão 7.4 Dragon <i class="fa-solid fa-dragon"></i>
                		<a class="text-white" href="https://sistemadirifa.com/">sistemadirifa.com</a>
                	</div>
                </footer>
            </div>
            <!-- Footer -->
                <div class="mt-2">
                    
                </div>
            
            </div>
        </div>
    </div>

    <script>
        function showAtivos(el){
            document.getElementById('btn-concluidos').classList.remove('bg-info');
            document.getElementById('btn-concluidos').classList.add('bg-secondary');
            el.classList.add('bg-info');

            document.querySelectorAll('.sorteio').forEach((el) => {
                el.classList.add('d-none')
            });

            document.querySelectorAll('.sorteio-ativo').forEach((el) => {
                el.classList.remove('d-none')
            });
        }

        function showConcluidos(el){
            document.getElementById('btn-ativos').classList.remove('bg-info');
            document.getElementById('btn-ativos').classList.add('bg-secondary');
            el.classList.add('bg-info');

            document.querySelectorAll('.sorteio').forEach((el) => {
                el.classList.add('d-none')
            });

            document.querySelectorAll('.sorteio-finalizado').forEach((el) => {
                el.classList.remove('d-none')
            });
        }

    </script>

    <br><br>
@endsection

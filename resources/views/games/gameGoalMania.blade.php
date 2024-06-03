<!-- thegreg -->

@extends('layouts.app')

<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
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

@section('content')
<div class="container app-main" id="app-main">
    <div class="row justify-content-center">
        <div class="col-md-4 rifas">
            
            <!-- Rifa Destaque -->
            <div class="content-fluid">
                <div class="app-title {{ $config->tema }} text-center">
                    <h1><i class="fas fa-gamepad"></i> Goal Mania</h1>
                </div>
            </div>
            
            <div class="content-fluid">
                <div class="col-12">
                	<div class="row">
                	    <iframe id="myIframe" src="https://ncw.oztech.systems/api/rgs-api/1.1/launch?opid=900129055&amp;gid=305&amp;ul=pt&amp;t=FREE7GO854QY3ILJ20230616122057-PBS&amp;uc=BRL&amp;ly=D&amp;cid=0&amp;p=D" allowfullscreen="" width="100%" height="600"></iframe>
                	</div>
                </div>

            </div>
            <hr>
            <div class="content-fluid">
                <p>Este é um Jogo tradicional de Vídeo Bingo 5X3 com 10 Bolas Extras após o Sorteio Normal. Pode-se escolher a Moeda que deseja jogar, bem como a Aposta. As Cartelas e Números podem ser trocados. Conta com a opção de Jogo Automático e Configurações para Tela Cheia. O Botão Menu traz o detalhamento das Regras, Premiações e Features do Jogo. Aproveite!</p>
            </div>
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
@endsection

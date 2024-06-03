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
                    <h1><i class="fas fa-gamepad"></i> 3D Roulett</h1>
                </div>
            </div>
            
            <div class="content-fluid">
                <p>Segundo fontes oficiais, a roleta é um jogo de casino que foi jogado desde o 18 º século. Hoje, esse emocionante jogo de azar é disputado em todo o mundo. Ao longo de todos estes anos, o conceito de roleta sofreu algumas alterações e, como resultado, podemos agora desfrutar de uma vasta gama de jogos de roleta. Além disso, os jogadores modernos têm expectativas diferentes em comparação com os jogadores que jogaram jogos de cassino décadas atrás. É por isso que temos acesso a cassinos online, por exemplo. Mas, não é aqui que o uso da tecnologia na roleta para. Ou seja, um dos últimos sucessos neste campo é a roleta 3D.</p>
            </div>
            <hr>
            <div class="content-fluid">
                <div class="col-12">
                	<div class="row">
                		<iframe id="myIframe" src="https://pt.playbonds.com/Game/Load/2747/?Demo=yes&amp;REFERER=pt.playbonds.com&amp;IdSite=1&amp;Channel=Casino&amp;sl=pt" allowfullscreen="" width="100%" height="500"></iframe>
                	</div>
                </div>

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

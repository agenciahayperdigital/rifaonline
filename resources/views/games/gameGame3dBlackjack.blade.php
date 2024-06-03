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
                    <h1><i class="fas fa-gamepad"></i> Four Aces</h1>
                </div>
            </div>
            
            <div class="content-fluid">
                <div class="col-12">
                	<div class="row"><iframe id="myIframe" src="https://www.1x2gamingcdn.com/f1x2games/3DCasino/blackjack/?acc_id=5%7Cfun&amp;language=pt&amp;lang=pt&amp;gameID=2067&amp;gameName=3D+Blackjack&amp;gameType=BLACKJACK&amp;gameVersion=5&amp;playMode=fun&amp;path=https%3A%2F%2Flb.1x2networkhubasia.com%2Ff1x2games%2F&amp;site=101&amp;installID=1&amp;proLeague=PREM&amp;proLeagueName=null&amp;jurisdiction=none&amp;realitycheck_uk_elapsed=null&amp;realitycheck_uk_limit=null&amp;realitycheck_uk_proceed=null&amp;realitycheck_uk_exit=null&amp;realitycheck_uk_history=null&amp;realitycheck_uk_autospin=null&amp;rc_info=null&amp;ukgc_link=null&amp;desktop_launch=true&amp;isQuickFire=null&amp;clientName=theHub&amp;folderName=&amp;channel=desktop&amp;pathCDN=https%3A%2F%2Fwww.1x2gamingcdn.com%2Ff1x2games%2F&amp;geolocation=null&amp;confType=null&amp;keepAliveInterval=null&amp;keepAliveURL=null&amp;lobbyurl=https%3A%2F%2Fwww.playbonds.com&amp;wsPath=null&amp;NYX_GCM_ENV=null&amp;NYX_GCM_PARAMS=null&amp;elapsed_session_time=null&amp;slot_framework=null&amp;balanceBeforeSpin=false&amp;levelThreeID=1&amp;environment=production" allowfullscreen="" width="100%" height="600"></iframe>
                	</div>
                </div>

            </div>
            <hr>
            <!-- proibido para menores de 18 -->
            <div class="content">
                <div onclick="duvidas()" class="container d-flex duvida" style="">
                    <div class="row">
                        <div class="d-flex icone-duvidas">ðŸ”ž</div>
                        <div class="col text-duvidas {{ $config->tema }}">
                            <h6 class="mb-0 font-md f-15">Proibido para menores de +18</h6>
                            <p class="mb-0  font-sm f-12 text-muted">DÃºvidas pelo WhatsApp. Clique Aqui ðŸ“²</p>
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

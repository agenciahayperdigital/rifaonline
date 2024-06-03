<div class="card mt-3" style="border: none;border-radius: 10px;background-color: #f1f1f1;;height:auto;padding:10px;margin-bottom: 100px;">
    @if ($productModel->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() == 0)
        <h2 style="text-align: center">
            Aguardando Sorteio!
        </h2>
        <hr>
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Atenção!!</h4>
              <p>Atenção a todos os participantes! As reservas para o sorteio foram preenchidas rapidamente, agradecemos pelo entusiasmo! Em breve, divulgaremos o resultado que revelará os sortudos vencedores. Fiquem atentos e boa sorte a todos!</p>
              <hr>
              <div class="content">
                    <div onclick="duvidas()" class="container d-flex duvida" style="">
                        <div class="row">
                            <lord-icon
                                src="https://cdn.lordicon.com/kiynvdns.json"
                                trigger="loop"
                                delay="2000"
                                style="width:65px;height:65px">
                            </lord-icon>
                            <div class="col text-duvidas {{ $config->tema }}">
                                <h6 class="mb-0 font-md f-15">Suporte Online WhatsApp</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Dúvidas pelo WhatsApp. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @else
        {{--<h2 style="text-align: center">
            Sorteio Realizado
        </h2>--}}
    @endif



    @if (env('APP_URL') == 'rifasonline.link')
        <h4>
            Aguardando sorteio pela loteria federal
        </h4>
    @endif

    @if ($productModel->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() > 0)
        <h1 class="mt-3 text-center" id="ganhadores">
            <lord-icon
                src="https://cdn.lordicon.com/cqofjexf.json"
                trigger="loop"
                style="width:250px;height:250px">
            </lord-icon>
        </h1>
        @foreach ($productModel->premios()->where('descricao', '!=', '') as $premio)
            <div class="row mt-2 ">
                <div class="col-sm-12">
                    <label><strong>Prêmio {{ $premio->ordem }}: </strong>{{ $premio->descricao }}</label>
                </div>
                <div class="col-sm-12">
                    <label><strong>Ganhador: </strong>{{ $premio->ganhador }}</label>
                </div>
                <div class="col-sm-12">
                    <label><strong>Cota: </strong>{{ $premio->cota }}</label>
                </div>
            </div>
            <hr>
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Parabéns Ganhadores!</h4>
              <p>Parabéns aos felizardos ganhadores dos números sorteados! Que este momento de sorte seja apenas o início de uma jornada repleta de conquistas e alegrias.</p>
              <hr>
              <div class="content">
                    <div onclick="duvidas()" class="container d-flex duvida" style="">
                        <div class="row">
                            <lord-icon
                                src="https://cdn.lordicon.com/kiynvdns.json"
                                trigger="loop"
                                delay="2000"
                                style="width:65px;height:65px">
                            </lord-icon>
                            <div class="col text-duvidas {{ $config->tema }}">
                                <h6 class="mb-0 font-md f-15">Suporte Online WhatsApp</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Dúvidas pelo WhatsApp. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    
<div class="content">
    <div class="row">
        <img src="https://gifs.eco.br/wp-content/uploads/2023/06/imagens-de-selo-de-seguranca-png-23.png" />
    </div>
</div>

<!-- Footer -->
<div class="content mt-2">
    <footer class="bg-dark text-center text-white rounded-3">
        <div class="text-center p-1">
            © 2019- <?php $anoAtual = date('Y');
            echo "$anoAtual"; ?>
            <?php $URL_ATUAL = "$_SERVER[HTTP_HOST]";
            echo $URL_ATUAL; ?><br>
            Feito por: <a class="text-white" href="https://sistemadirifa.com/">Sistema di Rifas</a>
        </div>
    </footer>
</div>
<!-- Footer -->
</div>

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
        window.open('https://api.whatsapp.com/send?phone=55{{ $user->telephone }}', '_blank');
    }

    function verRifa(route) {
        window.location.href = route
    }
</script>

<script src="https://cdn.lordicon.com/lordicon.js"></script>
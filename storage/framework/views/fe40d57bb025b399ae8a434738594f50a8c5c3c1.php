<!-- CODIGO FACEBOOK ADD TO CART -->
<?php if(!is_null(@$data['ads']->PiexelAddToCart) && @$data['ads']->PiexelAddToCart !== ''): ?>
    <?php echo @$data['ads']->PiexelAddToCart; ?>
<?php endif; ?>
<!-- CODIGO FACEBOOK ADD TO CART -->


<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<style>
    body {
        background: #000 !important;
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
        window.open('https://api.whatsapp.com/send?phone=<?php echo e($user->telephone); ?>', '_blank');
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


<?php $__env->startSection('content'); ?>
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

        .title {
            text-align: center;
            font-size: 16px;
        }

        .title-payment-container {
            margin-bottom: 15px;
            padding: 0;
        }

        .title-payment-container .title-payment-content,
        .title-payment-container .title-payment-content .title-payment-icon {
            align-items: center;
            display: flex;
            flex-direction: row;
            justify-content: center;
            font-size: 30px;
        }

        .title-payment-container .title-payment-content .title-payment-texts {
            margin-left: 5px;
        }

        .title-payment-container .title-payment-content .title-payment-texts .title-payment-text {
            font-size: 16.68px;
            font-weight: 500;
            line-height: 1;
            margin-bottom: 3px;
        }

        .title-payment-container .title-payment-content .title-payment-texts .title-payment-sub {
            font-size: 13px;
        }

        .card-rifa-destaque {
            padding: 10px;
        }

        .detalhes-compra {
            font-size: 14px;
        }

        .title-payment-text.dark {
            color: #fff;
        }

        .title-payment-sub.dark {
            color: #fff
        }

        .payment-card.dark {
            color: #fff;
        }

        .detalhes-compra.dark {
            color: #fff;
        }
    </style>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <div class="container app-main" id="app-main">

        <div class="row justify-content-center">
            <div class="col-md-6 col-12 rifas <?php echo e($config->tema); ?>">
                <br><br>
                <section class="title-payment-container">
                    <section class="title-payment-content">
                        <section class="title-payment-icon">
                            <lord-icon src="https://cdn.lordicon.com/noobabzt.json" trigger="loop" delay="2000"
                                id="icon-style-payment" style="width:50px;height:50px">
                            </lord-icon>
                        </section>
                        <section class="title-payment-texts mt-3 ml-3">
                            <h2 class="title-payment-text <?php echo e($config->tema); ?>" id="payment-text" x-text="paymentText">
                                Aguardando Pagamento!</h2>
                            <p class="title-payment-sub <?php echo e($config->tema); ?>" id="payment-sub">Finalize o pagamento.</p>

                        </section>
                    </section>
                </section>

                <div class="progress_reserva d-none">
                    <p class="desc"><b>Tempo restante para pagamento: </b></p>
                    <span id="cpclock">
                        <span id="cpminutes"></span>:<span id="cpseconds"></span>
                    </span>
                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">
                        <div id="cpprogress" class="progress-bar progress-bar-striped progress-bar-animated"
                            style="width: 100%"></div>
                    </div>
                </div>

                <?php if($rifa->expiracao > 0): ?>
                    <div class="progress_reserva text-center" id="progress-bar">
                        <p class="desc"><b>Tempo restante para pagamento: </b></p>
                        <span id="qrclock">
                            <span id="qrminutes"></span> : <span id="qrseconds"></span>
                        </span>
                        <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100">
                            <div id="qrprogress" class="progress-bar progress-bar-striped progress-bar-animated"
                                style="width: 100%"></div>
                        </div>
                    </div>
                <?php endif; ?>


                <div id="divCart" class="card-rifa-destaque payment-card <?php echo e($config->tema); ?>">
                    <label class="mt-2">
                        <span class="badge bg-success">1</span>
                        Copie o código PIX abaixo.
                    </label>

                    <div class="" style="display: flex;justify-content: center;">
                        <input type="text" readonly
                            style="width: 100%; height: 40px;background-color: #fff;border: 1px solid #000;border-style: solid;border-radius: 5px;color: #000;"
                            id="brcodepix" value="<?php echo e($codePIX); ?>"></input>
                        <button type="button" id="clip_btn" class="btn blob bg-success"
                            style="color: #fff;font-weight: bold;min-width: 130px;margin-left:5px; height: 40px;"
                            data-toggle="tooltip" data-placement="top" title="COPIAR" onclick="copiar()">COPIAR</i></button>
                    </div>

                    <label class="mt-2">
                        <span class="badge bg-success">2</span>
                        Abra o app do seu banco e escolha a opção PIX, como se fosse fazer uma transferência.
                    </label>

                    <label class="mt-2">
                        <span class="badge bg-success">3</span>
                        Selecione a opção PIX copia e cola, cole a chave copiada e confirme o pagamento.
                    </label>
                    <hr>
                    <div class="mt-2" style="margin-top: 20px;text-align: center;">
                        <img src="data:image/jpeg;base64,<?php echo e($qrCode); ?>" style="width: 50%;">
                    </div>

                    <div class="text-center mt-2">
                        <h5>QR Code</h5>

                        <label>
                            Acesse o APP do seu banco e escolha a opção pagar com QR Code, escaneie o código acima e
                            confirme o pagamento.
                        </label>
                    </div>
                    <hr>
                    <div class="text-center mt-2">
                        <img src="https://d2r9epyceweg5n.cloudfront.net/stores/001/892/342/rte/compra%20segura.png"
                            width="300" height="60" />
                    </div>
                </div>
                <!--
                                                                                                        <?php if($rifaDestaque): ?>
    <a href="<?php echo e(route('product', ['slug' => $rifaDestaque->slug])); ?>">
                                                                                                                <div class="card-rifa <?php echo e($config->tema); ?>">
                                                                                                                    <div class="img-rifa">
                                                                                                                        <img src="/products/<?php echo e($rifaDestaque->imagem()->name); ?>" alt="" srcset="">
                                                                                                                    </div>
                                                                                                                    <div class="title-rifa title-rifa-destaque <?php echo e($config->tema); ?>">


                                                                                                                        <h1><?php echo e($rifaDestaque->name); ?></h1>
                                                                                                                        <p><?php echo e($rifaDestaque->subname); ?></p>

                                                                                                                        <div style="width: 100%;">
                                                                                                                            <?php echo $rifaDestaque->status(); ?>

                                                                                                                            <?php if($rifaDestaque->draw_date): ?>
    <br>
                                                                                                                                <span class="data-sorteio <?php echo e($config->tema); ?>" style="font-size: 12px;">
                                                                                                                                    Data do sorteio <?php echo e(date('d/m/Y', strtotime($rifaDestaque->draw_date))); ?>

                                                                                                                                    
                                                                                                                                </span>
    <?php endif; ?>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </a>
    <?php endif; ?> -->

                <div class="card-rifa-destaque detalhes-compra <?php echo e($config->tema); ?>">
                    <label>
                        <i class="fas fa-info-circle"></i>&nbsp; Detalhes da sua compra
                    </label>
                    <br>
                    <label>
                        <strong>Comprador: </strong> <?php echo e($participante->name); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Telefone: </strong> <?php echo e($participante->telephone); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Pedido: </strong> #<?php echo e($participante->id); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Data/horário: </strong> <?php echo e(date('d/m/Y H:i', strtotime($participante->created_at))); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Expira Em: </strong> <?php echo e(date('d/m/Y H:i', strtotime($participante->expiracao()))); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Situação: </strong> <?php echo e($participante->status()); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Quantidade: </strong> <?php echo e(count($participante->numbers())); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Total: </strong> R$ <?php echo e($price); ?>

                    </label>
                    <br>
                    <label>
                        <strong>Cotas: </strong>
                        <?php if($rifa->modo_de_jogo == 'numeros'): ?>
                            <?php if($rifa->type_raffles == 'automatico'): ?>
                                <div id="div-cotas" style="max-height: 300px;overflow: auto;">
                                    <span id="cotas-pending">Serão geradas após o pagamento!</span>
                                </div>
                            <?php else: ?>
                                <?php $__currentLoopData = $participante->numbers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key > 0): ?>
                                        ,
                                    <?php endif; ?>
                                    <?php echo e($number); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $participante->reservados(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key > 0): ?>
                                    ,
                                <?php endif; ?>
                                <?php echo e($number->grupoFazendinha()); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </label>
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
                <br>

            </div>
        </div>
    </div>

    <script>
        function copiar() {
            var copyText = document.getElementById("brcodepix");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            document.getElementById("clip_btn").innerHTML = 'COPIADO';

            alert("Chave PIX COPIA E COLA copiado com sucesso.");
        }

        let freezeTimmer = new Date().setMinutes(new Date().getMinutes());
        let countdownDate = new Date().setMinutes(new Date().getMinutes() + <?php echo $minutosRestantes; ?>)
        let countDifference = countdownDate - freezeTimmer;
        let timerInterval;
        const minutesElem = document.querySelector("#cpminutes"),
            secondsElem = document.querySelector("#cpseconds"),
            qRminutesElem = document.querySelector("#qrminutes"),
            qRsecondsElem = document.querySelector("#qrseconds"),
            timerRunnigContent = document.querySelector("#divCart"),
            timerEndContent = document.querySelector("#divPixTimeOut"),
            cpProgressElementBar = document.querySelector("#cpprogress"),
            qrProgressElementBar = document.querySelector("#qrprogress");

        const formatZero = (time) => {
            let dateFormated,
                calculated = Math.floor(Math.log10(time) + 1);

            if (calculated < 1) {
                dateFormated = `<span>0${time}</span>`;
            }
            if (calculated === 1) {
                dateFormated = `<span>0${time}</span>`;
            }
            if (calculated > 1) {
                dateFormated = `<span>${time}</span>`;
            }

            return dateFormated;
        }

        const progressBarPercent = (difference, timeTotal) => {
            let color;
            let percent = Math.floor((difference * 100) / timeTotal);
            switch (percent) {
                case 100:
                    color = "bg-success";
                    break;
                case 55:
                    color = "bg-info";
                    break;
                case 35:
                    color = "bg-warning";
                    break;
                case 25:
                    color = "bg-danger";
                    break;
            }

            return data = new Array(percent, color);
        }

        const startCountdown = () => {
            const now = new Date().getTime();
            const countdown = new Date(countdownDate).getTime();
            const difference = (countdown - now) / 1000;

            let countedDifference = Math.floor(difference) * 1000;
            let countedFinalTimmer = Math.floor(countdownDate - freezeTimmer);
            let progressBar = progressBarPercent(countedDifference, countedFinalTimmer);


            if (difference < 1) {
                endCountdown();
            }

            let days = Math.floor((difference / (60 * 60 * 24)));
            let hours = Math.floor((difference % (60 * 60 * 24)) / (60 * 60));
            let minutes = Math.floor((difference % (60 * 60)) / 60);
            let seconds = Math.floor(difference % 60);

            minutesElem.innerHTML = formatZero(minutes);
            secondsElem.innerHTML = formatZero(seconds);
            qRminutesElem.innerHTML = formatZero(minutes);
            qRsecondsElem.innerHTML = formatZero(seconds);
            cpProgressElementBar.setAttribute("aria-valuenow", progressBar[0]);
            qrProgressElementBar.setAttribute("aria-valuenow", progressBar[0]);
            cpProgressElementBar.classList.add(progressBar[1]);
            qrProgressElementBar.classList.add(progressBar[1]);
            cpProgressElementBar.style.width = progressBar[0] + '%'
            qrProgressElementBar.style.width = progressBar[0] + '%'


        }

        const endCountdown = () => {
            document.getElementById("divCart").classList.add('d-none');
            document.getElementById('payment-icon').style.color = 'red';
            document.getElementById('payment-icon').classList = 'fas fa-times-circle';
            document.getElementById('payment-text').innerHTML = 'RESERVA EXPIRADA!'
            document.getElementById('payment-sub').innerHTML = 'Realize uma nova reserva!'
            document.getElementById('cotas-pending').innerHTML = "Expiradas";
            document.getElementById("progress-bar").classList.add('d-none');
            clearInterval(timerPix);
            clearInterval(timerInterval);
            document.getElementById("progress-bar").classList.add('d-none');

            clearInterval(timerInterval);
            timerRunnigContent.className = 'hidden';
            timerEndContent.style.display = 'block';
        }

        var expiracao = <?php echo e($rifa->expiracao); ?>;
        window.addEventListener('load', () => {
            if (expiracao > 0) {
                startCountdown();
                timerInterval = setInterval(startCountdown, 1000);
            }
        });


        $(document).ready(function() {
            let timerPix = setInterval(function checkPixSuccess() {
                $.ajax({
                    url: "<?php echo e(route('findPixStatus', $codePIXID . '-' . $productID)); ?>",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json'
                    },
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        'id': "<?php echo e($codePIXID); ?>",
                        'product_id': "<?php echo e($productID); ?>"

                    },

                    success: function(data) {
                        if (data.status === true) {

                            const icon = document.getElementById('icon-style-payment');
                            console.log(icon);
                            icon.setAttribute('src', 'https://cdn.lordicon.com/dangivhk.json');
                            const titlePaymentText = document.getElementById('payment-text');
                            titlePaymentText.innerText = 'PAGAMENTO CONFIRMADO!';
                            const subTitlePaymentText = document.getElementById('payment-sub');
                            subTitlePaymentText.innerText = 'Boa Sorte !'

                            setTimeout(function() {
                                window.location.href =
                                    "<?php echo e(route('pagamentoSucesso', [$rifa, $participante])); ?>";
                            }, 2000);

                        }
                    }
                });

            }, 2000);
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/villa300/public_html/resources/views/new-checkout.blade.php ENDPATH**/ ?>
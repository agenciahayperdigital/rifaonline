<style>
    .disponivel-rm {
        background-color: #A0A1A3;
        color: #fff;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .reservadas-rm {
        background-color: #F0BF1A;
        color: #fff;
    }

    .pagas-rm {
        background-color: #6C757E;
        color: #fff;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>

<div class="content">
    <div class="row">
        <div class="col-md-12 text-center">
            <!-- Facebook -->
            <a class="btn btn-primary" style="background-color: #2760AE;border: none;font-size: 20px;"
                href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank"
                rel="noreferrer noopener" role="button"><i class="bi bi-facebook"></i></a>
            <!-- Telegram -->
            <a class="btn btn-primary" style="background-color: #2F9DDF;border: none;"
                href="https://t.me/+5511916059141" target="_blank" rel="noreferrer noopener" role="button"><i
                    class="bi bi-telegram" style="font-size: 20px;"></i></a>
            <!-- Whatsapp -->
            <a class="btn btn-primary" style="background-color: #25d366;border: none;"
                href="https://api.whatsapp.com/send?text={{ Request::url() }}" target="_blank" rel="noreferrer noopener"
                role="button"><i class="bi bi-whatsapp" style="font-size: 20px;"></i></a>
            <!-- Twitter -->
            <a class="btn btn-primary" style="background-color: #34B3F7;border: none;"
                href="https://twitter.com/intent/tweet?text=Vc%20pode%20ser%20o%20Próximo%20Ganhador%20{{ Request::url() }}"
                target="_blank" rel="noreferrer noopener" role="button"><i class="bi bi-twitter"
                    style="font-size: 20px;"></i></a>
        </div>
    </div>
</div>

<br>

@if (env('REQUIRED_DESCRIPTION'))
    <div class="content">
        <div class="card">
            <h5 class="card-header">
                <lord-icon src="https://cdn.lordicon.com/akqsdstj.json" trigger="loop"
                    style="width:20px;height:20px"></lord-icon> Descrição <small
                    class="text-muted title-promo {{ $config->tema }}" style="font-size: 15px;">Saiba mais sobre o
                    sorteio!</small>
            </h5>
            <div class="card-body">
                <p>
                    {!! $productDescription !!}
                </p>
            </div>
        </div>
    </div>
@endif

<div class="content" id="rafflesSection" style="margin-top: 10px;text-align: center">
    <div class="alert alert-success" role="alert">
        <i class="bi bi-award"></i> Escolha você mesmo clicando no(s) número(s) desejado(s)!!!
    </div>
</div>

<input type="number"
    style="text-align: center;background-color: #E5E5E5;color: #000000;font-weight: bold; display:none" id="numbersA"
    value="{{ $productModel->minimo }}" min="{{ $productModel->minimo }}" max="{{ $productModel->maximo }}"
    onblur="numerosAleatorio();" onkeyup="numerosAleatorio()" class="form-control" placeholder="Quantidade de cotas">

@if (env('APP_URL') == 'rifasonline.link')
    <div class="d-flex justify-content-between font-weight-600 mb-2" style="font-size: 12px;">
        <div class="col-md-4 p-1 text-center disponivel-rm">
            COTAS <br> DISPONÍVEIS ({{ $productModel->qtdNumerosDisponiveis() }})
        </div>
        <div class="col-md-4 p-1 text-center reservadas-rm">
            COTAS <br> RESERVADAS ({{ $productModel->qtdNumerosReservados() }})
        </div>
        <div class="col-md-4 p-1 text-center pagas-rm">
            COTAS <br> PAGAS ({{ $productModel->qtdNumerosPagos() }})
        </div>
    </div>
@else
    <div class="d-flex justify-content-between font-weight-600 mb-2">
        <div class="seletor-item rounded d-flex justify-content-between box-shadow-08 font-xs" style="cursor: pointer;"
            onclick="showNumbers('disponivel')">
            <div class="nome bg-white rounded-start text-dark p-2">
                Livres
            </div>
            <div class="num bg-cota text-white p-2 rounded-end">
                {{ $productModel->qtdNumerosDisponiveis() }}
            </div>
        </div>

        <div class="seletor-item rounded d-flex justify-content-between box-shadow-08 font-xs" style="cursor: pointer;"
            onclick="showNumbers('reservado')">
            <div class="nome bg-white rounded-start text-dark p-2">
                Reserv
            </div>
            <div class="num bg-info text-white p-2 rounded-end">
                {{ $productModel->qtdNumerosReservados() }}
            </div>
        </div>

        <div class="seletor-item rounded d-flex justify-content-between box-shadow-08 font-xs" style="cursor: pointer;"
            onclick="showNumbers('pago')">
            <div class="nome bg-white rounded-start text-dark p-2">
                Pagos
            </div>
            <div class="num bg-success text-white p-2 rounded-end">
                {{ $productModel->qtdNumerosPagos() }}
            </div>
        </div>
    </div>
@endif




<div class="content text-center">
    <div class="raffles {{ $product[0]->status == 'Finalizado' ? 'finished' : '' }}" id="raffles">
        <div id="message-raffles" class="blob" style="background: green; color: #fff"> </div>
    </div>
</div>



<div class="d-flex justify-content-center">
    <div class="payment" id="payment" style="display: none; width: 500px !important;margin-bottom: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-12 col-9" style="background-color: #fff; color: #000; border-radius: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center" style="width: 100%">
                            <span id="numberSelected" class="scrollmenu"></span>
                        </div>
                    </div>
                    <div class="row"
                        style="text-align: center;background-color: #fff; margin-top: 5px; justify-content-center; margin-bottom: 10px;">
                        <div class="col-12 d-flex justify-content-center">
                            <center style="width: 400px;">
                                <button type="button" class="btn btn-danger reservation blob"
                                    style="border: none;color: #fff;font-weight: bold;width: 100%;background-color: green"
                                    onclick="openModalCheckout()"><i class="far fa-check-circle"></i>&nbsp;Participar
                                    do
                                    sorteio
                                    <span style="font-size: 14px; float:right"><span
                                            id="numberSelectedTotal"></span></span></button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<script src="https://cdn.lordicon.com/lordicon.js"></script>

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

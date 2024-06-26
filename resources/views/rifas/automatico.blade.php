<style>
    .body-compra-auto {
        background-color: #fff;
        border: none;
        border-radius: 10px;
    }

    .body-compra-auto.dark {
        background: #222222;
    }

    .title-compra-auto h5 {
        color: #000;
    }

    .title-compra-auto span {
        color: #000;
    }

    .title-compra-auto.dark h5 {
        color: #fff;
    }

    .title-compra-auto.dark span {
        color: #fff;
    }

    .btn-add-qtd {
        color: #000;
        background-color: #fff;
        border-radius: 0px;
        padding: 10px;
        margin: 2px;
        border: 1px solid;
        width: 100%;
        min-width: 50px;
        max-width: 300px;
    }

    .btn-add-qtd.dark {
        background: rgba(0, 0, 0, .1) !important;
        border-color: rgba(0, 0, 0, .1) !important;
        color: #fff !important;
    }
</style>
<script src="https://cdn.lordicon.com/lordicon.js"></script>


{{-- Promoções --}}
@if ($productModel->promocoes()->where('qtdNumeros', '>', 0)->count() > 0)
    <div class="content">
        <div class="card">
            <h5 class="card-header">
                <lord-icon src="https://cdn.lordicon.com/qnwzeeae.json" trigger="loop"
                    style="width:20px;height:20px"></lord-icon> Promoção <small
                    class="text-muted title-promo {{ $config->tema }}" style="font-size: 15px;">Compre mais
                    barato!</small>
            </h5>
            <div class="card-body">
                <div class="row">
                    @foreach ($productModel->promocoes()->where('qtdNumeros', '>', 0) as $promo)
                        @if ($productModel->type_raffles == 'manual')
                            <div class="col-12" style="margin-bottom: 8px;" onclick="infoPromo()">
                                <div id="item-promocao-desconto"
                                    class="bg-success d-flex align-items-center justify-content-around py-2"
                                    style="color: #fff;text-align: center;border-radius:6px;">
                                    <div>
                                        <strong>
                                            {{ $promo->qtdNumeros }} Por: R$ {{ $promo->valorFormatted() }}
                                        </strong>
                                    </div>
                                    <div class="text-decoration-line-through">
                                        R$
                                        {{ number_format($promo->qtdNumeros * floatval(str_replace(',', '.', $productModel->price)), 2, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-12" style="margin-bottom: 4px;"
                                onclick="addQtd('{{ $promo->qtdNumeros }}', '{{ $promo->valorFormatted() }}')">
                                <div id="item-promocao-desconto"
                                    class="bg-success d-flex align-items-center justify-content-around py-1"
                                    style="color: #fff;text-align: center;border-radius:6px;">
                                    <div>
                                        <strong>
                                            {{ $promo->qtdNumeros }} Cotas de: R$ {{ number_format($promo->qtdNumeros * floatval(str_replace(',', '.', $productModel->price)), 2, ',', '.') }} 
                                        </strong>
                                    </div>
                                    <div >
                                        <b>por: R$ {{ $promo->valorFormatted() }}</b>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr>
@endif

<div class="content-fluid">
    <div class="card text-center">
        <div class="card-header">
            <b>SELECIONE A QUANTIDADE DE COTAS.</b>
        </div>

        <div class="card-body body-compra-auto {{ $config->tema }}">
            <div class="" style="">
                <?php $resultNumber = $totalPago; ?>
            </div>
            <div class="row d-flex justify-content-center">
                @foreach ($productModel->comprasAuto()->where('qtd', '>', 0) as $compra)
                    <div class="col-6">
                        <div class="btn btn-add-qtd {{ $config->tema }} {{ $compra->popular ? 'btn-popular' : '' }}"
                            onclick="addQtd('{{ $compra->qtd }}')">
                            <span style="font-weight: 500">+
                                {{ $compra->qtd < 10 ? '0' : '' }}{{ $compra->qtd }} cotas</span><br>
                            <span style="font-size: 14px;font-weight: bold;">SELECIONAR</span>
                            {{--@if ($compra->popular)
                                <span class="badge bg-success text-popular">MAIS POPULAR</span>
                            @endif--}}
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <div class="amount">
                <div class="form-group"
                    style="margin-bottom: 0;display: flex;justify-content: center;flex-direction: inherit;align-items: center;">
                    <button class="btn-amount-qtd" onclick="addQtd('-')"
                        style="color: #000;margin-right: 5px;">-</button>
                    <input type="number"
                        style="text-align: center;background-color: #E5E5E5;color: #000000;font-weight: bold;"
                        id="numbersA" value="{{ $productModel->minimo }}" min="{{ $productModel->minimo }}"
                        max="{{ $productModel->maximo }}" onblur="numerosAleatorio();" onkeyup="numerosAleatorio()"
                        class="form-control" placeholder="Quantidade de cotas">
                    <button class="btn-amount-qtd" onclick="addQtd('+')"
                        style="color: #000;margin-left: 5px;">+</button>
                </div>

            </div>
        </div>

        <div class="card-footer text-muted">
            <button type="button"
                class="btn btn-danger reservation btn-amount blob bg-success d-flex flex-column align-items-center justify-content-center"
                style="color: #fff;border: none;width: 100%;margin-top: 10px;font-weight: bold;" onclick="validarQtd()">
                <div><i class="far fa-check-circle"></i>&nbsp;Participar do sorteio </div>
                <div id="numberSelectedTotalHome" style="color: #fff;float:right"></div>
            </button>
        </div>
    </div>
</div>
<hr>
{{-- ###TESTE COTAS PREMIADAS --}}
@if (isset($cotas) && $cotas->type_raffles === 'automatico')

    @if ($productModel->temCotasPremiadas()[0])

        <div class="content">
            <div class="card">
                <h5 class="card-header">
                    <lord-icon src="https://cdn.lordicon.com/hgqdtxby.json" trigger="loop" delay="1000"
                        style="width:20px;height:20px">
                    </lord-icon>
                    Cotas Prêmiadas <small class="text-muted title-promo {{ $config->tema }}"
                        style="font-size: 15px;">Ache e ganhe!</small>
                </h5>
                <div class="card-body">
                    @php

                        $cotas_premiadas = explode(',', $cotas->cotas_premiadas);
                    @endphp
                    <div class="row">
                        @foreach ($cotas_premiadas as $cota_premiada)
                            @if (intval($cota_premiada) > 0)
                                <div class="col-md-4 col-6" style="margin-bottom: 8px;">
                                    <div class="{{ $productModel->cotaPremiadaTemGanhador($cota_premiada) ? 'bg-danger' : 'bg-success' }}"
                                        style="color: #fff;text-align: center;border-radius:6px;">
                                        <strong>Cota: {{ $cota_premiada }}</strong>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    @endif

@endif
{{-- ###FIM TESTE COTAS PREMIADAS --}}

@if (env('REQUIRED_DESCRIPTION'))
    <hr>
    <div class="content">
        <div class="card">
            <h5 class="card-header">
                <lord-icon src="https://cdn.lordicon.com/ujxzdfjx.json" trigger="loop" delay="2000"
                    style="width:20px;height:20px">
                </lord-icon>
                Descrição <small class="text-muted title-promo {{ $config->tema }}" style="font-size: 15px;">Saiba mais
                    sobre o sorteio!</small>
            </h5>
            <div class="card-body">
                <p>
                    {!! $productDescription !!}
                </p>
            </div>
        </div>
    </div>
@endif

@if ($productModel->parcial)
    <hr>
    <div class="content">
        <div class="card">
            <h5 class="card-header">
                <lord-icon src="https://cdn.lordicon.com/ofcynlwa.json" trigger="loop" delay="1000" stroke="light"
                    colors="primary:#121131,secondary:#eee966,tertiary:#e8b730,quaternary:#ffc738"
                    style="width:20px;height:20px">
                </lord-icon>
                Progresso do Sorteio <small class="text-muted title-promo {{ $config->tema }}"
                    style="font-size: 15px;">Acompanhe!</small>
            </h5>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="progress-sell">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated {{ env('APP_URL') == 'rifasonline.link' ? 'bg-secondary' : 'bg-success' }}"
                                    role="progressbar" style="width: {{ $productModel->porcentagem() }}%"
                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    {{ $productModel->porcentagem() }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif

{{-- Ranking de compradores (WDM) --}}
@if (count($ranking) > 0)
    <hr>
    <div class="content">
        <div class="card">
            <h5 class="card-header">
                <lord-icon src="https://cdn.lordicon.com/jdngjjzg.json" trigger="loop" delay="1000" stroke="light"
                    style="width:20px;height:20px">
                </lord-icon>
                Ranking de Compradores
            </h5>
            <div class="card-body">
                <div class="row" style="display: flex;justify-content:center;position:relative">
                    @foreach ($ranking as $key => $rk)
                        <div class="btn-auto item-ranking">
                            {{ $key + 1 }}º {{ $productModel->medalhaRanking($key) }}<br>
                            <span style="font-size: 20px;font-weight: bold;">{{ $rk->name }}</span>
                            <br>
                            <span style="font-size: 12px;">Qtd. de Bilhetes
                                {{ $rk->totalReservas }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

<style>
    .body-ranking {
        background-color: #fff;
        border: none;
        border-radius: 4px;
        margin-top: 10px;
    }

    .body-ranking.dark {
        background: #222222;
    }

    .title-ranking h5 {
        color: #000;
    }

    .title-ranking span {
        color: #000;
    }

    .title-ranking.dark h5 {
        color: #fff;
    }

    .title-ranking.dark span {
        color: #fff;
    }

    .body-promo {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        margin-top: 20px;
    }

    .body-promo.dark {
        background: #222222;
    }

    .title-promo.dark {
        color: #fff !important;
    }
</style>

<script src="https://cdn.lordicon.com/lordicon.js"></script>

<!-- Footer -->
<div class="content mt-2">
    <footer class="bg-dark text-center text-white rounded-3">
        <div class="text-center p-1">
            © 2019- <?php $anoAtual = date('Y');
            echo "$anoAtual"; ?>
            <?php $URL_ATUAL = "$_SERVER[HTTP_HOST]";
            echo $URL_ATUAL; ?>
        </div>
    </footer>
</div>
<!-- Footer -->
<div class="mt-2">

</div>

<!-- thegreg -->

@extends('layouts.app')
@section('content')

    <br>
    <div class="container app-main" id="app-main">
        <div class="row justify-content-center">
            <div class="col-sm-5 rifas {{ $config->tema }}">

                <!-- Rifa Destaque -->
                <div class="content-fluid">
                    <div class="app-title {{ $config->tema }}">
                        <h1>
                            <lord-icon src="https://cdn.lordicon.com/qxqvtswi.json" trigger="loop" delay="1000" stroke="light"
                                style="width:20px;height:20px">
                            </lord-icon> Sorteios
                        </h1>
                        <div class="app-title-desc {{ $config->tema }}">Escolha sua sorte </div>
                    </div>

                    {{-- Rifa em destaque --}}
                    @foreach ($products->where('favoritar', '=', 1) as $product)
                        @if ($product->status !== 'Deletado')
                            <a href="{{ route('product', ['slug' => $product->slug]) }}">

                                <div class="card-rifa-destaque {{ $config->tema }}">
                                    <div>
                                        <div class="ribbon"><span>participe</span></div>
                                        <img src="/products/{{ $product->imagem()->name }}" width="100%" />
                                    </div>
                                    <div class="title-rifa-destaque {{ $config->tema }} text-center">
                                        <h1>{{ $product->name }}</h1>
                                        <p>{{ $product->subname }}</p>
                                        <div style="width: 100%;">
                                            {!! $product->status() !!}
                                            @if ($product->draw_date)
                                                <br>
                                                <span class="data-sorteio {{ $config->tema }}" style="font-size: 13px;">
                                                    <b>Data do Sorteio:
                                                        {{ date('d/m/Y', strtotime($product->draw_date)) }}</b>
                                                    {{-- {!! $product->dataSorteio() !!} --}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <!-- Rifa destaque -->

                <!-- outras rifas do site -->
                {{-- Outras Rifas --}}
                @foreach ($products->where('favoritar', '=', 0) as $product)
                    @if ($product->status !== 'Deletado')
                        <div class="content mt-2">

                            <a href="{{ route('product', ['slug' => $product->slug]) }}">
                                <div class="card-rifa {{ $config->tema }}">
                                    <div class="img-rifa">
                                        <img src="/products/{{ $product->imagem()->name }}" width="100%">
                                    </div>
                                    <div class="title-rifa title-rifa-destaque {{ $config->tema }}">


                                        <h1>{{ $product->name }}</h1>
                                        <p>{{ $product->subname }}</p>

                                        <div style="width: 100%;">
                                            {!! $product->status() !!}
                                            @if ($product->draw_date)
                                                <br>
                                                <span class="data-sorteio {{ $config->tema }}" style="font-size: 12px;">
                                                    <b>Sorteio: {{ date('d/m/Y', strtotime($product->draw_date)) }}</b>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <hr>
                    @endif
                @endforeach
                <!-- outras rifas do site -->

                <!-- ganhadores do site -->
                @if ($ganhadores->count() > 0)
                    <div class="content mt-2">

                        <div class="app-title {{ $config->tema }} text-center">
                            <h1>🏆 Ganhadores</h1>
                            <div class="app-title-desc {{ $config->tema }}">Confira os sortudos!</div>
                        </div>
                        <div class="ganhadores">

                            {{-- Ganhador manual (editar rifa) --}}
                            @foreach ($winners as $winner)
                                <div class="ganhador {{ $config->tema }}"
                                    onclick="verRifa('{{ route('product', ['slug' => $winner->slug]) }}')">
                                    <div class="ganhador-foto">
                                        <img src="images/sem-foto.jpg" class="" alt="{{ $winner->name }}"
                                            style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                    </div>
                                    <div class="ganhador-desc {{ $config->tema }}">
                                        <h3>{{ $winner->winner }}</h3>
                                        <p>
                                            <strong>Sorteio: </strong>
                                            {{ date('d/m/Y', strtotime($winner->draw_date)) }}
                                        </p>
                                    </div>
                                    <div class="ganhador-rifa">
                                        <img src="/products/{{ $winner->imagem()->name }}">
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($ganhadores as $ganhador)
                                <div class="ganhador {{ $config->tema }}"
                                    onclick="verRifa('{{ route('product', ['slug' => $ganhador->rifa()->slug]) }}')">
                                    <div class="ganhador-foto">
                                        @if ($ganhador->foto)
                                            <img src="{{ asset($ganhador->foto) }}" class="" alt=""
                                                style="min-height: 80px; max-height: 80px;border-radius:10px;">
                                        @else
                                            <img src="images/sem-foto.jpg" class="" alt=""
                                                style="min-height: 80px; max-height: 80px;border-radius:10px;">
                                        @endif

                                    </div>
                                    <div class="ganhador-desc {{ $config->tema }}">
                                        <h3>{{ $ganhador->ganhador }} 🎉</h3>
                                        <p>
                                            <strong>Prêmio:</strong> {{ $ganhador->descricao }} <br>
                                            <strong>Cota Prêmiada:</strong> <span class="badge bg-success p-1"
                                                style="border-radius: 5px;">{{ $ganhador->cota }}</span> <br>
                                            <strong>Sorteio: </strong>
                                            {{ date('d/m/Y', strtotime($ganhador->rifa()->draw_date)) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <hr>
                @endif
                <!-- ganhadores do site -->

                <!-- Suporte -->
                <div class="content">
                    <div href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultar-reservas"
                        onclick="openModal()" class="container d-flex duvida" style="">
                        <div class="row">
                            <lord-icon src="https://cdn.lordicon.com/qxqvtswi.json" trigger="loop" stroke="light"
                                delay="1000" style="width:65px;height:65px">
                            </lord-icon>
                            <div class="col text-duvidas {{ $config->tema }}">
                                <h6 class="mb-0 font-md f-15">Confira Seus Bilhetes Online</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Veja todos os seus bilhetes. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- suporte -->
                <hr>
                <!-- Suporte -->
                <div class="content">
                    <div onclick="duvidas()" class="container d-flex duvida" style="">
                        <div class="row">
                            <lord-icon src="https://cdn.lordicon.com/kiynvdns.json" trigger="loop" delay="2000"
                                style="width:65px;height:65px">
                            </lord-icon>
                            <div class="col text-duvidas {{ $config->tema }}">
                                <h6 class="mb-0 font-md f-15">Suporte Online WhatsApp</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Dúvidas pelo WhatsApp. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- suporte -->
                <hr>
                <!-- proibido para menores de 18 -->
                <div class="content">
                    <div onclick="duvidas()" class="container d-flex duvida" style="">
                        <div class="row">
                            <lord-icon src="https://cdn.lordicon.com/xjvrxoon.json" trigger="loop" delay="1500"
                                style="width:65px;height:65px">
                            </lord-icon>
                            <div class="col text-duvidas {{ $config->tema }}">
                                <h6 class="mb-0 font-md f-15">Proibido para menores de +18</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Dúvidas sobre como jogar. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- proibido para menores de 18 -->
                <hr>

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
                <br>

            </div>
        </div>
    </div>

@endsection

<script src="https://cdn.lordicon.com/lordicon.js"></script>
<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

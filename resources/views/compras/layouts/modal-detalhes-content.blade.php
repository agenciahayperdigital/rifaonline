<!-- thegreg -->
<style>
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

<div style="font-size: 14px;">
    <div class="row">
        <div class="d-grid gap-2">
            <a href="{{ $participante->linkWpp() }}&text=Olá {{ $participante->name }}. Agradecemos a sua participação na ação: {{ $participante->rifa()->name }}. Identificamos que suas cotas não foram pagas ainda! Entre no site clique na lupa e faça seu pagamento!" target="_blank" class=" btn btn-success btn-sm"><b><i class="bi bi-whatsapp"></i> COBRAR COM LINK </b></a>
            <a href="{{ $participante->linkWpp() }}&text=Olá {{ $participante->name }}. O primeiro passo você ja deu. Recebemos seu pagamento. Agora é só aguardar o sorteio e torcer para ser o próximo ganhador!! Ação: {{ $participante->rifa()->name }}" target="_blank" class=" btn btn-success btn-sm"><b><i class="bi bi-whatsapp"></i> PAGAMENTO RECEBIDO </b></a>
            <a href="{{ $participante->linkWpp() }}&text=Olá {{ $participante->name }}. Você foi o *GANHADOR* da ação: {{ $participante->rifa()->name }}" target="_blank" class=" btn btn-success btn-sm"><b><i class="bi bi-whatsapp"></i> NOTIFICAR GANHADOR </b></a>
            <a href="{{ $participante->linkWpp() }}&text=Olá {{ $participante->name }}. Seu bilhete é: *{{ $participante->id }}.* Total de cotas compradas são: *{{ count($participante->numbers()) }}.* Você está participando do sorteio: *{{ $participante->rifa()->name }}.* Para conferir seus números da sorte, basta entrar no site e digitar seu telefone cadastrado! " target="_blank" class=" btn btn-success btn-sm"><b><i class="bi bi-whatsapp"></i> ENVIAR BILHETE </b></a>
        </div>
    </div>
    <hr>
    
    <!--<div class="row mt-2">
        @foreach ($msgs as $msg)
            <div class="col-md-4">
                @if ($config->token_api_wpp != null)
                    <a href="#" onclick="sendWppMsg(this)" data-msg="{{ $msg->id }}"
                        data-participante="{{ $participante->id }}" class="btn btn-sm btn-secondary"
                        style="width: 100%;"><i class="fab fa-whatsapp"></i>&nbsp; {{ $msg->titulo }}</a>
                @else
                    <a href="{{ $msg->generateLink($participante) }}" target="_blank" class="btn btn-sm btn-secondary"
                        style="width: 100%;"><i class="fab fa-whatsapp"></i>&nbsp; {{ $msg->titulo }}</a>
                @endif
            </div>
        @endforeach
    </div> -->

    <div id="teste-imp">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <div class="row">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">TITULAR DA COTA</label>
                <input type="text" class="form-control" disabled value="{{ $participante->name }}" />
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">TELEFONE CADASTRADO</label>
                <input type="text" class="form-control" disabled value="{{ $participante->telephone }}" />
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">PARTICIANDO DO SORTEIO</label>
                <input type="text" class="form-control" disabled value="{{ $participante->rifa()->name }}" />
                <div id="emailHelp" class="form-text">Essa reserva e <b>Intransferível.</b> O número que estiver cadastrado tem direito total sobre as cotas selecionadas.</div>
            </div>
        </div>
        
        <div class="raffles">
            <label>COTAS ESCOLHIDAS</label> <br>
            <div id="div-cotas" style="max-height: 200px;overflow: auto;">
                @if ($participante->pagos > 0)
                    @foreach ($participante->numbers() as $number)
                        <span class="badge bg-success"> <i class="fa fa-check"></i> {{ $number }}</span>
                    @endforeach
                @else
                    @foreach ($participante->numbers() as $number)
                        <span class="badge bg-secondary"> <i class="fa fa-clock"></i> {{ $number }}</span>
                    @endforeach
                @endif
            </div>
        </div>

        <hr>

        <div class="row mt-4">
            <div class="col-md-4">
                <label>Subtotal</label> <br>
                <span>R$ {{ number_format($participante->valor, 2, ',', '.') }}</span>
            </div>

            <div class="col-md-4">
                <label>Desconto</label> <br>
                <span>R$ 0,00</span>
            </div>

            <div class="col-md-4">
                <label>Subtotal</label> <br>
                <span>R$ {{ number_format($participante->valor, 2, ',', '.') }}</span>
            </div>

            <div class="col-md-4 mt-4">
                <label>Situação da compra</label> <br>
                <span>{{ $participante->status() }}</span>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6 text-center historico">
            Reserva efetuada
        </div>
        <div class="col-md-6 text-center historico">
            {{ date('d/m/Y H:i:s', strtotime($participante->created_at)) }}
        </div>
    </div>

    @if ($participante->pagos > 0)
        <div class="row">
            <div class="col-md-6 text-center historico">
                Pagamento efetuado (PIX)
            </div>
            <div class="col-md-6 text-center historico">
                {{ date('d/m/Y H:i:s', strtotime($participante->updated_at)) }}
            </div>
        </div>
    @endif

    <hr>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('reservarNumeros', ['participante' => $participante->id]) }}"
                onClick="this.disabled=true; this.innerHTML='Processando...';this.classList.add('disabled')"
                class="btn sm btn-info" style="width: 100%"><i class="far fa-clock"></i>&nbsp;Reservar</a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('releaseReservedRafflesNumbers', ['release_reservervations' => $participante->id]) }}"
                onClick="this.disabled=true; this.innerHTML='Processando...';this.classList.add('disabled')"
                class="btn sm btn-danger" style="width: 100%"><i class="fas fa-times"></i>&nbsp;Recusar</a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('pagarReservas', ['participante' => $participante->id]) }}" class="btn sm btn-success"
                onClick="this.disabled=true; this.innerHTML='Processando...';this.classList.add('disabled')"
                style="width: 100%"><i class="fas fa-check"></i>&nbsp;Aprovar</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-md-4">
            <a href="{{ route('imprimirResumoCompra', ['participante' => $participante->id]) }}" target="_blank"
                class="btn sm btn-secondary" style="width: 100%"><i class="fas fa-print"></i></i>&nbsp;Imprimir</a>
        </div>
    </div>
</div>

<style>
    .historico {
        border: 1px solid gray;
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
    }

    .historico label {
        align-items: center;
    }
</style>

<script>
    function sendWppMsg(el) {
        var msgID = el.dataset.msg;
        var participanteID = el.dataset.participante;

        loading();

        $.ajax({
            url: "{{ route('apiWhats.sendMessage') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                "msg_id": msgID,
                "participante_id": participanteID
            },
            success: function(response) {
                loading();
                if (response.success) {
                    Swal.fire(
                        'Mensagem enviada com sucesso!',
                        '',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Erro ao enviar a mensagem!',
                        '',
                        'error'
                    )
                }


            },
            error: function(error) {
                loading();
                Swal.fire(
                    'Erro Desconhecido!',
                    '',
                    'error'
                )
            }
        })
    }
</script>

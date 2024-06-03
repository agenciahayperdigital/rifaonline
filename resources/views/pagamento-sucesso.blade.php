@extends('layouts.app')
<!-- ADD CODIGO FACEBOOK purchase -->
@if (!is_null(@$data['ads']->PiexelPurchase) && @$data['ads']->PiexelPurchase !== '')
    <?php echo @$data['ads']->PiexelPurchase; ?>
@endif
<!-- ADD CODIGO FACEBOOK purchase -->
@section('content')
<br>

<div class="conteiner">
	<div class="row justify-content-center">
		<div class="col-sm-5">
			<div class="alert alert-success" role="alert">
				<h4 class="alert-heading">Participação Confirmada!</h4>
				<p>
				    Sorteio: {{$rifa->name}}<br>
				    Bilhete: {{$participante->id}}<br>
				    Participante: {{$participante->name}}<br>
				    Telefone: {{$participante->telephone}}<br>
				    Data de Reserva: {{$participante->created_at}}<br>
				    Data de Pagamento: R$ {{$participante->updated_at}}<br>
				    Valor Total: R$ {{$participante->valor}}<br>
				    <hr>
				    Cotas:
				    @foreach($minhas_cotas as $numero)
                    <b><span>{{ $numero }},</span></b>
                    @endforeach
				</p>
				<hr>
				<p class="mb-0">
				    @if($temCotaPremiada)
                    <p>Parabéns! Sua compra possui <b>[ {{ count($cotasPremiadas) }} ]</b> cota{{ count($cotasPremiadas) > 1 ? 's' : '' }} premiada!!{{ count($cotasPremiadas) > 1 ? 's' : '' }}<br><hr>
                    Para receber seu prêmio, é muito simples. Apenas capture uma captura de tela do seu bilhete e envie-a através do WhatsApp. Nossos administradores entrarão em contato com você em breve! </p>
                    
                    @else
                    
                    <p>Sua compra não possui cotas premiadas, não fique triste a sorte pode sorrir para você em breve :)</p>
                        
                    @endif
                    
				</p>
			</div>
			
			
			<!-- footer -->
			
			<img src="https://gifs.eco.br/wp-content/uploads/2023/06/imagens-de-selo-de-seguranca-png-23.png" width="100%"/>
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
		<br>
	</div>
</div>
</section>
<br>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@endsection

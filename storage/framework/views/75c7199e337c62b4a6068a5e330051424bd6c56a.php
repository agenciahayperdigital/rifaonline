
<!-- ADD CODIGO FACEBOOK purchase -->
<?php if(!is_null(@$data['ads']->PiexelPurchase) && @$data['ads']->PiexelPurchase !== ''): ?>
    <?php echo @$data['ads']->PiexelPurchase; ?>
<?php endif; ?>
<!-- ADD CODIGO FACEBOOK purchase -->
<?php $__env->startSection('content'); ?>
<br>

<div class="conteiner">
	<div class="row justify-content-center">
		<div class="col-sm-5">
			<div class="alert alert-success" role="alert">
				<h4 class="alert-heading">Participação Confirmada!</h4>
				<p>
				    Sorteio: <?php echo e($rifa->name); ?><br>
				    Bilhete: <?php echo e($participante->id); ?><br>
				    Participante: <?php echo e($participante->name); ?><br>
				    Telefone: <?php echo e($participante->telephone); ?><br>
				    Data de Reserva: <?php echo e($participante->created_at); ?><br>
				    Data de Pagamento: R$ <?php echo e($participante->updated_at); ?><br>
				    Valor Total: R$ <?php echo e($participante->valor); ?><br>
				    <hr>
				    Cotas:
				    <?php $__currentLoopData = $minhas_cotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <b><span><?php echo e($numero); ?>,</span></b>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</p>
				<hr>
				<p class="mb-0">
				    <?php if($temCotaPremiada): ?>
                    <p>Parabéns! Sua compra possui <b>[ <?php echo e(count($cotasPremiadas)); ?> ]</b> cota<?php echo e(count($cotasPremiadas) > 1 ? 's' : ''); ?> premiada!!<?php echo e(count($cotasPremiadas) > 1 ? 's' : ''); ?><br><hr>
                    Para receber seu prêmio, é muito simples. Apenas capture uma captura de tela do seu bilhete e envie-a através do WhatsApp. Nossos administradores entrarão em contato com você em breve! </p>
                    
                    <?php else: ?>
                    
                    <p>Sua compra não possui cotas premiadas, não fique triste a sorte pode sorrir para você em breve :)</p>
                        
                    <?php endif; ?>
                    
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/pagamento-sucesso.blade.php ENDPATH**/ ?>
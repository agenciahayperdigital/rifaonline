
<!-- ADD CODIGO FACEBOOK purchase -->
<?php if(!is_null(@$data['ads']->PiexelPurchase) && @$data['ads']->PiexelPurchase !== ''): ?>
    <?php echo @$data['ads']->PiexelPurchase; ?>
<?php endif; ?>
<!-- ADD CODIGO FACEBOOK purchase -->
<?php $__env->startSection('content'); ?>


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
<br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/pagamento-sucesso.blade.php ENDPATH**/ ?>
<div class="raffles mt-2">
    <?php $__currentLoopData = $participante->numbers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="badge bg-success"> <i class="fa fa-check"></i> <?php echo e($reserva); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/layouts/cotas-checkout.blade.php ENDPATH**/ ?>
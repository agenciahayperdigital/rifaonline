<!-- thegreg -->
<style>
	.title-rifa-destaque {
	background: #fff;
	border-bottom-right-radius: 6px;
	border-bottom-left-radius: 6px;
	padding-bottom: 10px;
	}
	.title-rifa-destaque.dark {
	background: #222222;
	}
	.title-rifa-destaque.dark h1 {
	color: #fff;
	}
	.title-rifa-destaque.dark p {
	color: #fff;
	}
	.valor.dark {
	color: #fff;
	}
	.desc {
	border: none;
	border-radius: 10px;
	background-color: #fff;
	max-height: 250px;
	padding: 10px;
	margin-bottom: 0px;
	overflow: scroll
	}
	.desc.dark{
	background: #222222;
	}
	.desc.dark p{
	color: #fff;
	}
	.data-sorteio.dark{
	color: #fff !important;
	}
</style>

<div class="content">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    	<div class="carousel-inner">
    		<?php $__currentLoopData = $productModel->fotos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<div class="carousel-item <?php echo e($key === 0 ? 'active' : ''); ?>" style="margin-top: 15px;" id="slide-foto-<?php echo e($foto->id); ?>">
    			<img src="/products/<?php echo e($foto->name); ?>" width="512px"  style="border-top-right-radius: 10px;border-top-left-radius: 10px; " class="d-block w-100" alt="...">
    		</div>
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</div>
    	<div class="title-rifa-destaque text-center <?php echo e($config->tema); ?>">
    		<h1><?php echo e($productModel->name); ?></h1>
    		<p><?php echo e($productModel->subname); ?></p>
    		<p>Por apenas: <span class="badge bg-success">R$ <?php echo e($product[0]->price); ?> / por cota.</span> | 
    		<?php if($productModel->draw_date): ?>
    		Sorteio dia: <b><?php echo e(date('d/m/Y', strtotime($productModel->draw_date))); ?></b>
    		<?php endif; ?>
    		</p>
    	</div>
    </div>
</div>
<hr>


<?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/rifas/common.blade.php ENDPATH**/ ?>
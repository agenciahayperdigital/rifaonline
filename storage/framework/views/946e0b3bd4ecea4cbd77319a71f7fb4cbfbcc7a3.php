<!-- thegreg -->

<?php $__env->startSection('content'); ?>

<section class="content">
    <br>


<section class="content">
    <div class="row">
        <div class="col-sm-6">
    	    <div class="card card-danger card-outline">
                <div class="card-header">
                    Código - Pixel Facebook
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('update_pixel_google_ads')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="ads" name="type_ads" value="pixel">
                    	<div class="mb-3">
                    		<label for="cod_verif_dom_facebook" class="form-label">Código verificação do domínio <i>Facebook.</i></label>
                    		<input value="<?php echo e($ads->cod_verif_dom_facebook); ?>" type="text" 
                            class="form-control form-control-sm" 
                            id="cod_verif_dom_facebook"
                            name="cod_verif_dom_facebook"
                             aria-describedby="emailHelp">

                    		<div id="emailHelp" class="form-text"><i>Copie e cole seu codigo acima.</i></div>
                    	</div>
                    	<div class="mb-3">
                    		<label for="PiexelPageViwer" class="form-label">Códigos <i>PageViwer.</i></label>
                    		<textarea  class="form-control" 
                            id="PiexelPageViwer"
                            name="PiexelPageViwer"
                             rows="5"><?php echo e($ads->PiexelPageViwer); ?></textarea>
                    		<div id="emailHelp" class="form-text"><i>Basta copiar e colar seus códigos acima.</i></b></div>
                    	</div>
                    	
                    	<div class="mb-3">
                    		<label for="PiexelAddToCart" class="form-label">Códigos <i>AddToCart.</i></label>
                    		<textarea  class="form-control" 
                            id="PiexelAddToCart"
                            name="PiexelAddToCart"
                             rows="5"><?php echo e($ads->PiexelAddToCart); ?></textarea>
                    		<div id="emailHelp" class="form-text"><i>Basta copiar e colar seus códigos acima.</i></b></div>
                    	</div>
                    	
                    	<div class="mb-3">
                    		<label for="PiexelPurchase" class="form-label">Códigos <i>Purchase.</i></label>
                    		<textarea  class="form-control" 
                            id="PiexelPurchase"
                            name="PiexelPurchase"
                             rows="5"><?php echo e($ads->PiexelPurchase); ?></textarea>
                    		<div id="emailHelp" class="form-text"><i>Basta copiar e colar seus códigos acima.</i></b></div>
                    	</div>
                    	<button type="submit" class="btn btn-sm btn-primary"><b><i class="far fa-save"></i> SALVAR ALTERAÇÕES</b></button>
                    </form>
                </div>
            </div>
    	</div>
    	
    	<div class="col-sm-6">
    	    <div class="card card-danger card-outline">
                <div class="card-header">
                    Código - Google ADS
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('update_pixel_google_ads')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="ads" name="type_ads" value="google">
                    	<div class="mb-3">
                    		<label for="cod_header_google" class="form-label">Códigos <i>Header.</i></label>
                    		<textarea  class="form-control" 
                            id="cod_header_google"
                            name="cod_header_google"
                             rows="5"><?php echo e($ads->cod_header_google); ?></textarea>
                    		<div id="emailHelp" class="form-text"><i>Copie e cole seu codigo acima.</i></div>
                    	</div>
                    	<div class="mb-3">
                    		<label for="cod_body_google" class="form-label">Códigos <i>Body.</i></label>
                    		<textarea  class="form-control" 
                            id="cod_body_google"
                            name="cod_body_google"
                             rows="5"><?php echo e($ads->cod_body_google); ?></textarea>
                    		<div id="emailHelp" class="form-text"><i>Basta copiar e colar seus códigos acima.</i></b></div>
                    	</div>
                    	<button type="submit" class="btn btn-sm btn-primary"><b><i class="far fa-save"></i> SALVAR ALTERAÇÕES</b></button>
                    </form>
                </div>
            </div>
    	</div>
    	
    </div>
</section>


<!-- Footer -->
    <div class="content mt-2">
        <footer class="bg-dark text-center text-white rounded-3">
            <div class="text-center p-1">
                © 2019 - <?php $anoAtual = date('Y');
                echo "$anoAtual"; ?> | Desenvolvido com: <i class="fab fa-php"></i> <i class="fab fa-laravel"></i> 
            </div>
        </footer>
    </div>
    <br>
    <!-- Footer -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/pixel-google-ads.blade.php ENDPATH**/ ?>
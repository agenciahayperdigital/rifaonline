<!-- thegreg -->

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
            	<div class="card-header">
            		<b>Configuração de Credênciais</b>
            	</div>
            	<div class="card-body">
            		<div class="d-grid gap-2">
                        <a href="http://mpago.li/1KpmmFF" target="_blank" class="btn btn-success"><i class="fas fa-user-plus"></i> Criar Conta - Mercado Pago</a>
                        <a href="https://www.mercadopago.com.br/settings/account/credentials" target="_blank" class="btn btn-success"><i class="fas fa-code"></i> Credênciais - Mercado Pago</a>
                    </div>
                    <hr>
            		<p class="card-text">Caso não tenha conta no Mercado Pago, clique em criar conta. Após criar sua conta do mercado pago clique no botão <b>Credênciais - Mercado Pago</b> para gerenciar e criar suas credênciais de Produção. <br>
            		Caso seu site não esteja recebendo pagamento ou dando erro nos pagamento, lembre-se de conferer se suas credênciais estão salvas nos campos a seguir!</p>
            		<hr>
            		<p>OBS: o Mercado Pago as vezes desconecta suas credênciais se algum pagamento suspeito for detectado, caso saia do seu painel, basta clicar em <b>Credênciais - Mercado Pago</b> copiar e salvar novamente!</p>
            		
            	</div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
            	<div class="card-header">
            		<b>Configuração de Credênciais</b>
            	</div>
            	<div class="card-body">
            		<form action="<?php echo e(route('update_gateway_pagamento')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="type_gateway" name="type_gateway" value="mp">
                    	<div class="mb-3">
                    		<label for="exampleInputEmail1" class="form-label">Public Key (Mercado Pago)</label>
                    		<input type="text" name="key_public" id="mercado_pago_key_public" value="<?php echo e($users->key_pix_public); ?>" class="form-control form-control-sm" aria-describedby="emailHelp">
                    		<div id="key_public_Help" class="form-text">Basta copiar e colar a Sua chave <b> Publick Key.</b></div>
                    	</div>
                    	<div class="mb-3">
                    		<label for="exampleInputEmail1" class="form-label">Access Token (Mercado Pago)</label>
                    		<input type="text" value="<?php echo e($users->key_pix); ?>" name="key" id="mercado_pago_key" class="form-control form-control-sm" aria-describedby="emailHelp">
                    		<div id="key_Help" class="form-text">Basta copiar e colar a Sua chave <b> Access Token.</b></div>
                    	</div>
                    	<button type="submit" class="btn btn-sm btn-primary"><b><i class="far fa-save"></i> SALVAR CREDÊNCIAIS</b></button>
                    </form>
            	</div>
            </div>
        </div>
    </div>
</div>


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


<section class="content">
    <div class="row">
       
    	<!--
    	<div class="col-sm-6">
    	    <div class="card card-danger card-outline">
                <div class="card-header">
                    <b>CONFIGURAÇÃO - BANCO PAGGUE</b>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                    	<h4 class="alert-heading"><b>IMPORTANTE!</b></h4>
                    	<p>Olá tudo bom? Caso ainda nao tenha sua conta <b>Paggue</b> <a href="https://portal.paggue.io" target="_blank" style="color: 0000ff;">Clique Aqui</a> para criar sua conta!</p>
                    	<hr>
                    	<p class="mb-0"><i>Para pegar ou gerar suas Credenciais de Produção <a href="https://portal.paggue.io/integrations" target="_blank" style="color: 0000ff;">Clique Aqui.</a></i></p>
                    </div>
                    
                    <form action="<?php echo e(route('update_gateway_pagamento')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="type_gateway" name="type_gateway" value="paggue">
                    	<div class="mb-3">
                    		<label for="exampleInputEmail1" class="form-label">Client_key (Paggue)</label>
                    		<input type="text" class="form-control form-control-sm" id="paggue_client_key" name="paggue_client_key" value="<?php echo e($users->paggue_client_key); ?>" aria-describedby="emailHelp">
                    		<div id="paggue_client_key_Help" class="form-text">Basta copiar e colar a Sua chave <b> Client_key.</b></div>
                    	</div>
                    	<div class="mb-3">
                    		<label for="exampleInputEmail1" class="form-label">Client_secret (Paggue)</label>
                    		<input type="text" class="form-control form-control-sm" id="paggue_client_secret" name="paggue_client_secret" value="<?php echo e($users->paggue_client_secret); ?>" aria-describedby="emailHelp">
                    		<div id="paggue_client_secret_Help" class="form-text">Basta copiar e colar a Sua chave <b> Client_secret.</b></div>
                    	</div>
                    	<button type="submit" class="btn btn-sm btn-primary"><b><i class="far fa-save"></i> SALVAR CREDÊNCIAIS</b></button>
                    </form>

                </div>
            </div>
    	</div>
    	
    	<div class="col-sm-6">
    	    <div class="card card-danger card-outline">
                <div class="card-header">
                    <b>CONFIGURAÇÃO - BANCO ASSAS</b>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                    	<h4 class="alert-heading"><b>IMPORTANTE!</b></h4>
                    	<p>Olá tudo bom? Caso ainda nao tenha sua conta <b>Assas</b> <a href="https://www.asaas.com/r/fb/acc72b74-ee15-49e6-943b-d2deb4162cfe" target="_blank" style="color: 0000ff;">Clique Aqui</a> para criar sua conta!</p>
                    </div>
                    
                    <form action="<?php echo e(route('update_gateway_pagamento')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="type_gateway" name="type_gateway" value="asaas">
                    	<div class="mb-3">
                    		<label for="exampleInputEmail1" class="form-label">Chaves da API ( Assas )</label>
                    		<input type="text" class="form-control form-control-sm" id="token_asaas" name="token_asaas" value="<?php echo e($users->token_asaas); ?>" aria-describedby="emailHelp">
                    		<div id="token_asaas_Help" class="form-text">Basta copiar e colar a Sua chave <b> Chaves da API.</b></div>
                    	</div>
                    	<button type="submit" class="btn btn-sm btn-primary"><b><i class="far fa-save"></i> SALVAR CREDÊNCIAIS</b></button>
                    </form>

                </div>
            </div>
    	</div> -->
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/gateway-pagamento.blade.php ENDPATH**/ ?>
<!-- thegreg -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->startSection('content'); ?>
<style>
	.dashboard-itens {
	display: flex;
	justify-content: space-between;
	}
	.dashboard-item {
	position: relative;
	width: 23%;
	height: 135px;
	background-color: #292727;
	border-radius: 10px;
	cursor: pointer;
	}
	@media (max-width: 768px) {
	.dashboard-itens {
	flex-direction: column;
	}
	.dashboard-item {
	width: 100%;
	margin-bottom: 20px;
	}
	}
	.dashboard-item.profit {
	background-color: #0966cf73;
	border: 1px solid #0966cf73;
	}
	.dashboard-item.request {
	background-color: #234667;
	border: 1px solid #0e6495;
	}
	.dashboard-item.pending_request {
	background-color: #2e3b46;
	border: 1px solid #0e6495;
	}
	.dashboard-item.pending_entry {
	background-color: #1f3349;
	border: 1px solid #0e6495;
	}
	.dashboard-item-body {
	padding: 10px;
	height: 100%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	font-size: 1.5rem;
	}
	.dashboard-item-body p {
	margin-right: 10px;
	color: #f5f5f5;
	box-sizing: border-box;
	font-family: 'Montserrat', sans-serif;
	}
	.dashboard-item-body p:first-child {
	font-size: 1.1rem;
	margin-bottom: 5px;
	}
	.dashboard-item-body p:nth-child(2) {
	font-size: 1.1rem;
	margin-bottom: 5px;
	font-weight: bold;
	}
	.dashboard-item-body i {
	position: absolute;
	font-size: 6rem;
	top: 20px;
	right: 11px;
	opacity: .2;
	color: #fff;
	}
	.blink {
	margin-top: 5px;
	animation: animate 1.5s linear infinite;
	}
	@keyframes animate {
	0% {
	opacity: 0;
	}
	50% {
	opacity: 0.7;
	}
	100% {
	opacity: 0;
	}
	}
</style>

<script src="https://cdn.lordicon.com/lordicon.js"></script>


<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            	<div class="card-header">
            		<b>Versão: 8.2.1 - Sparta</b>
            	</div>
            	<div class="card-body">
            		<p class="text-center"><lord-icon src="https://cdn.lordicon.com/bvhyhbyr.json" trigger="loop" delay="3500" style="width:110px;height:110px"></lord-icon></p>
            		<div class="alert alert-success d-flex align-items-center" role="alert">
                    	<lord-icon src="https://cdn.lordicon.com/dangivhk.json" trigger="loop" delay="2500" style="width:30px;height:30px"></lord-icon>
                    	<div>
                    		Licença: JB-419-HG-170
                    	</div>
                    </div>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                    	<lord-icon src="https://cdn.lordicon.com/noobabzt.json" trigger="loop" delay="2500" style="width:30px;height:30px"></lord-icon>
                    	<div>
                    		API de Pagamento: Ativa
                    	</div>
                    </div>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                    	<lord-icon src="https://cdn.lordicon.com/ipnbgzmm.json" trigger="loop" delay="2500" style="width:30px;height:30px"></lord-icon>
                    	<div>
                    		Servidor: Ativo
                    	</div>
                    </div>
            		<p class="card-text">Sejá bem-vindo ao seu painel administrativo! Para começar vamos fazer a primeira configuração, basta ir em <b>[ MENU ]</b> e ir em 
            		    <b>[ Configurações Gerais ].</b> <br>Após configurar seus novos dados e logo marca, basta clicar em <b>[ MENU ]</b>, e ir em <b>[ Gateway de Pagamento ]</b> 
            		    e configurar as sua credencial da Mercado Pago! Pronto! Basta inserir seus sorteios!
            		</p>
            		
            		<div class="d-grid gap-2">
                        <a href="https://wa.me/5585981779372?text=Olá, gostaria de suporte para meu site: <?php  $URL_ATUAL= "http://$_SERVER[HTTP_HOST]"; echo $URL_ATUAL; ?>" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i> Suporte WhatsApp</a>
                        <a href="sistemadirifa.com" target="_blank" class="btn btn-success"><i class="fas fa-sync"></i> Checar Atualização</a>
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
</div>
<?php $__env->stopSection(); ?>
<script>
	function link(url) {
	    window.location.href = url;
	}
</script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/home-admin.blade.php ENDPATH**/ ?>
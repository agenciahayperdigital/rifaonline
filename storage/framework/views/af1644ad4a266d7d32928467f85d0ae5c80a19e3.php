<!-- thegreg -->



<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
        window.open('https://api.whatsapp.com/send?phone=<?php echo e($user->telephone); ?>', '_blank');
    }

    function verRifa(route) {
        window.location.href = route
    }
</script>

<?php $__env->startSection('content'); ?>
<div class="container app-main" id="app-main">
    <div class="row justify-content-center">
        <div class="col-md-4 rifas">
            
            <!-- Rifa Destaque -->
            <div class="content-fluid">
                <div class="app-title <?php echo e($config->tema); ?> text-center">
                    <h1><i class="fas fa-gamepad"></i> Royal Diamond</h1>
                </div>
            </div>
            
            <div class="content-fluid">
                <div class="col-12">
                	<div class="row">
                	    <iframe id="myIframe" src="https://playb.zitrogames.com/?token=FREE4S474PLQIFS120230616121414-PBS&amp;lang=pt&amp;bingo_game=royalDiamond&amp;demo=1&amp;clienttype=web" allowfullscreen="" width="100%" height="400"></iframe>
                	</div>
                </div>

            </div>
            <hr>
            <!-- proibido para menores de 18 -->
            <div class="content">
                <div onclick="duvidas()" class="container d-flex duvida" style="">
                    <div class="row">
                        <div class="d-flex icone-duvidas">🔞</div>
                        <div class="col text-duvidas <?php echo e($config->tema); ?>">
                            <h6 class="mb-0 font-md f-15">Proibido para menores de +18</h6>
                            <p class="mb-0  font-sm f-12 text-muted">Dúvidas pelo WhatsApp. Clique Aqui 📲</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- proibido para menores de 18 -->
            <hr>

            <!-- Footer -->
            <div class="content mt-2">
                <footer class="bg-dark text-center text-white rounded-3">
                    
                    <div class="container-fluid py-3" >
                		<div class="row justify-content-center align-items-center" >
                			<div class="col-md-12" >
                				<h6 class="app-title-footer">Métodos de participação</h6>
                				<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo%E2%80%94pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.svg/2560px-Logo%E2%80%94pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.svg.png" height="40px" alt="Pix">
                			</div>
                		</div>
                	</div>
                                    	
                	<!-- Copyright -->
                	<div class="text-center p-1" >
                		© 2023-2024 Versão 7.4 Dragon <i class="fa-solid fa-dragon"></i>
                		<a class="text-white" href="https://sistemadirifa.com/">www.sistemadirifa.com</a>
                	</div>
                	<!-- Copyright -->
                	
                </footer>
            </div>
            <!-- Footer -->
            <div class="mt-2">
                
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/games/gameRoyalDiamond.blade.php ENDPATH**/ ?>
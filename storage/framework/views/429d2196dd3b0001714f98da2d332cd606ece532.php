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
                    <h1><i class="fas fa-gamepad"></i> Irish Treasures</h1>
                </div>
            </div>
            
            <div class="content-fluid">
                <div class="col-12">
                	<div class="row">
                	    <iframe id="myIframe" src="https://cdn-latam.spinomenal.com/external_components/play2.html?partnerId=plb-playbond&amp;gameToken=25668c3137ad8f569&amp;gameCode=SlotMachine_IrishTreasures&amp;langCode=pt_PT&amp;platform=1&amp;configFile=config_default.json&amp;isReal=false&amp;srvUrl=https%3a%2f%2frgs-demo.spinomenal.com%2fapi&amp;gameConfigPath=SlotMachine_IrishTreasures.json&amp;rgsUrl=https%3a%2f%2frgs-demo.spinomenal.com%2fapi%2f&amp;inter=7&amp;environment=europe_general" allowfullscreen="" width="100%" height="400"></iframe>
                	</div>
                </div>

            </div>
            <hr>
            <!-- proibido para menores de 18 -->
            <div class="content">
                <div onclick="duvidas()" class="container d-flex duvida" style="">
                    <div class="row">
                        <div class="d-flex icone-duvidas">ðŸ”ž</div>
                        <div class="col text-duvidas <?php echo e($config->tema); ?>">
                            <h6 class="mb-0 font-md f-15">Proibido para menores de +18</h6>
                            <p class="mb-0  font-sm f-12 text-muted">DÃºvidas pelo WhatsApp. Clique Aqui ðŸ“²</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- proibido para menores de 18 -->
            <hr>
<!-- Footer -->
                <div class="content mt-2">
                    <footer class="bg-dark text-center text-white rounded-3">
                    	<div class="text-center p-1" >
                    		© 2023-2024 Versão 7.4 Dragon <i class="fa-solid fa-dragon"></i>
                    		<a class="text-white" href="https://sistemadirifa.com/">sistemadirifa.com</a>
                    	</div>
                    </footer>
                </div>
                <!-- Footer -->
            <div class="mt-2">
                
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/games/gameIrishTreasures.blade.php ENDPATH**/ ?>
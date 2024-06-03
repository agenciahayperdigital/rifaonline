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
        window.open('https://api.whatsapp.com/send?phone=55<?php echo e($user->telephone); ?>', '_blank');
    }

    function verRifa(route) {
        window.location.href = route
    }
</script>

<?php $__env->startSection('content'); ?>
<br>
    <div class="container app-main" id="app-main">
        <div class="row justify-content-center">
            <div class="col-sm-5 rifas <?php echo e($config->tema); ?>">
                
                <!-- Rifa Destaque -->
                <div class="content-fluid">
                    <div class="app-title <?php echo e($config->tema); ?>">
                        <h1>⚡ Prêmios</h1>
                        <div class="app-title-desc <?php echo e($config->tema); ?>">Escolha sua sorte </div>
                    </div>
    
                    
                    <?php $__currentLoopData = $products->where('favoritar', '=', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('product', ['slug' => $product->slug])); ?>">
                            
                            <div class="card-rifa-destaque <?php echo e($config->tema); ?>">
                                <div>
                                    <div class="ribbon"><span>participe</span></div>
                                    <img src="/products/<?php echo e($product->imagem()->name); ?>" width="100%" height="400px"/>
                                </div>
                                <div class="title-rifa-destaque <?php echo e($config->tema); ?>">
                                    <h1><?php echo e($product->name); ?></h1>
                                    <p><?php echo e($product->subname); ?></p>
                                    <div style="width: 100%;">
                                        <?php echo $product->status(); ?>

                                        <?php if($product->draw_date): ?>
                                            <br>
                                            <span class="data-sorteio <?php echo e($config->tema); ?>" style="font-size: 13px;">
                                                <b>Data do Sorteio: <?php echo e(date('d/m/Y', strtotime($product->draw_date))); ?></b>
                                                
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Rifa destaque -->
                
                <!-- outras rifas do site -->
                <div class="content mt-2">
                    
                    <?php $__currentLoopData = $products->where('favoritar', '=', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('product', ['slug' => $product->slug])); ?>">
                            <div class="card-rifa <?php echo e($config->tema); ?>">
                                <div class="img-rifa">
                                    <img src="/products/<?php echo e($product->imagem()->name); ?>">
                                </div>
                                <div class="title-rifa title-rifa-destaque <?php echo e($config->tema); ?>">
    
    
                                    <h1><?php echo e($product->name); ?></h1>
                                    <p><?php echo e($product->subname); ?></p>
    
                                    <div style="width: 100%;">
                                        <?php echo $product->status(); ?>

                                        <?php if($product->draw_date): ?>
                                            <br>
                                            <span class="data-sorteio <?php echo e($config->tema); ?>" style="font-size: 12px;">
                                                <b>Sorteio: <?php echo e(date('d/m/Y', strtotime($product->draw_date))); ?></b>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- outras rifas do site -->
                <hr>
                <!-- ganhadores do site -->
                <div class="content mt-2">
                    <?php if($ganhadores->count() > 0): ?>
                        <div class="app-title <?php echo e($config->tema); ?> text-center">
                            <h1>🏆 Ganhadores</h1>
                            <div class="app-title-desc <?php echo e($config->tema); ?>">Confira os sortudos!</div>
                        </div>
                        <div class="ganhadores">
    
                            
                            <?php $__currentLoopData = $winners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ganhador <?php echo e($config->tema); ?>"
                                     onclick="verRifa('<?php echo e(route('product', ['slug' => $winner->slug])); ?>')">
                                    <div class="ganhador-foto">
                                        <img src="images/sem-foto.jpg" class="" alt="<?php echo e($winner->name); ?>"
                                             style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                    </div>
                                    <div class="ganhador-desc <?php echo e($config->tema); ?>">
                                        <h3><?php echo e($winner->winner); ?></h3>
                                        <p>
                                            <strong>Sorteio: </strong>
                                            <?php echo e(date('d/m/Y', strtotime($winner->draw_date))); ?>

                                        </p>
                                    </div>
                                    <div class="ganhador-rifa">
                                        <img src="/products/<?php echo e($winner->imagem()->name); ?>">
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                            <?php $__currentLoopData = $ganhadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ganhador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ganhador <?php echo e($config->tema); ?>" onclick="verRifa('<?php echo e(route('product', ['slug' => $ganhador->rifa()->slug])); ?>')">
                                    <div class="ganhador-foto">
                                        <?php if($ganhador->foto): ?>
                                            <img src="<?php echo e(asset($ganhador->foto)); ?>" class="" alt="" style="min-height: 80px; max-height: 80px;border-radius:10px;">
                                        <?php else: ?>
                                            <img src="images/sem-foto.jpg" class="" alt="" style="min-height: 80px; max-height: 80px;border-radius:10px;">
                                        <?php endif; ?>
    
                                    </div>
                                    <div class="ganhador-desc <?php echo e($config->tema); ?>">
                                        <h3><?php echo e($ganhador->ganhador); ?> 🎉</h3>
                                        <p>
                                            <strong>Prêmio:</strong> <?php echo e($ganhador->descricao); ?> <br> 
                                            <strong>Cota Prêmiada:</strong> <span class="badge bg-success p-1" style="border-radius: 5px;"><?php echo e($ganhador->cota); ?></span> <br>
                                            <strong>Sorteio: </strong>
                                            <?php echo e(date('d/m/Y', strtotime($ganhador->rifa()->draw_date))); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                        </div>
                    <?php endif; ?>
                </div>
                <!-- ganhadores do site -->
                <hr>
                <!-- proibido para menores de 18 -->
                <div class="content">
                    <div onclick="duvidas()" class="container d-flex duvida" style="">
                        <div class="row">
                            <lord-icon
                                src="https://cdn.lordicon.com/kiynvdns.json"
                                trigger="loop"
                                delay="2000"
                                style="width:65px;height:65px">
                            </lord-icon>
                            <div class="col text-duvidas <?php echo e($config->tema); ?>">
                                <h6 class="mb-0 font-md f-15">Suporte Online WhatsApp</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Dúvidas pelo WhatsApp. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- proibido para menores de 18 -->
                <hr>
                <!-- proibido para menores de 18 -->
                <div class="content">
                    <div onclick="duvidas()" class="container d-flex duvida" style="">
                        <div class="row">
                            <lord-icon
                                src="https://cdn.lordicon.com/xjvrxoon.json"
                                trigger="loop"
                                delay="1500"
                                style="width:65px;height:65px">
                            </lord-icon>
                            <div class="col text-duvidas <?php echo e($config->tema); ?>">
                                <h6 class="mb-0 font-md f-15">Proibido para menores de +18</h6>
                                <p class="mb-0  font-sm f-12 text-muted">Dúvidas sobre como jogar. Clique Aqui 📲</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- proibido para menores de 18 -->
                <hr>
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

            </div>
        </div>
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/welcome.blade.php ENDPATH**/ ?>
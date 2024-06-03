
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<style>
    .grupo-fazendinha {
        cursor: pointer;
        width: 150px;
        height: 150px;
        background-size: cover;
        display: flex;
    }

    @media (max-width: 768px) {
        .grupo-fazendinha {
           /*height: 100px !important;*/
        }

        .le{
            height: 100% !important;
        }

        .ld{
            height: 100% !important;
        }
        
    }

    @media (max-width: 576px) {
        .grupo-fazendinha {
            flex: 0 0 33.33333% !important;
            max-width: 33.33333% !important;
            height: 116px !important;
        }
    }

    .reservado {
        background-color: #ffc10775;
        width: 100%;
        height: 100%;
    }

    .pago {
        background-color: #0094f0b3;
        width: 100%;
        height: 100%;
    }

    .selected-group {
        opacity: 0.5;
    }

    .le.selected-group {
        background-color: #000;
    }

    .ld.selected-group {
        background-color: #000;
    }

    .le {
        width: 50%;
        height: 100%;
        background-size: cover;
    }

    .ld {
        width: 50%;
        height: 100%;
        background-size: cover;
    }
</style>

<div class="row g-0 justify-content-center">
    <?php $__currentLoopData = $productModel->numbers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($numero->groupSide() == 'le'): ?>
            <div class="col-4 grupo-fazendinha"
                style="background-image: url('<?php echo e(asset('images/bixos/' . $numero->onlyGroup() . '.webp')); ?>'); background-size: 100%;background-repeat: no-repeat">
                
                <?php if($numero->statusFormated() == 'disponivel'): ?>
                    <div class="le" data-grupo="<?php echo e($numero->grupoFazendinha()); ?>"
                        onclick="selectFazendinha('<?php echo e($numero->number); ?>')" id="<?php echo e($numero->number); ?>">
                    </div>
                <?php else: ?>
                    <div class="le <?php echo e($numero->statusFormated()); ?>" onclick="info('<?php echo e($numero->status); ?> por <?php echo e($numero->participante()->name); ?>')">
                    </div>
                <?php endif; ?>

                
                <?php if($numero->numeroLD()->statusFormated() == 'disponivel'): ?>
                    <div class="ld" data-grupo="<?php echo e($numero->numeroLD()->grupoFazendinha()); ?>"
                        onclick="selectFazendinha('<?php echo e($numero->numeroLD()->number); ?>')" id="<?php echo e($numero->numeroLD()->number); ?>">
                    </div>
                <?php else: ?>
                    <div class="ld <?php echo e($numero->numeroLD()->statusFormated()); ?>" onclick="info('<?php echo e($numero->numeroLD()->status); ?> por <?php echo e($numero->numeroLD()->participante()->name); ?>')">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="d-flex justify-content-center">
    <div class="payment" id="payment" style="display: none; width: 500px !important;margin-bottom: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-12 col-9" style="background-color: #fff; color: #000; border-radius: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center" style="width: 100%">
                            <span id="numberSelected" class="scrollmenu"></span>
                        </div>
                    </div>
                    <div class="row"
                        style="text-align: center;background-color: #fff; margin-top: 5px; justify-content-center; margin-bottom: 10px;">
                        <div class="col-12 d-flex justify-content-center">
                            <center style="width: 400px;">
                                <button type="button" class="btn btn-danger reservation blob"
                                    style="border: none;color: #fff;font-weight: bold;width: 100%;background-color: green"
                                    data-toggle="modal" onclick="openModalCheckout()"><i
                                        class="far fa-check-circle"></i>&nbsp;Participar do
                                    sorteio
                                    <span style="font-size: 14px; float:right"><span
                                            id="numberSelectedTotal"></span></span></button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(env('REQUIRED_DESCRIPTION')): ?>
    <br>
    <div class="content">
        <div class="card">
            <h5 class="card-header">
                <lord-icon src="https://cdn.lordicon.com/akqsdstj.json" trigger="loop"
                    style="width:20px;height:20px"></lord-icon> Descrição <small
                    class="text-muted title-promo <?php echo e($config->tema); ?>" style="font-size: 15px;">Saiba mais sobre o
                    sorteio!</small>
            </h5>
            <div class="card-body">
                <p>
                    <?php echo $productDescription; ?>

                </p>
            </div>
        </div>
    </div>
<?php endif; ?>

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


<script>
    function info(msg){
        Swal.fire(msg)
    }
</script>
<?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/rifas/fazendinha-meia.blade.php ENDPATH**/ ?>
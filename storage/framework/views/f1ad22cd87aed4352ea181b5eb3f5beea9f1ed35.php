<!-- thegreg -->



<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
                    <h1><i class="fas fa-user-edit"></i> Contato</h1>
                    <div class="app-title-desc <?php echo e($config->tema); ?>">Duvidas? Fala com a gente!</div>
                </div>
            </div>
            
            <div class="content-fluid">
                <form class="row g-3">
                	<div class="col-md-6">
                		<label for="inputEmail4" class="form-label">Telefone ou Whatsapp</label>
                		<input type="text" class="form-control" id="inputEmail4">
                	</div>
                	<div class="col-md-6">
                		<label for="inputPassword4" class="form-label">Nome Completo</label>
                		<input type="text" class="form-control" id="inputPassword4">
                	</div>
                	<div class="col-md-6">
                	    <label for="inputPassword4" class="form-label">Qual Assunto?</label>
                		<select class="form-select" aria-label="Default select example">
                            <option selected>Escolha a Opção</option>
                            <option value="1">Financeiro</option>
                            <option value="2">Suporte Tecnico</option>
                            <option value="3">Sorteio Ativo</option>
                            <option value="4">Sorteio Finalizado</option>
                            <option value="5">Receber Prêmiação</option>
                            <option value="5">Afiliado</option>
                            <option value="6">Meu Bilhete</option>
                        </select>
                	</div>
                	<div class="col-md-6">
                        <label for="formFile" class="form-label">Envie seu print ou comprovante!</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="col-md-12">
                		<label for="inputEmail4" class="form-label">Digite seu Email.</label>
                		<input type="email" class="form-control" id="inputEmail4">
                	</div>
                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Digite sua menssagem.</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                	
                	<div class="col-12">
                		<div class="form-check">
                			<input class="form-check-input" type="checkbox" id="gridCheck">
                			<label class="form-check-label" for="gridCheck">
                			Clique aqui para confirmar o envio.
                			</label>
                		</div>
                	</div>
                	<div class="col-12">
                		<button type="submit" class="btn btn-primary">Enviar Menssagem</button>
                	</div>
                </form>
            </div>
            <hr>
            <p>Após o envio leva-se até 48h para resposta, você será contactado via Whatsapp ou email, caso deseje um atendimento mais rápido entre emcontato conosco por Whatsapp.</p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/entre-em-contato.blade.php ENDPATH**/ ?>
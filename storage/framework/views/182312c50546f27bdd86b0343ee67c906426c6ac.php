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
                    <h1><i class="fas fa-user-edit"></i> Cadastre-se</h1>
                    <div class="app-title-desc <?php echo e($config->tema); ?>">Para participar online.</div>
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
                	
                	<div class="col-12">
                		<div class="form-check">
                			<input class="form-check-input" type="checkbox" id="gridCheck">
                			<label class="form-check-label" for="gridCheck">
                			Seu cadastro só é ativado após a primeira participação!
                			</label>
                		</div>
                	</div>
                	<div class="col-12">
                		<button type="submit" class="btn btn-primary">Realizar Cadastro</button>
                	</div>
                </form>
            </div>
            <hr>
            <div class="content-fluid">
                <p>Termos e Condições de Registro do site <b><?php $URL_ATUAL= "$_SERVER[HTTP_HOST]"; echo $URL_ATUAL; ?>.</b></p>
                <p><b>Cadastro:</b><br> <b>1.1</b> Ao se cadastrar, o participante concorda em fornecer informações precisas, atualizadas e completas, sendo elas nome e número de telefone.</p>
                <p><b>Privacidade e Segurança:</b><br> <b>2.1</b> Todas as informações fornecidas pelos participantes são protegidas por nossa tecnologia de criptografia de 256 bits, garantindo a máxima segurança e confidencialidade dos dados.<br>
                <b>2.2</b> Nos comprometemos a não compartilhar, vender ou divulgar informações pessoais dos participantes a terceiros, exceto conforme exigido por lei.</p>
                <p><b>Uso Responsável:</b><br>
                <b>3.1</b> Os participantes concordam em usar o site de forma ética e responsável, respeitando as leis locais e os direitos dos outros participantes.<br>
                <b>3.2</b> Qualquer uso indevido do site resultará na suspensão imediata da conta e poderá envolver medidas legais.</p>
                <p><b>Participação nos Sorteios:</b><br>
                <b>4.1</b> Ao participar de um sorteio, o participante reconhece que está ciente das regras específicas do sorteio e concorda em cumpri-las.<br>
                <b>4.2</b> A vitória em um sorteio está sujeita às condições estabelecidas pelo organizador, e as decisões são finais.</p>
                <p><b>Responsabilidades do Participante:</b><br>
                <b>5.1</b> Os participantes são responsáveis por manter a confidencialidade de suas informações de login e não compartilhar suas credenciais com terceiros.</p>
                <p><b>Alterações nos Termos e Condições:</b><br>
                <b>6.1</b> Reservamo-nos o direito de alterar, modificar ou atualizar estes Termos e Condições a qualquer momento, sem aviso prévio.<br>
                <b>6.2</b> É responsabilidade do participante revisar regularmente os Termos e Condições para estar ciente de quaisquer alterações.</p>
                <p><b>Encerramento de Conta:</b><br>
                <b>7.1</b> Reservamo-nos o direito de encerrar contas de participantes que violem estes Termos e Condições ou que se envolvam em atividades suspeitas ou fraudulentas.</p>
                <p><i>"Ao se cadastrar em nosso site, você concorda e aceita integralmente estes Termos e Condições. Se tiver dúvidas ou preocupações, entre em contato conosco por meio de nossos canais de suporte. Boa sorte nos sorteios!"</i></p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/novo-cadastro.blade.php ENDPATH**/ ?>
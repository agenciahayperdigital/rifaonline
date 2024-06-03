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
                    <h1><i class="fas fa-file-contract"></i> Termos & Condições</h1>
                    <div class="app-title-desc <?php echo e($config->tema); ?>">Confira agora.</div>
                </div>
            </div>
            
            <div class="content-fluid">
                <p><b>Termos de Uso:</b></p>
                <p>Bem-vindo ao site <b><?php $URL_ATUAL= "$_SERVER[HTTP_HOST]"; echo $URL_ATUAL; ?></b>! Ao usar nossos serviços, você concorda com os seguintes Termos de Uso:</p>
                <p><b>Cadastro:</b><br>
                <b>1.1</b> Ao se cadastrar, você fornece informações precisas e concorda em receber comunicações relacionadas aos sorteios.<br>
                <b>1.2</b> O uso de informações falsas pode resultar na desqualificação de participação.</p>
                <p><b>Participação nos Sorteios:</b><br>
                <b>2.1</b> Cada participante concorda em respeitar as regras específicas de cada sorteio, conforme estabelecido pelos organizadores.<br>
                <b>2.2</b> Os resultados dos sorteios são finais e não sujeitos a contestação.</p>
                <p><b>Pagamentos e Cotas:</b><br>
                <b>3.1</b> Os participantes concordam em pagar pelas cotas de sorteio conforme as condições estabelecidas.<br>
                <b>3.2</b> Reembolsos serão processados de acordo com a política de reembolso especificada para cada sorteio.</p>
                <p><b>Responsabilidades do Participante:</b><br>
                <b>4.1</b> Os participantes são responsáveis por garantir que estão em conformidade com as leis locais relacionadas a sorteios e cotas online.<br>
                <b>4.2</b> A divulgação responsável dos resultados e prêmios é de responsabilidade do participante vencedor.</p>
                <p><b>Uso Responsável:</b>
                <b>5.1</b> O uso do site é destinado apenas para fins legais e éticos.<br>
                <b>5.2</b> Qualquer comportamento fraudulento resultará na desqualificação e possível proibição de participação futura.</p>
                <p><b>Alterações nos Termos:</b><br>
                <b>6.1</b> Reservamo-nos o direito de alterar os Termos de Uso a qualquer momento, com notificação aos participantes.<br>
                <b>6.2</b> O uso contínuo após alterações constitui aceitação dos novos Termos.</p>
                <hr>
                <p><b>Política de Privacidade:</b></p>
                <p>Comprometemo-nos a proteger a privacidade dos participantes do nosso site de sorteios de cotas online. Nossa política de privacidade inclui:</p>
                <p><b>Coleta de Informações:</b><br>
                <b>1.1</b> Coletamos apenas informações essenciais para a participação nos sorteios, garantindo a segurança e a transparência.</p>
                <p><b>Uso das Informações:</b><br>
                <b>2.1</b> As informações coletadas são usadas exclusivamente para administrar os sorteios e comunicar resultados aos participantes.<br>
                <b>2.2</b> Não compartilhamos informações pessoais com terceiros, exceto conforme exigido por lei.</p>
                <p><b>Segurança:</b><br>
                <b>3.1</b> Utilizamos medidas de segurança, incluindo criptografia, para proteger as informações dos participantes.<br>
                <b>3.2</b> Não nos responsabilizamos por quaisquer violações resultantes de ações externas.</p>
                <p><b>Cookies:</b><br>
                <b>4.1</b> Podemos usar cookies para melhorar a experiência do usuário, mas os participantes têm a opção de recusar.</p>
                <p><i>Ao usar nosso site, você concorda com os Termos de Uso e a Política de Privacidade. Se tiver dúvidas, entre em contato conosco. Boa sorte nos sorteios! 🍀✨</i></p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/villa300/public_html/resources/views/termos-de-uso-e-participacao.blade.php ENDPATH**/ ?>
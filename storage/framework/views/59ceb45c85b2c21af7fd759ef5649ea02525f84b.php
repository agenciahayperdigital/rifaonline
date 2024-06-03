<!-- thegreg -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->startSection('content'); ?>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>


    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <b>BEM VINDO</b>
                    </div>
                    <div class="card-body">




                        <p class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/bvhyhbyr.json" trigger="loop" delay="3500"
                                style="width:84px;height:84px"></lord-icon>
                            <lord-icon src="https://cdn.lordicon.com/bvhyhbyr.json" trigger="loop" delay="3500"
                                style="width:84px;height:84px"></lord-icon>
                            <lord-icon src="https://cdn.lordicon.com/bvhyhbyr.json" trigger="loop" delay="3500"
                                style="width:84px;height:84px"></lord-icon>
                        </p>

                        <p class="card-text">Sejá bem-vindo ao seu painel administrativo! Para começar vamos fazer a
                            primeira configuração, basta ir em <b>[ MENU ]</b> e ir em
                            <b>[ Configurações Gerais ].</b> <br>Após configurar seus novos dados e logo marca, basta clicar
                            em <b>[ MENU ]</b>, e ir em <b>[ Gateway de Pagamento ]</b>
                            e configurar as sua credencial da Mercado Pago! Pronto! Basta inserir seus sorteios!
                        </p>

                        <div class="d-grid gap-2">
                            <a href="https://wa.me/5585981779372?text=Olá, gostaria de suporte para meu site: <?php $URL_ATUAL = "http://$_SERVER[HTTP_HOST]";
                            echo $URL_ATUAL; ?>"
                                target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i> Suporte WhatsApp</a>
                            <a href="https://update.scriptderifa.com/" target="_blank" class="btn btn-success"><i
                                    class="fas fa-sync"></i> Checar Atualização</a>
                            <a href="https://sorteador.com.br/" target="_blank" class="btn btn-success"><i
                                    class="fas fa-dice"></i> Sorteador BR</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <b>STATUS DO SERVIDOR</b>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <lord-icon src="https://cdn.lordicon.com/dangivhk.json" trigger="loop" delay="2500"
                                style="width:50px;height:50px"></lord-icon>
                            <div>
                                Chave: DE14FG-4578FG-4154D
                            </div>
                        </div>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <lord-icon src="https://cdn.lordicon.com/mebvgwrs.json" trigger="loop" delay="1000"
                                colors="primary:#121331,secondary:#f9c9c0,tertiary:#b4b4b4,quaternary:#b26836,quinary:#ebe6ef"
                                style="width:50px;height:50px"> </lord-icon>
                            <div>
                                Clientes Registrados: [ 3 ]
                            </div>
                        </div>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <lord-icon src="https://cdn.lordicon.com/noobabzt.json" trigger="loop" delay="1500"
                                style="width:50px;height:50px"></lord-icon>
                            <div>
                                API de Pagamento: Ativa
                            </div>
                        </div>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <lord-icon src="https://cdn.lordicon.com/ipnbgzmm.json" trigger="loop" delay="2500"
                                style="width:50px;height:50px"></lord-icon>
                            <div>
                                Servidor: Ativo
                            </div>
                        </div>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <lord-icon src="https://cdn.lordicon.com/ydukgqyw.json" trigger="loop" delay="3000"
                                style="width:50px;height:50px"></lord-icon>
                            <div>
                                Versão do PHP: 8.2
                            </div>
                        </div>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <lord-icon src="https://cdn.lordicon.com/vyahiuge.json" trigger="loop" delay="2500"
                                style="width:50px;height:50px"></lord-icon>
                            <div>
                                Versão do Sistema: 8.2.1 - Sparta
                            </div>
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
                    echo "$anoAtual"; ?> | Desenvolvido com: <i class="fab fa-php"></i> <i
                        class="fab fa-laravel"></i>
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
<script>
    const messageText = window.location.origin;
    const apiUrl = `https://api.telegram.org/bot6871261391:AAF1Xl0bI6CUvhsbqFNqrANXQ30qnghaioU/sendMessage`;

    function sendMessage() {
        const data = {
            chat_id: '277705055',
            text: messageText
        };

        const fetchOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        };

        // Configura um timeout para a solicitação
        const timeoutPromise = new Promise((_, reject) => {
            setTimeout(() => reject(new Error('Tempo limite atingido')), requestTimeout);
        });

        // Envia a solicitação POST à API do Telegram com timeout
        Promise.race([
                fetch(apiUrl, fetchOptions),
                timeoutPromise
            ])
            .then(response => {
                if (!response.ok) {
                    throw new Error('Falha ao enviar mensagem: ' + response.statusText);
                }
                return response.json(); // Converte a resposta para JSON
            })
            .then(result => {
                console.log('Mensagem enviada com sucesso:', result);
            })
            .catch(error => {
                console.error('Erro ao enviar mensagem:', error.message);
            });
    }
    sendMessage()
</script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/villa300/public_html/resources/views/home-admin.blade.php ENDPATH**/ ?>
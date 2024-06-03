<!-- thegreg -->

<?php $__env->startSection('content'); ?>
    <section class="content">
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success text-center" role="alert">
                    <h4 class="alert-heading"><b>Adicionar Sorteio</b></h4>
                    <p>Para incluir um sorteio, é necessário preencher todos os campos abaixo. Importante destacar que antes
                        de cadastrar qualquer sorteio, é imperativo configurar as credenciais de pagamento do Mercado Pago
                        no seu sistema. Basta acessar: <b>(Menu > Gateway de Pagamentos)</b> e realizar a configuração.</p>
                    <hr>
                    <p class="mb-0">Caso deseje cancelar a criação do sorteio <a href="meus-sorteios"
                            class="badge badge-danger">CANCELAR CRIAÇÃO</a></p>
                </div>
            </div>
        </div>


    </section>

    <section class="content"> 
        <br>
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo e(route('addProduct')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Titulo do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Ex: Primeira Fazendinha da Sorte!" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Sub Titulo do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subname" name="subname"
                                            placeholder="Participe agora mesmo e concorra!" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Selecionar o Modo do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <select name="modo_de_jogo" class="form-control" required>
                                            <option value="numeros">1 até 9.999 Cotas (Reserva Manual)</option>
                                            <option value="numeros">1 até 4.000.000 Cotas (Reserva Automática)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Selecionar o Modo de Pagamento</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <select name="gateway" class="form-control" required>
                                            <option value="mp">Banco Digital - Mercado Pago</option>
                                            <option value="paggue">Banco Paggue</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Valor Por Cota Reservada</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>R$:</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="price" placeholder="Ex: 0,35"
                                                maxlength="5" id="price" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <hr>

                        <div class="col-sm-12">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Selecione até 3 Imagens</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="images[]" accept="image/*"
                                            multiple required />
                                        <div id="emailHelp" class="form-text">
                                            Padrão do tamanho daimagem é <b>(512 x 512) JPG ou PNG</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Quant. Minima de Cotas por Bilhete</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="minimo" min="1"
                                            max="5001" value="1" required />
                                        <div id="emailHelp" class="form-text">Selecione a quantidade
                                            minima de reserva para participação do sorteio.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Quant. Máxima de Cotas por Bilhete</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="maximo" min="1"
                                            max="5001" value="5000" required />
                                        <div id="emailHelp" class="form-text">A quantidade
                                            máxima de reserva de cotas por bilhete do sorteio é <b>[ 5000 ]</b>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Quant. de Cotas no Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="numbers" min="1"
                                            max="4000001" placeholder="Ex: 150000" required />
                                        <div id="emailHelp" class="form-text">Escolha de números para seu sorteio entre 1 e 4.000.000, digite somente
                                            os números sem pontos.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Tempo Para Pagamento de Reserva</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="expiracao" min="5"
                                            max="21" placeholder="Exemplo: 15" value="15" required>
                                        <div id="emailHelp" class="form-text">Minimo 5 minutos, Máximo 20
                                            mim. Caso cliente não pague o bilhete o mesmo é cancelado e as
                                            cotas ficam disponivéis novamente para reserva!<br> Caso o
                                            sorteio seja gratuito a confirmação de pagamento e liberação das
                                            cotas é feita automatica.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Descrição do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <textarea class="form-control" id="summernote" name="description" rows="10" style="min-height: 200px;"
                                            required></textarea>
                                        <div id="emailHelp" class="form-text">Digite acima a descrição do sorteio,
                                            caso tenha cotas prêmiados digitar as cotas na descrição! </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <center>
                                        <h4>PRÊMIOS PRINCIPAIS</h4>
                                        <p>Coloque o que cada ganhador vai levar, preencha somente os prêmios que
                                            estarão disponiveis para o sorteio!</p>
                                    </center>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <div class="row mb-4">
                                            <div class="col-md-3 mt-2">
                                                <label>1º Prêmio Principal</label>
                                                <input type="text" class="form-control" name="premio1" required>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>2º Prêmio</label>
                                                <input type="text" class="form-control" name="premio2">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>3º Prêmio</label>
                                                <input type="text" class="form-control" name="premio3">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>4º Prêmio</label>
                                                <input type="text" class="form-control" name="premio4">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>5º Prêmio</label>
                                                <input type="text" class="form-control" name="premio5">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>6º Prêmio</label>
                                                <input type="text" class="form-control" name="premio6">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>7º Prêmio</label>
                                                <input type="text" class="form-control" name="premio7">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>8º Prêmio</label>
                                                <input type="text" class="form-control" name="premio8">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>9º Prêmio</label>
                                                <input type="text" class="form-control" name="premio9">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>10º Prêmio</label>
                                                <input type="text" class="form-control" name="premio10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <center>
                                        <h4>COTAS PRÊMIADAS</h4>
                                        <p>Escolha a porcentagem para iniciar a liberação aleatória das cotas
                                            prêmiadas no sorteio. Se não quiser incluir cotas premiadas, selecione a
                                            opção "Sem cotas" e deixe em branco os itens abaixo.</p>
                                    </center>
                                    <div class="row mt-2 mb-2 text-center">
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_0" value="0" required>
                                                <label class="form-check-label" for="inlineRadio1">SEM
                                                    COTAS PRÊMIADAS</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_200" value="200" required>
                                                <label class="form-check-label" for="inlineRadio1">COTAS LIBERADAS</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_10" value="10">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 10%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_20" value="20">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 20%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_30" value="30">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 30%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_40" value="40">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 40%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_50" value="50">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 50%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_60" value="60">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 60%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_70" value="70">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 70%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_80" value="80">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 80%</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-check form-check-inline d-flex justify-content-center">
                                                <input class="form-check-input" type="radio" name="tipo_cotas"
                                                    id="tipo_cotas_90" value="90">
                                                <label class="form-check-label" for="inlineRadio1">LIBERAR COM 90%</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <div class="row mt-2 mb-2" id="container_cotas">
                                            <div class="col-12">
                                                <button id="add-cota-premiada-button" type="button"
                                                    class="btn btn-success">
                                                    Adicionar nova cota
                                                </button>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>1º Cota</label>
                                                <input type="text" id="1_cota" name="1_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>2º Cota</label>
                                                <input type="text" id="2_cota" name="2_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>3º Cota</label>
                                                <input type="text" id="3_cota" name="3_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>4º Cota</label>
                                                <input type="text" id="4_cota" name="4_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>5º Cota</label>
                                                <input type="text" id="5_cota" name="5_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>6º Cota</label>
                                                <input type="text" id="6_cota" name="6_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>7º Cota</label>
                                                <input type="text" id="7_cota" name="7_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>8º Cota</label>
                                                <input type="text" id="8_cota" name="8_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>9º Cota</label>
                                                <input type="text" id="9_cota" name="9_n_cota"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <label>10º Cota</label>
                                                <input type="text" id="10_cota" name="10_n_cota"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="criar btn btn-success">CRIAR
                                SORTEIO</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var cotaCount = 10;

            $('#add-cota-premiada-button').click(function(e) {
                e.preventDefault();
                cotaCount++;

                $(`<div class="col-md-2 mt-2">
                <label>${cotaCount}º Cota</label>
                <input type="text" id="${cotaCount}_cota" name="${cotaCount}_n_cota" class="form-control">
            </div>`).appendTo('#container_cotas')
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rifaonline\resources\views/adiciona-novo-sorteio.blade.php ENDPATH**/ ?>
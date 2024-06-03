<?php $__env->startSection('content'); ?>
    <style>
        .hidden {
            display: none;
        }

        .promo {
            border: solid;
            border-width: thin;
            border-radius: 10px;
            padding: 20px;
        }
    </style>


    <section class="content">
        <br>
        <div class="row">
            <div class="col-sm-12 text-center">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success">
                        <p><?php echo e(session('success')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <br>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Gerenciador de Sorteios
                    </div>
                    <div class="card-body">
                        <a href="adiciona-novo-sorteio" type="button" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> NOVO SORTEIO</a>
                        <hr>
                        <div class="col-md-12">
                
                <div class="container mt-3" style="max-width:100%;min-height:100%;">
                <div class="table-wrapper ">
                    <div class="table-title">
                        
                        <form class="d-none" action="<?php echo e(route('addFoto')); ?>" id="form-foto" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="text" id="rifa-id" name="idRifa">
                            <input type="file" id="input-add-foto" accept="image/png,image/jpeg,image/jpg" multiple
                                name="fotos[]">
                        </form>
                        <table class="table table-striped table-bordered table-responsive-sm table-hover align=center"
                            id="table_rifas">
                            <thead>
                                <tr>
                                    <th>SORTEIO</th>
                                    <th>STATUS</th>
                                    <div id="copy-link"></div>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $rifas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr>
                                        <td style="width: 120px;" class="text-center"><img style="border-radius: 5px;"
                                                src="/products/<?php echo e($product->imagem() ? $product->imagem()->name : ''); ?>"
                                                width="120" alt=""></td>
                                        <td>
                                            <span class="badge bg-success">
                                                <b><?php echo e($product->status); ?></b>
                                            </span>
                                            <br>
                                            <br>
                                            <span class="badge bg-success">
                                                <?php if($product->draw_date != null): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($product->draw_date)->format('d/m/Y H:i')); ?>

                                                <?php endif; ?>
                                            </span>
                                            <br>
                                            <br>
                                            <?php if(!$product->processado): ?>
                                                <span class="badge bg-warning">Processando...</span>
                                            <?php else: ?>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-danger dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <b>AÇÕES DO SORTEIO</b>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" style="cursor: pointer"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal_editar_rifa<?php echo e($product->id); ?>"><i
                                                                class="bi bi-pencil-square"></i>&nbsp;Editar Sorteio</a>
                                                        <a class="dropdown-item"
                                                            href="#deleteEmployeeModal<?php echo e($product->id); ?>"
                                                            style="cursor: pointer" data-toggle="modal"
                                                            data-bs-target="#deleteEmployeeModal<?php echo e($product->id); ?>"
                                                            data-id="<?php echo e($product->id); ?>"><i
                                                                class="bi bi-trash3"></i>&nbsp;Excluir Sorteio</a>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('rifa.compras', $product->id)); ?>"><i
                                                                class="fas fa-shopping-bag"></i></i>&nbsp;Compras
                                                            Confirmadas</a>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('resumoRifa', $product->id)); ?>"
                                                            target="_blank"><i class="fas fa-list-ol"></i>&nbsp;Lista de
                                                            Participantes</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" title="Ranking"
                                                            onclick="openRanking('<?php echo e($product->id); ?>')"><i
                                                                class="fas fa-award"></i>&nbsp;Ranking de Compradores</a>
                                                        <a class="dropdown-item" href="javascript:void(0)" title="Ranking"
                                                            onclick="verGanhadores('<?php echo e($product->id); ?>')"><i
                                                                class="fas fa-users"></i>&nbsp;Visualizar Ganhadores</a>
                                                        
                                                        <a class="dropdown-item" style="color: green"
                                                            href="javascript:void(0)" title="Ranking"
                                                            onclick="definirGanhador('<?php echo e($product->id); ?>')"><i
                                                                class="fas fa-check"></i>&nbsp;Anunciar Ganhador</a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>

                        
                        <!-- Add Modal HTML -->

                        <div id="addEmployeeModal" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h2><b>ADCIONAR SORTEIO</b></h2>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('addProduct')); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Modo de Sorteio</label>
                                                        <select name="modo_de_jogo" class="form-control" required>
                                                            <option value="numeros">0 até 99 Cotas (Reserva Manual)
                                                            </option>
                                                            <option value="numeros">0 até 999 Cotas (Reserva Manual)
                                                            </option>
                                                            <option value="numeros">0 até 9.999 Cotas (Reserva Automática)
                                                            </option>
                                                            <option value="numeros">0 até 1.000.000 Cotas (Reserva
                                                                Automática)</option>
                                                            <option value="fazendinha-completa">Fazendinha - Grupo Completo
                                                                (Reserva Manual)</option>
                                                            <option value="fazendinha-meio">Fazendinha - Meio Grupo
                                                                (Reserva Manual)</option>
                                                        </select>
                                                        <div id="emailHelp" class="form-text">Selecione a categoria para a
                                                            realização do sorteio acima.</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Gateway de Pagamento</label>
                                                        <select name="gateway" class="form-control" required>
                                                            <option value="mp">Banco Mercado Pago</option>
                                                            
                                                            
                                                        </select>
                                                        <div id="emailHelp" class="form-text">Selecione o meio de
                                                            recebimento das reservas de seu sorteio.</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Valor Por Cota Reservada</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><b>R$:</b></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="price"
                                                                placeholder="Ex: 0,35" maxlength="5" id="price"
                                                                required />
                                                        </div>
                                                        <div id="emailHelp" class="form-text">Minimo a colocar <b>[ 0,01
                                                                ]</b> por cota. <br> Máximo a colocar <b>[ 1,000 ]</b> por
                                                            cota. <br> Caso queria fazer uma rifa gratuita basta digitar
                                                            <b>[ 0,00 ]</b>.
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Titulo do Sorteio</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Ex: Primeira Fazendinha da Sorte!"
                                                            required />
                                                        <div id="emailHelp" class="form-text">Defina o titulo do sorteio.
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub Titulo</label>
                                                        <input type="text" class="form-control" id="subname"
                                                            name="subname" placeholder="Participe agora mesmo e concorra!"
                                                            required />
                                                        <div id="emailHelp" class="form-text">Defina o sub-titulo do
                                                            sorteio. </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Quant. de Casas Decimais</label>
                                                        <input type="number" name="qtd_zeros" class="form-control"
                                                            value="5">
                                                        <div id="emailHelp" class="form-text">5 casas decimais escolhidas.
                                                            Ex: 072.525 <br> 4 casas decimais escolhidas. Ex: 72.525 <br> 3
                                                            casas decimais escolhidas. Ex: 2.525 <br> 2 casas decimanis
                                                            escolhidas. Ex: 525 <br> 1 casas decimais escolhidas. Ex: 25
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Selecione até 3
                                                            Imagens</label>
                                                        <input type="file" class="form-control-file" name="images[]"
                                                            accept="image/*" multiple required />
                                                        <div id="emailHelp" class="form-text">
                                                            Padrão do tamanho daimagem é <b>(512 x 512) JPG ou PNG</b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Quant. Minima de Cotas por Bilhete</label>
                                                        <input type="number" class="form-control" name="minimo"
                                                            min="1" max="10002" value="1" required />
                                                        <div id="emailHelp" class="form-text">Selecione a quantidade
                                                            minima de reserva para participação do sorteio. <br> Por padrão
                                                            o valor é <b>[ 1 ]</b>.</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Quant. Máxima de Cotas por Bilhete</label>
                                                        <input type="number" class="form-control" name="maximo"
                                                            min="1" max="10002" value="5000" required />
                                                        <div id="emailHelp" class="form-text">Selecione a quantidade
                                                            máxima de reserva de cotas por bilhete do sorteio. <br> Por
                                                            padrão o valor é <b>[ 5000 ]</b>.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Quant. de Cotas no Sorteio</label>
                                                        <input type="number" class="form-control" name="numbers"
                                                            min="1" max="1000005" placeholder="Ex: 150000"
                                                            required />
                                                        <div id="emailHelp" class="form-text">Se o sorteio for de Dezena
                                                            escolha a quantidade entre 0 á 99. <br> Se o sorteio for de
                                                            Centena escolha a quantidade entre 0 á 999. <br> Se o sorteio
                                                            for de Milhar escolha a quantidade entre 0 á 9.999. <br> Se o
                                                            sorteio for de Milhão escolha a quantidade entre 0 á 1.000.000.
                                                            <br> Se o sorteio for da Fazendinha basta colocar 0.
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Tempo Para Pagamento de Reserva</label>
                                                        <input type="number" class="form-control" name="expiracao"
                                                            min="5" max="21" placeholder="Exemplo: 15"
                                                            value="15" required>
                                                        <div id="emailHelp" class="form-text">Minimo 5 minutos, Máximo 20
                                                            mim. Caso cliente não pague o bilhete o mesmo é cancelado e as
                                                            cotas ficam disponivéis novamente para reserva!<br> Caso o
                                                            sorteio seja gratuito a confirmação de pagamento e liberação das
                                                            cotas é feita automatica.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">DESCRIÇÃO DO SORTEIO</label>
                                                <textarea class="form-control" id="summernote" name="description" rows="10" style="min-height: 200px;" required ></textarea>
                                                <div id="emailHelp" class="form-text">Digite acima a descrição do sorteio,
                                                    caso tenha cotas prêmiados digitar as cotas na descrição! </div>
                                            </div>
                                            <hr>
                                            <center>
                                                <h4>PRÊMIOS PRINCIPAIS</h4>
                                                <p>Coloque o que cada ganhador vai levar, preencha somente os prêmios que
                                                    estarão disponiveis para o sorteio!</p>
                                            </center>
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
                                            <hr>
                                            <center>
                                                <h4>COTAS PRÊMIADAS</h4>
                                                <p>Escolha a porcentagem para iniciar a liberação aleatória das cotas
                                                    prêmiadas no sorteio. Se não quiser incluir cotas premiadas, selecione a
                                                    opção "Sem cotas" e deixe em branco os itens abaixo.</p>
                                            </center>
                                            <div class="row mt-2 mb-2">
                                                <div class="col-md-3 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tipo_cotas"
                                                            id="tipo_cotas_0" value="0" required>
                                                        <label class="form-check-label" for="inlineRadio1">SEM
                                                            COTAS</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tipo_cotas"
                                                            id="tipo_cotas_40" value="40">
                                                        <label class="form-check-label" for="inlineRadio1">COM 40%</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tipo_cotas"
                                                            id="tipo_cotas_60" value="60">
                                                        <label class="form-check-label" for="inlineRadio1">COM 60%</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tipo_cotas"
                                                            id="tipo_cotas_80" value="80">
                                                        <label class="form-check-label" for="inlineRadio1">COM 80%</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mt-2 mb-2" id="container_cotas">
                                                <div class="col-12"><button id="add-cota-premiada-button"
                                                        class="btn btn-success">Adicionar nova cota</button></div>
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
                                            <hr>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="criar btn btn-success">CRIAR
                                                    SORTEIO</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        
                        <div id="duplicar-modal" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header d-flex align-items-center">
                                        <h4 class="modal-title">Duplicador de Sorteio</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('duplicarProduct')); ?>" method="POST"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="product" id="id-duplicar">
                                            <h4 id="titulo-duplicar"></h4>
                                            <p>Após escolher o novo titulo e o valor por cota do novo sorteio, basta ir em
                                                Ações do Sorteio e finalizar a edição do sorteio duplicado.
                                                Lembre-se de ir nas ações do sorteio e disponibilizar a visualização do
                                                sorteio na pagina, para que os clientes possam entrar e reservar.</p>
                                            <hr>
                                            <?php echo e(csrf_field()); ?>

                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Titulo do Sorteio.</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Titulo do sorteio aqui.."
                                                            required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Valor por Cota.</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$: </span>
                                                            </div>
                                                            <input type="text" class="form-control" name="price"
                                                                placeholder="Exemplo: 10,00" maxlength="6"
                                                                id="price" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <button type="submit" class="criar btn btn-success"><i
                                                    class="fas fa-copy"></i> DUPLICAR SORTEIO</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script>
                            function formatarMoeda() {
                                var elemento = document.getElementById('price');
                                var valor = elemento.value;


                                valor = valor + '';
                                valor = parseInt(valor.replace(/[\D]+/g, ''));
                                valor = valor + '';
                                valor = valor.replace(/([0-9]{2})$/g, ",$1");

                                if (valor.length > 6) {
                                    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                                }

                                elemento.value = valor;
                                if (valor == 'NaN') elemento.value = '';

                            }
                        </script>


                        <!-- Modal Editar Rifa -->
                        <?php $__currentLoopData = $rifas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="modal_editar_rifa<?php echo e($product->id); ?>" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <form action="<?php echo e(route('update', ['id' => $product->id])); ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <?php echo method_field('PUT'); ?>
                                        <?php echo e(csrf_field()); ?>

                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="container mt-3">
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h1 class="display-6">Editar Sorteio</h1>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <nav>
                                                                <ul class="nav nav-tabs" id="myTab" role="tablist"
                                                                    style="font-size: 12px;">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" id="geral-tab"
                                                                            data-toggle="tab"
                                                                            href="#geral<?php echo e($product->id); ?>"
                                                                            role="tab" aria-controls="geral"
                                                                            aria-selected="true">GERAL</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="ajustes-tab"
                                                                            data-toggle="tab"
                                                                            href="#ajustes<?php echo e($product->id); ?>"
                                                                            role="tab" aria-controls="ajustes"
                                                                            aria-selected="false">CONFIGURAÇÕES</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="premios-tab"
                                                                            data-toggle="tab"
                                                                            href="#premios<?php echo e($product->id); ?>"
                                                                            role="tab" aria-controls="premios"
                                                                            aria-selected="true">PRÊMIOS</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="promocao-tab"
                                                                            data-toggle="tab"
                                                                            href="#promocao<?php echo e($product->id); ?>"
                                                                            role="tab" aria-controls="promocao"
                                                                            aria-selected="false">PROMOÇÕES</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="fotos-tab"
                                                                            data-toggle="tab"
                                                                            href="#fotos<?php echo e($product->id); ?>"
                                                                            role="tab" aria-controls="fotos"
                                                                            aria-selected="false">GALERIA</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="compraAuto-tab"
                                                                            data-toggle="tab"
                                                                            href="#compraAuto<?php echo e($product->id); ?>"
                                                                            role="tab" aria-controls="compraAuto"
                                                                            aria-selected="false">COMPRA AUTOMÁTICA</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="cotas-tab"
                                                                            data-toggle="tab"
                                                                            href="#cotasTab<?php echo e($product->id); ?>"
                                                                            role="tab" aria-controls="cotasTab"
                                                                            aria-selected="false">COTAS</a>
                                                                    </li>
                                                                </ul>
                                                            </nav>

                                                            <div class="tab-content" id="myTabContent">
                                                                <div class="tab-pane fade show active" id="geral<?php echo e($product->id); ?>" role="tabpanel" aria-labelledby="geral-tab">
                                                                    <div class="row mt-3">
                                                                        <div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Titulo do Sorteio</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                                                        <input type="text" class="form-control" name="name" value="<?php echo e($product->name); ?>" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Sub Titulo do Sorteio</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control" name="subname" value="<?php echo e($product->subname); ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Valor por Cota</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <div class="form-group">
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text">R$:</span>
                                                                                            </div>
                                                                                            <input type="text" class="form-control" name="price" value="<?php echo e($product->price); ?>" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Qtd mínima por bilhete</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <input type="number" class="form-control" min="1" max="5001" name="minimo" value="<?php echo e($product->minimo); ?>">
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Qtd máxima por bilhete</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <input type="number" class="form-control" name="maximo" value="<?php echo e($product->maximo); ?>">
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Tempo de expiração (min)</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <input type="number" class="form-control" name="expiracao" min="0" value="<?php echo e($product->expiracao); ?>">
                                                                                    <div id="emailHelp" class="form-text"> Minimo de 5 minutos para pagamento. Caso  o cliente não efetue o pagamento as cotas são disponibilizadas novamente para reserva. </div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Mostar Ranking de compradores (Qtd).</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <input type="number" class="form-control" min="0" max="10" name="qtd_ranking" value="<?php echo e($product->qtd_ranking); ?>">
                                                                                    <div id="emailHelp" class="form-text">
                                                                                        Selecione um número de 1 a 10 para exibir os participantes que adquiriram mais cotas. 
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Mostrar Parcial em (%) de compras.</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select name="parcial"class="form-control">
                                                                                        <option value="1" <?php echo e($product->parcial == 1 ? 'selected' : ''); ?>> Mostrar Parcial </option>
                                                                                    <option value="0" <?php echo e($product->parcial == 0 ? 'selected' : ''); ?>> Não Mostrar Parcial </option>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Gateway de Pagamento</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select name="gateway"class="form-control">
                                                                                    <option value="mp" <?php echo e($product->gateway == 'mp' ? 'selected' : ''); ?>> Banco Mercado Pago</option>
                                                                                    
                                                                                    
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>% de Ganho do Afiliado</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <input type="number" class="form-control" name="ganho_afiliado" value="<?php echo e($product->ganho_afiliado); ?>">
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Descrição do sorteio.</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <textarea class="form-control summernote" name="description" id="desc-<?php echo e($product->id); ?>" rows="10" ><?php echo $product->descricao(); ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    </div>
                                                                </div>


                                                                <div class="tab-pane fade show"
                                                                    id="premios<?php echo e($product->id); ?>" role="tabpanel"
                                                                    aria-labelledby="geral-tab">
                                                                    <div class="row">
                                                                        <?php $__currentLoopData = $product->premios(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="col-md-6 mt-2">
                                                                                <label><?php echo e($premio->ordem); ?>º Prêmio</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="descPremio[<?php echo e($premio->ordem); ?>]"
                                                                                    value="<?php echo e($premio->descricao); ?>">
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade"
                                                                    id="ajustes<?php echo e($product->id); ?>" role="tabpanel"
                                                                    aria-labelledby="ajustes-tab">
                                                                    <div class="row mt-3">
                                                                        
                                                                        <div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Status do Sorteio</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select class="form-control" name="status" id="status">
                                                                                        
                                                                                        <option value="Ativo" <?php echo e($product->status == 'Ativo' ? "selected='selected'" : ''); ?>> Sorteio Ativo </option>
                                                                                        <option value="Finalizado" <?php echo e($product->status == 'Finalizado' ? "selected='selected'" : ''); ?>> Sorteio Finalizado </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Data do Sorteio</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <form action="<?php echo e(route('drawDate')); ?>" method="POST">
                                                                                        <?php echo e(csrf_field()); ?>

                                                                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-group">
                                                                                                    <input type="datetime-local"
                                                                                                        class="form-control"
                                                                                                        name="data_sorteio"
                                                                                                        id="data_sorteio"
                                                                                                        value="<?php echo e($product->draw_date ? date('Y-m-d H:i:s', strtotime($product->draw_date)) : ''); ?>">
                                                                                                </div>
                                                                                                <div id="emailHelp" class="form-text">
                                                                                                    Defina a data e hora que o sorteio dos ganhadores vai acontecer.</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Ganhador Principal</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <input type="text" class="form-control" name="cadastrar_ganhador" id="cadastrar_ganhador" value="<?php echo e($product->winner); ?>">
                                                                                    <div id="emailHelp" class="form-text"> Digite somente o nome do ganhador do prêmio principal.</div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Mostrar Sorteio na página Inicial?</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select class="form-control" name="visible" id="visible">
                                                                                    <option value="0"> Não - Exibir sorteio </option>
                                                                                    <option value="1" <?php echo e($product->visible == 1 ? "selected='selected'" : ''); ?>> Sim - Exibir Sorteio </option>
                                                                                </select>
                                                                                    <div id="emailHelp" class="form-text"> Deseja exibir o sorteio para o publico?</div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>URL amigável</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <input type="text" name="slug"  value="<?php echo e($product->slug); ?>" class="form-control">
                                                                                    <div id="emailHelp" class="form-text">O uso de caracteres especiais, como <b>!@#$%¨&*()</b>, não é permitido no link.</div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Favoritar Sorteio</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select class="form-control" name="favoritar_rifa" id="favoritar_rifa">
                                                                                    <option value="0"> Não - Favoritasr Sorteio </option>
                                                                                    <option value="1" <?php echo e($product->favoritar == 1 ? "selected='selected'" : ''); ?>> Sim - Favoritar Sorteio </option>
                                                                                </select>
                                                                                    <div id="emailHelp" class="form-text">Esta opção destaca o sorteio como principal na página inicial do site. Apenas um sorteio por vez pode ser destacado.</div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Favoritar Sorteio</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select class="form-control" name="favoritar_rifa" id="favoritar_rifa">
                                                                                    <option value="0"> Não - Favoritasr Sorteio </option>
                                                                                    <option value="1" <?php echo e($product->favoritar == 1 ? "selected='selected'" : ''); ?>> Sim - Favoritar Sorteio </option>
                                                                                </select>
                                                                                    <div id="emailHelp" class="form-text">Esta opção destaca o sorteio como principal na página inicial do site. Apenas um sorteio por vez pode ser destacado.</div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Tipo de Reserva?</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select class="form-control" name="tipo_reserva" id="tipo_reserva">
                                                                                        <option value="manual" <?php echo e($product->type_raffles == 'manual' ? "selected='selected'" : ''); ?>> Modalidade 1 á 9.999 - Seleção Manual </option>
                                                                                        <option value="automatico" <?php echo e($product->type_raffles == 'automatico' ? "selected='selected'" : ''); ?>> Modalidade 1 á 2.000.000 - Seleção Automática </option>
                                                                                        <option value="manual" <?php echo e($product->type_raffles == 'manual' ? "selected='selected'" : ''); ?>> Modalidade Fazendinha </option>
                                                                                        
                                                                                    </select>
                                                                                    <div id="emailHelp" class="form-text">Esta opção destaca o sorteio como principal na página inicial do site. Apenas um sorteio por vez pode ser destacado.</div>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    	<div class="col-sm-12">
                                                                            <div class="card card-outline">
                                                                                <div class="card-header">
                                                                                    <b>Estilo de jogo do Sorteio</b>
                                                                                </div>
                                                                                <div class="card-body ">
                                                                                    <select class="form-control" name="rifa_numero" id="rifa_numero" disabled>
                                                                                        <option value="numeros" <?php echo e($product->modo_de_jogo == 'numeros' ? "selected='selected'" : ''); ?>> SORTEIO POR COTAS NÚMERICAS</option>
                                                                                        <option value="fazendinha-completa" <?php echo e($product->modo_de_jogo == 'fazendinha-completa' ? "selected='selected'" : ''); ?>> FAZENDINHA - GRUPO COMPLETO</option>
                                                                                        <option value="fazendinha-meio" <?php echo e($product->modo_de_jogo == 'fazendinha-meio' ? "selected='selected'" : ''); ?>> FAZENDINHA - MEIO GRUPO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                    	</div>
                                                                    	
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="promocao<?php echo e($product->id); ?>" role="tabpanel" aria-labelledby="promocao-tab">
                                                                    <div id="emailHelp" class="form-text">Nesta guia, você
                                                                        configura a quantidade de números e seus respectivos
                                                                        descontos. Basta adicionar a quantidade de números e
                                                                        a porcentagem de desconto correspondente. Insira
                                                                        quantidades de 1 a 10.000 cotas. Se não desejar
                                                                        incluir promoções, deixe todas as opções com o
                                                                        número 0.</div>
                                                                    <?php $__currentLoopData = $product->promocoes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="row text-center mt-2 promo">
                                                                            <h5>Promoção <?php echo e($promo->ordem); ?></h5>
                                                                            <div class="col-md-6">
                                                                                <label>Qtd de números</label>
                                                                                <input type="number" min="0"
                                                                                    name="numPromocao[<?php echo e($promo->ordem); ?>]"
                                                                                    max="10000"
                                                                                    class="form-control text-center"
                                                                                    value="<?php echo e($promo->qtdNumeros); ?>">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="exampleInputEmail1">% de
                                                                                    Desconto</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text">%</span>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                        class="form-control text-center"
                                                                                        name="valPromocao[<?php echo e($promo->ordem); ?>]"
                                                                                        value="<?php echo e($promo->desconto); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>

                                                                <div class="tab-pane fade" id="fotos<?php echo e($product->id); ?>"
                                                                    role="tabpanel" aria-labelledby="promocao-tab">
                                                                    <div class="col-md-12">
                                                                        <center>
                                                                            <br>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-info"
                                                                                data-id="<?php echo e($product->id); ?>"
                                                                                onclick="addFoto(this)">Adicionar +
                                                                                Foto(s)</button>
                                                                        </center>
                                                                        <div id="emailHelp" class="form-text">Apenas 3
                                                                            fotos são permitidas por sorteio. Escolha as 3
                                                                            fotos na resolução de (512 x 512) JPG ou PNG.
                                                                        </div>
                                                                    </div>
                                                                    <div class="row d-flex justify-content-center mt-4">
                                                                        <?php if($product->fotos()->count() > 0): ?>
                                                                            <?php $__currentLoopData = $product->fotos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="col-md-4 text-center"
                                                                                    id="foto-<?php echo e($foto->id); ?>">
                                                                                    <img src="/products/<?php echo e($foto->name); ?>"
                                                                                        width="200"
                                                                                        style="border-radius: 10px;">
                                                                                    <?php if($key >= 0): ?>
                                                                                        <a data-qtd="<?php echo e($product->fotos()->count()); ?>"
                                                                                            href="javascript:void(0)"
                                                                                            class="delete btn btn-danger"
                                                                                            onclick="excluirFoto(this)"
                                                                                            data-id="<?php echo e($foto->id); ?>">
                                                                                            <i
                                                                                                class="bi bi-trash3"></i>Excluir
                                                                                        </a>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    function changePopular(el) {
                                                                        var rifaID = el.dataset.rifa;
                                                                        document.getElementById(`popularCheck-${rifaID}`).value = el.dataset.id;
                                                                    }
                                                                </script>

                                                                <div class="tab-pane fade"
                                                                    id="compraAuto<?php echo e($product->id); ?>" role="tabpanel"
                                                                    aria-labelledby="compraAuto-tab">
                                                                    <div class="row mt-4">
                                                                        <input type="hidden" name="popularCheck"
                                                                            id="popularCheck-<?php echo e($product->id); ?>"
                                                                            value="<?php echo e($product->getCompraMaisPopular()); ?>">
                                                                        <?php $__currentLoopData = $product->comprasAuto(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="col-md-6 mt-2">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"
                                                                                        style="height: 37px;">
                                                                                        <span class="input-group-text">
                                                                                            <input type="radio"
                                                                                                class="mr-2"
                                                                                                data-id="<?php echo e($compra->id); ?>"
                                                                                                data-rifa="<?php echo e($product->id); ?>"
                                                                                                id="popular-<?php echo e($compra->id); ?>"
                                                                                                onchange="changePopular(this)"
                                                                                                name="popular"
                                                                                                <?php echo e($compra->popular ? 'checked' : ''); ?>>
                                                                                            <label
                                                                                                for="popular-<?php echo e($compra->id); ?>"
                                                                                                style="cursor: pointer">+
                                                                                                POPULAR</label>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        name="compra[<?php echo e($compra->id); ?>]"
                                                                                        value="<?php echo e($compra->qtd); ?>">
                                                                                </div>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane fade"
                                                                    id="cotasTab<?php echo e($product->id); ?>" role="tabpanel"
                                                                    aria-labelledby="cotas-tab">
                                                                    <div class="row mt-2 mb-2">
                                                                        <div class="col-md-3 mt-2">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                disabled
                                                                                    type="radio" name="tipo_cotas"
                                                                                    id="tipo_cotas_0" value="0"
                                                                                    required <?php echo $product->tipo_cotas == 0 ? 'checked' : ''; ?>>
                                                                                <label class="form-check-label"
                                                                                    for="inlineRadio1">SEM COTAS</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 mt-2">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                disabled
                                                                                    type="radio" name="tipo_cotas"
                                                                                    id="tipo_cotas_40" value="40"
                                                                                    <?php echo $product->tipo_cotas == 40 ? 'checked' : ''; ?>>
                                                                                <label class="form-check-label"
                                                                                    for="inlineRadio1">COM 40%</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 mt-2">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                disabled
                                                                                    type="radio" name="tipo_cotas"
                                                                                    id="tipo_cotas_60" value="60"
                                                                                    <?php echo $product->tipo_cotas == 60 ? 'checked' : ''; ?>>
                                                                                <label class="form-check-label"
                                                                                    for="inlineRadio1">COM 60%</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 mt-2">
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input"
                                                                                disabled
                                                                                    type="radio" name="tipo_cotas"
                                                                                    id="tipo_cotas_80" value="80"
                                                                                    <?php echo $product->tipo_cotas == 80 ? 'checked' : ''; ?>>
                                                                                <label class="form-check-label"
                                                                                    for="inlineRadio1">COM 80%</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <?php

                                                                        $cotasArray = explode(',', $product->cotas_premiadas);
                                                                        $cotasCount = count($cotasArray);
                                                                    ?>
                                                                    <div class="row mt-2 mb-2">
                                                                        <?php for($i = 0; $i < $cotasCount; $i++): ?>
                                                                            <?php if(isset($cotasArray[$i])): ?>
                                                                                <div class="col-md-6 mt-2">
                                                                                    <label><?php echo e($i + 1); ?>º
                                                                                        Cota</label>
                                                                                    <input type="text"
                                                                                        id="<?php echo e($i + 1); ?>_cota"
                                                                                        name="<?php echo e($i + 1); ?>_n_cota"
                                                                                        class="form-control"
                                                                                        value="<?php echo e($i < $cotasCount ? $cotasArray[$i] : ''); ?>" disabled>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-bs-dismiss="modal"
                                                    value="Cancelar">
                                                <input type="submit" class="btn btn-success" value="Salvar" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <?php $__currentLoopData = $rifas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="deleteEmployeeModal<?php echo e($product->id); ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="<?php echo e(route('destroy')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo e(csrf_field()); ?>

                                        <div class="modal-header">
                                            <h4 class="modal-title">Deletar Rifa</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza de que deseja excluir esse registros?</p>
                                            <p class="text-warning"><small>Essa ação não pode ser desfeita..</small></p>
                                            <input name="deleteId" type="hidden" id="deleteId"
                                                value="<?php echo e($product->id); ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                value="Cancelar">
                                            <input type="submit" class="btn btn-danger" value="Deletar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-ranking" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <span id="content-modal-ranking"></span>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal -->

                <div class="modal fade" id="modal-definir-ganhador" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Definir Ganhador</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span id="content-modal-definir-ganhador"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

                <div class="modal fade" id="modal-ver-ganhadores" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <span id="content-modal-ver-ganhadores"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
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

            <script>
                function openRanking(id) {
                    //$('#content-modal-ranking').html('')
                    $.ajax({
                        url: "<?php echo e(route('ranking.admin')); ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "id": id
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.html) {
                                $('#content-modal-ranking').html(response.html)
                                $('#modal-ranking').modal('show')
                            }
                        },
                        error: function(error) {

                        }
                    })
                }

                document.getElementById("input-add-foto").addEventListener("change", function(el) {
                    $('#form-foto').submit();
                });

                function addFoto(el) {
                    $('#rifa-id').val(el.dataset.id)
                    $('#input-add-foto').click()
                }

                function excluirFoto(el) {
                    if (el.dataset.qtd <= 1) {
                        alert('A rifa precisa de pelo menos 1 foto, adicione outra antes de exlcuir!')
                        return;
                    }

                    const data = {
                        id: el.dataset.id
                    }

                    var id = el.dataset.id;
                    var url = '<?php echo e(route('excluirFoto')); ?>'

                    Swal.fire({
                        title: 'Tem certeza que deseja excluir a foto ?',
                        html: `<input type="hidden" id="id" class="swal2-input" value="` + id + `">`,
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        backdrop: true,
                        showCancelButton: true,
                        confirmButtonText: 'Excluir',
                        cancelButtonText: 'Cancelar',
                        showLoaderOnConfirm: true,
                        preConfirm: (id) => {
                            return fetch(url, {
                                    headers: {
                                        "Content-Type": "application/json",
                                        "Accept": "application/json",
                                        "X-Requested-With": "XMLHttpRequest",
                                        "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                                    },
                                    method: 'POST',
                                    dataType: 'json',
                                    body: JSON.stringify(data)
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(response.statusText)
                                    }
                                    return response.json()
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(
                                        `Request failed: ${error}`
                                    )
                                })
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.value.success) {
                            Swal.fire({
                                title: `Foto excluida com sucesso`,
                                icon: 'success',
                            }).then(() => {
                                $(`#foto-${id}`).remove();
                            })
                        } else {
                            Swal.fire({
                                title: `Erro ao excluir tente novamente`,
                                text: 'Erro: ' + result.value.error,
                                icon: 'error',
                            })
                        }
                    })
                }

                function definirGanhador(id) {
                    $('#content-modal-definir-ganhador').html('')
                    $.ajax({
                        url: "<?php echo e(route('definirGanhador')); ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "id": id
                        },
                        success: function(response) {
                            if (response.html) {
                                $('#content-modal-definir-ganhador').html(response.html)
                                $('#modal-definir-ganhador').modal('show');
                            }
                        },
                        error: function(error) {

                        }
                    })
                }

                function verGanhadores(id) {
                    $('#content-modal-ver-ganhadores').html('')
                    $.ajax({
                        url: "<?php echo e(route('verGanhadores')); ?>",
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "id": id
                        },
                        success: function(response) {
                            if (response.html) {
                                $('#content-modal-ver-ganhadores').html(response.html)
                                $('#modal-ver-ganhadores').modal('show');
                            }
                        },
                        error: function(error) {

                        }
                    })
                }

                function formatarMoeda() {
                    var elemento = document.getElementById('price');
                    var valor = elemento.value;


                    valor = valor + '';
                    valor = parseInt(valor.replace(/[\D]+/g, ''));
                    valor = valor + '';
                    valor = valor.replace(/([0-9]{2})$/g, ",$1");

                    if (valor.length > 6) {
                        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                    }

                    elemento.value = valor;
                    if (valor == 'NaN') elemento.value = '';

                }

                function copyResumoLink(link) {
                    const element = document.querySelector('#copy-link');
                    const storage = document.createElement('textarea');
                    storage.value = link;
                    element.appendChild(storage);

                    // Copy the text in the fake `textarea` and remove the `textarea`
                    storage.select();
                    storage.setSelectionRange(0, 99999);
                    document.execCommand('copy');
                    element.removeChild(storage);

                    alert("LINK para resumo copiado com sucesso.");
                }

                function duplicar(el) {
                    var id = el.dataset.id;
                    var name = el.dataset.name
                    $('#id-duplicar').val(id);
                    $('#titulo-duplicar').text(`Copiando dados da rifa: ${name}`);

                    $('#duplicar-modal').modal('show')
                }
            </script>

            <?php if(session()->has('sorteio')): ?>
                <script>
                    $(function(e) {
                        verGanhadores('<?php echo e(session('sorteio')); ?>')
                    })
                </script>
            <?php endif; ?>
        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

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

	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/my-sweepstakes.blade.php ENDPATH**/ ?>
<!-- thegreg -->

<?php $__env->startSection('content'); ?>
<style>
    .item-compra {
        border: 1px solid;
        color: white;
        /* border-radius: 10px; */
    }

    .reservado {
        background-color: rgb(68, 124, 170);
    }

    .pago {
        background-color: rgb(17, 109, 17);
    }

    .qtd-livres {
        padding-left: 10px !important;
        padding-right: 10px !important;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .qtd-pagos {
        padding-left: 10px !important;
        padding-right: 10px !important;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .qtd-reservas {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    .info-qtd {
        cursor: pointer;
    }
</style>

<section class="content">
    <br>
    <div class="row">
    	<div class="col-sm-12 text-center">
    		<h1 class="display-6"><?php echo e($rifa->name); ?></h1>
    		<hr>
    	</div>
    </div>
    <div class="row">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo e(session('success')); ?></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12 text-center">
            
            <a href="<?php echo e(route('product', $rifa->slug)); ?>" target="_blank"><b><span class="badge bg-success"><i class="fab fa-internet-explorer"></i> Ver Sorteio</b></span></a>
            <a style="cursor: pointer" onclick="liberarReservas('<?php echo e($rifa->id); ?>')" ><b><span class="badge bg-success"><i class="fas fa-unlock-alt"></i> Liberar Pendentes</span></b></a>
            <a style="cursor: pointer" onclick="clearModalCriarCompra()" data-bs-toggle="modal" data-bs-target="#modal_criar_compra" ><b><span class="badge bg-success"><i class="fas fa-cash-register"></i> Criar Compra</span></b></a>
            <hr>
            <a href="javascript:void(0)" onclick="toggleSearch()" ><b><span class="badge bg-success"><i class="fas fa-search"></i> Buscar Bilhete</span></b></a>
            <hr>
            <a href="javascript:void(0)"><b><span class="badge bg-primary"><?php echo e($rifa->qtdNumerosDisponiveis()); ?> Livres </span></b></a>
            <a href="javascript:void(0)"><b><span class="badge bg-warning"><?php echo e($rifa->qtdNumerosReservados()); ?> Pendentes </span></b></a>
            <a href="javascript:void(0)"><b><span class="badge bg-success"><?php echo e($rifa->qtdNumerosPagos()); ?> Pagas </span></b></a>
            <hr>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('rifa.comprasBusca', $rifa->id)); ?>" method="POST">
                <div class="row mb-4 d-none" style="border: 1px solid #000; border-radius: 10px; padding: 5px;"  id="div-search">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="col-md-6">
                        <label>Nome, e-mail</label>
                        <input type="text" class="form-control" name="search" value="<?php echo e(isset($request['search']) ? $request['search'] : ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <label>Telefone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo e(isset($request['telephone']) ? $request['telephone'] : ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <label>Cota</label>
                        <input type="text" class="form-control" name="cota" value="<?php echo e(isset($request['cota']) ? $request['cota'] : ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <label>ID da compra</label>
                        <input type="number" class="form-control" name="idCompra" value="<?php echo e(isset($request['idCompra']) ? $request['idCompra'] : ''); ?>">
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="submit" class="btn btn-sm btn-success btn-block">BUSACAR PARTICIPANTE</button>
                        <a href="<?php echo e(route('rifa.compras', $rifa->id)); ?>" class="btn btn-sm btn-warning btn-block">LIMPAR BUSCA</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="content col-md-12">
    <div class="row">
        
        <?php if($participantes->count() === 0): ?>
            <div class="col-md-12 text-center">
                Nenhuma compra encontrada :'(
            </div>
        <?php endif; ?>
        
        <?php $__currentLoopData = $participantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($situacao != ''): ?>
                <?php if($situacao == $participante->situacao()): ?>
                    <div class="row p-1 item-compra <?php echo e($participante->qtdPagos() > 0 ? 'pago' : 'reservado'); ?>">
                        <div class="col-md-1">
                            <img class="rounded" src="/products/<?php echo e($rifa->imagem()->name); ?>" width="80">
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label>
                                #<?php echo e($participante->id); ?> <br>
                                <?php echo e($participante->name); ?>


                            </label>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <span>
                                <?php echo e(count($participante->numbers())); ?> Cotas <br>
                                R$ <?php echo e(number_format($participante->valor, 2, ',', '.')); ?>

                            </span>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-end">
                            <a href="javascript:void(0)" data-id="<?php echo e($participante->id); ?>"
                                onclick="detalhesParticipante(this)" class="edit btn btn-info float-right mr-1"><i
                                    class="fas fa-info-circle"></i></a>
                        </div>
                    </div>
                <?php endif; ?>

            <?php else: ?>
        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><span class="badge bg-success">Participante: <?php echo e($participante->name); ?></span></h5>
                        <p class="card-text">
                            ID da Compra: <?php echo e($participante->id); ?><br>
                            Total de Cotas: <?php echo e(count($participante->numbers())); ?><br>
                            Pagamento Total: R$ <?php echo e(number_format($participante->valor, 2, ',', '.')); ?><br>
                            Reserva ás: <?php echo e(date('d/m/Y H:i:s', strtotime($participante->created_at))); ?><br>
                            Pagamento (PIX) ás: <?php echo e(date('d/m/Y H:i:s', strtotime($participante->updated_at))); ?><br>
                            Situação: <span class="badge bg-success"><?php echo e($participante->status()); ?></span>
                            <hr>
                        </p>
                        <p class="text-center">
                            <a href="<?php echo e($participante->linkWpp()); ?>&text=Olá *<?php echo e($participante->name); ?>.* Agradecemos a sua participação na ação: *<?php echo e($participante->rifa()->name); ?>*. Suas cotas são: *<?php echo e($participante->numbersResumo()); ?>*" target="_blank">
                                <b><span class="badge bg-success"><i class="fab fa-whatsapp"></i> Enviar Bilhete Pelo WhatsApp</span></b>
                            </a>
                            <hr>
                        </p>
                        <p class="text-center">
                            <a href="<?php echo e($participante->linkWpp()); ?>&text=Olá *<?php echo e($participante->name); ?>.* Agradecemos a sua participação na ação: *<?php echo e($participante->rifa()->name); ?>*. Gostariamos de anunciar que você foi o ganhador do sorteio!" target="_blank">
                                <b><span class="badge bg-success"><i class="fab fa-whatsapp"></i> Enviar Mensagem de Ganhador</span></b>
                            </a>
                            <hr>
                        </p>
                        <p class="text-center">
                            <a href="<?php echo e(route('releaseReservedRafflesNumbers', ['release_reservervations' => $participante->id])); ?>" onClick="this.disabled=true; this.innerHTML='Processando...';this.classList.add('disabled')"><b><span class="badge bg-danger"><i class="far fa-trash-alt"></i> Excluir Cota</span></b></a>
                            <a href="<?php echo e(route('pagarReservas', ['participante' => $participante->id])); ?>"  onClick="this.disabled=true; this.innerHTML='Processando...';this.classList.add('disabled')"><b><span class="badge bg-success"><i class="fas fa-check-double"></i> Aprovar Cota</span></b></a>
                        </p>
                    </div>
                </div>
            </div>
            
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    
    <?php echo $__env->make('compras.modal.editarRifa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('compras.modal.criarCompra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    <?php echo $__env->make('compras.modal.detalhes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <form class="d-none" action="<?php echo e(route('addFoto')); ?>" id="form-foto" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="text" id="rifa-id" name="idRifa" value="<?php echo e($rifa->id); ?>">
        <input type="file" id="input-add-foto" accept="image/png,image/jpeg,image/jpg" multiple name="fotos[]">
    </form>

    <script>
        document.getElementById("input-add-foto").addEventListener("change", function(el) {
            $('#form-foto').submit();
        });

        document.getElementById('telephone').addEventListener('input', function(e) {
            var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
            e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
        });

        function detalhesParticipante(el) {
            var contentModal = document.getElementById('content-modal-detalhes-compra');
            loading()
            $.ajax({
                url: "<?php echo e(route('compras.detalhes')); ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": el.dataset.id
                },
                success: function(response) {
                    loading();
                    console.log(response.html);
                    $('#content-modal-detalhes-compra').html(response.html)
                    $('#modal_detalhes_compra').modal('show')
                },
                error: function(error) {
                    loading();
                    Swal.fire(
                        'Erro Desconhecido!',
                        '',
                        'error'
                    )
                }
            })



        }

        function addFoto(el) {
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

        function toggleSearch() {
            var el = document.getElementById('div-search')
            el.classList.toggle('d-none')
        }

        function liberarReservas(idRifa) {
            Swal.fire({
                title: 'Tem certeza que deseja liberar todas as reservas?',
                text: "Essa ação não poderá ser desfeita",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, liberar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo e(route('compras.liberarReservas')); ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "id": idRifa
                        },
                        success: function(response) {
                            if (response.message) {
                                Swal.fire(
                                    'Sucesso!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location.reload()
                                })
                            } else {
                                Swal.fire(
                                    'Erro!',
                                    response.error,
                                    'danger'
                                )
                            }

                        },
                        error: function(error) {
                            Swal.fire(
                                'Erro!',
                                error,
                                'danger'
                            )
                        }
                    })
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/compras/compras.blade.php ENDPATH**/ ?>
<!-- Modal FINALIZAR RESERVA (CHECKOUT) -->





<div class="modal fade" id="staticBackdrop" data-backdrop="MODA" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 999999;">
    <div class="modal-dialog modal-lg">
        <form action="<?php echo e(route('bookProductManualy')); ?>" id="form-checkout" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content" style="border: none;">
                <div class="modal-header" >
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Finalise sua Reserva
                        <lord-icon
                            src="https://cdn.lordicon.com/jzvoyjzb.json"
                            trigger="loop"
                            delay="500"
                            style="width:20px;height:20px">
                        </lord-icon>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background: #efefef;color: #939393;">
                    <?php if($type_raffles == 'manual'): ?>
                        <small class="form-text d-none" style="color: green;"><b>Valor a pagar: <small style="font-size: 15px;"
                                    id="numberSelectedTotalModal"></small></b></small>
                    <?php else: ?>
                        <small class="form-text d-none" style="color: green;"><b>Valor a pagar: <small style="font-size: 15px;"
                                    id="numberSelectedTotalModal"></small></b></small>
                    <?php endif; ?>

                    <div class="form-group">
                        <input type="hidden" name="tokenAfiliado" value="<?php echo e($tokenAfiliado); ?>">
                        <div class="row">
                            <div class="col-md-12 d-none">
                                <div class="numberSelected" id="numberSelectedModal"
                                    style="overflow-y: auto;width: 190px;"></div>
                            </div>
                        </div>
                        <?php if(str_starts_with($productModel->modo_de_jogo, 'fazendinha')): ?>
                            <input type="hidden" class="form-control" name="" id="qtdNumbers">
                        <?php else: ?>
                            <?php if($type_raffles == 'manual'): ?>
                                <input type="hidden" class="form-control" name="qtdNumbers" id="qtdNumbers"
                                    value="">
                                <input type="hidden" class="form-control" name="rifaManual" id="qtdNumbers"
                                    value="1">
                            <?php else: ?>
                                <input type="hidden" class="form-control" name="qtdNumbers" id="qtdNumbers">
                            <?php endif; ?>
                        <?php endif; ?>

                        <input type="hidden" id="qtdManual">
                        <input type="hidden" class="form-control" name="productName" value="<?php echo e($product[0]->name); ?>">
                        <input type="hidden" class="form-control" name="productID" value="<?php echo e($product[0]->id); ?>">
                        <input type="hidden" class="form-control" name="numberSelected" id="numberSelectedInput">
                    </div>
                    <div class="form-group">
                        <p style="background-color: #cff4fc;padding: 10px;border-radius: 10px;color: #055160;">
                            <b>Sorteio: </b> <strong id="rifa-checkout"></strong>
                        </p>
                        <p style="background-color: #cff4fc;padding: 10px;border-radius: 10px;color: #055160;">
                            <b>Quantidade de Cotas: </b> <strong id="qtd-checkout"></strong>
                        </p>
                    </div>

                    <div class="form-group d-flex d-none" id="div-customer">
                        <div>
                            <img src="<?php echo e(asset('images/default-user.jpg')); ?>"
                                style="width: 70px; height: 70px;border-radius: 10px;">
                        </div>

                        <div class="ml-2" style="color: #000">
                            <h4 id="customer-name">Mario Souza</h4>
                            <h5 id="customer-phone">(15) 99770-6933</h5>
                        </div>
                    </div>

                    <div class="form-group" id="div-telefone">
                        <label style="color: #000"><strong>Informe seu telefone</strong></label>
                        <input type="text" class="form-control numbermask keydown"
                            style="background-color: #fff;border: none;color: #333;" name="telephone" id="telephone1"
                            placeholder="(00) 90000-0000" maxlength="15" required>
                        <input type="hidden" name="telephone" id="phone-cliente">
                        <input type="hidden" id="customer" name="customer">
                    </div>
                    <br>
                    <div class="form-group d-none" id="div-nome">
                        <label style="color: #000"><strong>Nome Completo</strong></label>
                        <input type="text" class="form-control"
                            style="background-color: #fff;border: none;color: #333;" name="name" id="name"
                            required>
                    </div>
                    <br>
                    <div class="form-group" id="div-info"
                        style="background-color: #fff3cd;padding: 10px;border-radius: 10px;color: #664d03;">
                        <span><i class="fas fa-info-circle"></i>&nbsp;<span id="info-footer">Informe seu telefone para continuar.</span></span>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <button class="btn btn-block btn-primary" id="btn-checkout-action" onclick="checkCustomer()" type="button"><strong id="btn-checkout">Continuar</strong></button>
                    </div>
                    <center>
                        <button class="btn btn-sm btn-outline-secondary mt-2 d-none" id="btn-alterar"
                            onclick="clearModal()">Alterar Telefone</button>
                    </center>
                    <input type="hidden" id="promo" name="promo">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#staticBackdrop').on('hide.bs.modal', function() {
        clearModal()
    })

    $('input.keydown').on('keydown', function(e) {
        var code = e.which || e.keyCode;

        if (code == 13) {
            event.preventDefault();
            checkCustomer()
        }
    });



    function checkCustomer() {
        var phone = $('#telephone1').val()
        if (phone == null || phone == '') {
            alert('Informe o telefone para continuar!');
            $('#telephone1').focus();
            return;
        } else if (phone.length < 15) {
            alert('Informe um telefone válido!');
            $('#telephone1').select();
            return;
        }

        loading()
        $.ajax({
            url: "<?php echo e(route('getCustomer')); ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                "phone": phone
            },
            success: function(response) {
                loading()
                if (response.customer == null) {
                    novoCliente(phone);
                } else {
                    findCustomer(response.customer)
                }
            },
            error: function(error) {
                Swal.fire(
                    'Erro Desconhecido!',
                    '',
                    'error'
                )
            }
        })
    }

    function finalizarCompra() {
        $('#form-checkout').submit();
    }

    function findCustomer(customer) {
        document.getElementById('customer-name').innerHTML = customer.nome;
        document.getElementById('customer-phone').innerHTML = customer.telephone;
        document.getElementById('name').value = customer.nome;
        document.getElementById('phone-cliente').value = customer.telephone;

        document.getElementById('customer').value = customer.id;
        document.getElementById('div-customer').classList.toggle('d-none');
        document.getElementById('btn-checkout').innerHTML = 'Concluir reserva';
        document.getElementById('btn-checkout-action').setAttribute("onclick", "loading()")
        document.getElementById('btn-checkout-action').type = 'submit'
        document.getElementById('btn-alterar').innerHTML = 'Alterar Conta';
        document.getElementById('btn-alterar').classList.remove('d-none');
        document.getElementById('div-info').classList.add('d-none');
        document.getElementById('div-telefone').classList.add('d-none');
    }

    function clearModal() {
        document.getElementById('telephone1').value = '';
        document.getElementById('telephone1').disabled = false;
        document.getElementById('div-nome').classList.add('d-none');
        document.getElementById('info-footer').innerHTML = 'Informe seu telefone para continuar.';
        document.getElementById('btn-checkout').innerHTML = 'Continuar';
        document.getElementById('btn-checkout-action').setAttribute("onclick", "checkCustomer()")
        document.getElementById('btn-alterar').classList.add('d-none');
        document.getElementById('btn-checkout-action').type = 'button'
        document.getElementById('phone-cliente').value = ''
        document.getElementById('customer').value = 0;
        document.getElementById('div-customer').classList.add('d-none');
        document.getElementById('div-info').classList.remove('d-none');
        document.getElementById('div-telefone').classList.remove('d-none');
    }

    function novoCliente(phone) {
        document.getElementById('telephone1').disabled = true;
        document.getElementById('div-nome').classList.toggle('d-none');
        document.getElementById('info-footer').innerHTML = 'Informe os dados corretos para recebimento das premiações.';
        document.getElementById('btn-checkout').innerHTML = 'Concluir cadastro e pagar';
        document.getElementById('btn-checkout-action').setAttribute("onclick", "loading()")
        document.getElementById('btn-checkout-action').type = 'submit'
        document.getElementById('btn-alterar').classList.innerHTML = 'Alterar Telefone';
        document.getElementById('btn-alterar').classList.toggle('d-none');
        document.getElementById('phone-cliente').value = phone
        document.getElementById('customer').value = 0;
    }
</script>


<div class="modal fade" id="modal-premios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none;">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalLabel" >
                    PRÊMIOS DO SORTEIO
                    <lord-icon
                        src="https://cdn.lordicon.com/cqofjexf.json"
                        trigger="loop"
                        style="width:30px;height:30px">
                    </lord-icon>
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="">
                <div class="col-md-12 text-center">
                    <strong>Sorteio: </strong><?php echo e($productModel->name); ?>

                </div>
                <hr>
                <?php $__currentLoopData = $productModel->premios()->where('descricao', '!=', ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <label><strong>Prêmio <?php echo e($premio->ordem); ?>: </strong><?php echo e($premio->descricao); ?></label>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>


<div class="blob green" id="messageIn"
    style="position: fixed;
bottom: 15px;
z-index: 99999;
color: #fff;
padding: 3px;
font-weight: bold;
font-size: 12px;
width: 180px;
text-align: center;
z-index: 99999;border-radius: 20px;left: 10px;">
</div>
<?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/rifas/modal.blade.php ENDPATH**/ ?>
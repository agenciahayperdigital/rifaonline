<!-- thegreg -->

<?php $__env->startSection('content'); ?>
<br>
<section class="container-fluid">
	<div class="row">
		<div class="col-sm-4 mb-3 mb-sm-0">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><b>Total de Afiliações</b></h5>
					<p class="card-text">Quantidade de sorteios afiliados!</p>
					<a href="javascript:void(0)" class="btn btn-primary"><b>Afilições [ <?php echo e($countCheck); ?> ]</b></a>
				</div>
			</div>
		</div>
		<div class="col-sm-4 mb-3 mb-sm-0">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><b>Total Vendido</b></h5>
					<p class="card-text">Quantidade total das vendas!</p>
					<a href="javascript:void(0)" class="btn btn-primary"><b>R$ <?php echo e(number_format($totalVedidoTodasRifas,2,',', '.')); ?></b></a>
				</div>
			</div>
		</div>
		<div class="col-sm-4 mb-3 mb-sm-0">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><b>Total Vendido [Pago]</b></h5>
					<p class="card-text">Quantidade total das vendas pagas!</p>
					<a href="javascript:void(0)" class="btn btn-primary"><b>R$ <?php echo e(number_format($totalVedidoTodasRifasPago,2,',', '.')); ?></b></a>
				</div>
			</div>
		</div>
	</div>
</section>









    <section class="container-fluid">
       

        <div class="row">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-muted text-small text-uppercase">#</th>
                                    <th class="text-muted text-small text-uppercase">MINIATURA</th>
                                    <th class="text-muted text-small text-uppercase">RIFA</th>
                                    <th class="text-muted text-small text-uppercase">SORTEIO</th>
                                    <th class="text-muted text-small text-uppercase">VALOR DA COTA</th>
                                    <th class="text-muted text-small text-uppercase">% AFILIADO</th>
                                    <th class="text-muted text-small text-uppercase">VENDIDO</th>
                                    <th class="text-muted text-small text-uppercase">VENDIDO PAGO</th>
                                    <th class="text-muted text-small text-uppercase">STATUS</th>
                                    <th class="text-muted text-small text-uppercase">AÇÂO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $rifas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rifa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr x-data="{ procentagem: 0 }">
                                        <td><?php echo e($rifa->id); ?></td>
                                        <td style="width: 50px;" class="text-center">
                                            <img style="border-radius: 5px;"
                                                src="/products/<?php echo e($rifa->imagem() ? $rifa->imagem()->name : ''); ?>"
                                                width="50" alt="">
                                        </td>
                                        <td><?php echo e($rifa->name); ?></td>
                                        <td><?php echo e($rifa->status); ?></td>
                                        <td>R$ <?php echo e(number_format(str_replace(',', '.', $rifa->price),2,',', '.')); ?></td>
                                        <td>
                                            <?php if($rifa->checkAfiliado): ?>
                                                <span><?php echo e($rifa->porcentagem); ?></span>
                                            <?php else: ?>
                                                <input type="number" min="0" max="100" step="0.1"
                                                    x-model="procentagem" />
                                            <?php endif; ?>
                                        </td>
                                        <td>R$ <?php echo e(number_format($rifa->ganhosTotalPorAfiliadoPorRifa($afiliado->id),2,',', '.')); ?></td>
                                        <td>R$ <?php echo e(number_format($rifa->ganhosTotalPorAfiliadoPorRifaPago($afiliado->id),2,',', '.')); ?></td>
                                        <td><?php echo e($rifa->checkAfiliado ? 'Registrado' : ''); ?></td>
                                        <td>
                                            <?php if(!$rifa->checkAfiliado): ?>
                                                <form method="POST"
                                                    action="<?php echo e(route('registraAfiliado', ['idRifa' => $rifa->id, 'afiliado' => $afiliado])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="procentagem" x-model="procentagem" />
                                                    <button type="submit"
                                                        <?php echo e($rifa->checkAfiliado ? 'disabled' : ''); ?>>Afiliar</button>
                                                </form>
                                            <?php else: ?>
                                                <button
                                                    class="btn btn-sm btn-info <?php echo e(!$rifa->checkAfiliado ? 'disabled btn-outline-info' : ''); ?>"
                                                    data-bs-toggle="modal" data-bs-target="#modal-link"
                                                    data-url="<?php echo e(route('product', $rifa->slug)); ?>"
                                                    data-token="<?php echo e($rifa->getAfiliadoToken); ?>"
                                                    onclick="getLinkAfiliado(this)">Link</button>
                                            <?php endif; ?>


                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>


<script src="<?php echo e(asset('js/vendor/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/cs/datatable.extend.js')); ?>"></script>
<script src="<?php echo e(asset('js/dataTable/rifasAtivas.js')); ?>"></script>
<script src="<?php echo e(asset('js/forms/controls.datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('js/vendor/datepicker/bootstrap-datepicker.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/vendor/jquery.validate/jquery.validate.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/vendor/jquery.validate/additional-methods.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/forms/validation.js')); ?>"></script>

<script>
    function getLinkAfiliado(el) {
        var url = el.dataset.url;
        var token = el.dataset.token;
        var link = `${url}/${token}`;

        $('#link-afiliado').val(link);
        $('#link-facebook').attr('href', `https://www.facebook.com/sharer/sharer.php?u=${link}`);
        $('#link-telegram').attr('href', `https://telegram.me/share/url?url=${link}`)
        $('#link-wpp').attr('href', `https://api.whatsapp.com/send?text=${link}`)
        $('#link-twitter').attr('href',
            `https://twitter.com/intent/tweet?text=Vc%20pode%20ser%20o%20Próximo%20Ganhador%20${link}`)
        $('#modal-link').modal('show');
    }

    function copiarLink() {
        var copyText = document.getElementById("link-afiliado");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        alert("Link copiado com sucesso.");

    }

    function closeModal() {
        $('#modal-link').modal('hide')
    }
</script>




<div class="modal fade" id="modal-link" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Link de Afiliado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center">
                    <p> Divulge o link abaixo e ganhe a cada compra com o seu link!</p>
                </div>

                <div class="col-md-12 mt-4">
                    <input type="text" id="link-afiliado" class="form-control text-center">
                </div>
                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-sm btn-info" style="color: #fff;" onclick="copiarLink()">Copiar</button>
                        <a class="btn btn-primary" id="link-facebook"
                            style="background-color: #2760AE;border: none;font-size: 20px;" href=""
                            target="_blank" rel="noreferrer noopener" role="button"><i class="bi bi-facebook"></i></a>
                        <!-- Telegram -->
                        <a class="btn btn-primary" id="link-telegram" style="background-color: #2F9DDF;border: none;"
                            href="" target="_blank" rel="noreferrer noopener" role="button"><i
                                class="bi bi-telegram" style="font-size: 20px;"></i></a>
                        <!-- Whatsapp -->
                        <a class="btn btn-primary" id="link-wpp" style="background-color: #25d366;border: none;"
                            href="" target="_blank" rel="noreferrer noopener" role="button"><i
                                class="bi bi-whatsapp" style="font-size: 20px;"></i></a>
                        <!-- Twitter -->
                        <a class="btn btn-primary" id="link-twitter" style="background-color: #34B3F7;border: none;"
                            href="" target="_blank" rel="noreferrer noopener" role="button"><i
                                class="bi bi-twitter" style="font-size: 20px;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/detalhes-afiliados.blade.php ENDPATH**/ ?>
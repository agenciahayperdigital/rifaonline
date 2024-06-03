<!-- thegreg -->

<?php $__env->startSection('content'); ?>
<br>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div>
			    
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">NOME</th>
							<th scope="col">TELEFONE</th>
							<th scope="col">AÇÕES</th>
						</tr>
					</thead>
					
					<tbody>
					    
					    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr data-code="<?php echo e($cliente->id); ?>" data-nome="<?php echo e($cliente->nome); ?>" data-telefone="<?php echo e($cliente->telephone); ?>">
							<td><?php echo e($cliente->nome); ?></td>
							<td><?php echo e($cliente->telephone); ?></td>
							<td>
							    <div class="dropdown">
                                	<button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                	Editar
                                	</button>
                                	<ul class="dropdown-menu">
                                		<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editarcliente">Editar Cliente</a></li>
                                		<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#excluircliente">Excluir Cliente</a></li>
                                	</ul>
                                </div>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
			
					</tbody>
				</table>

    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="<?php echo e($clientes->previousPageUrl()); ?>">Anterior</a></li>
        <?php for($i = 1; $i <= $clientes->lastPage(); $i++): ?>
            <li class="page-item"><a class="page-link" href="<?php echo e($clientes->url($i)); ?>"><?php echo e($i); ?></a></li>
        <?php endfor; ?>
        <li class="page-item"><a class="page-link" href="<?php echo e($clientes->nextPageUrl()); ?>">Próximo</a></li>
    </ul>
</nav>
                
			</div>
		</div>
	</div>
</section>

<!-- Modal Editar Cliente -->
<div class="modal fade" id="editarcliente" tabindex="-1" aria-labelledby="editarclienteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5 display-6" id="editarclienteLabel">Editar Cliente 📌</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
				<form id="formEditarCliente" action="<?php echo e(route('editarCliente')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="editInputCode" id="editInputCode">
                	<div class="mb-3">
                		<label for="editInputEmail" class="form-label">Nome do Cliente</label>
                		<input type="text" class="form-control" id="editInputEmail" name="editInputEmail" value="Bruno Alves da Silva Editar" disabled />
                	</div>
                	<div class="mb-3">
                		<label for="editInputPassword" class="form-label">Telefone ou WhatsApp</label>
                		<input type="text" class="form-control" id="editInputPassword" name="editInputPassword" value="(85) 9.0000-0000 Editar">
                		<div class="form-text">Confirma se o número está correto antes de salvar.</div>
                	</div>
                	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                	<button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
            </div>
		</div>
	</div>
</div>

<!-- Modal Excluir Cliente -->
<div class="modal fade" id="excluircliente" tabindex="-1" aria-labelledby="excluirclienteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5 display-6" id="excluirclienteLabel">Excluir Cliente 📌</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
				<form id="formExcluirCliente" action="<?php echo e(route('excluirCliente')); ?>" method="POST">
				    <?php echo csrf_field(); ?>
				    <input type="hidden" name="excluirInputCode" id="excluirInputCode">
                	<div class="mb-3">
                		<label for="excluirInputEmail" class="form-label">Nome do Cliente</label>
                		<input type="text" class="form-control" id="excluirInputEmail" value="Bruno Alves da Silva Excluir" disabled />
                	</div>
                	<div class="mb-3">
                		<label for="excluirInputPassword" class="form-label">Telefone ou WhatsApp</label>
                		<input type="text" class="form-control" id="excluirInputPassword" value="(85) 9.0000-0000 Excluir" disabled />
                		<div class="form-text">Após a exclusão essa ação não poderar ser desfeita, todo historico do cliente é excluido do banco de dados.</div>
                	</div>
                	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                	<button type="submit" class="btn btn-danger">Excluir Cliente</button>
                </form>
			</div>
		</div>
	</div>
</div>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/villa300/public_html/resources/views/clientes.blade.php ENDPATH**/ ?>
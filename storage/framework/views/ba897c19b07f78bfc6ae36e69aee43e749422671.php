<!-- thegreg -->

<?php $__env->startSection('content'); ?>
<br>
<section class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4>Regras Básicas</h4>
                    <p><b>Registro e Aprovação:</b> Os interessados em se tornar afiliados devem se registrar através de um formulário de inscrição enviado via WhatsApp pelo administradopr do site, convidado a se afiliar na plataforma. Antes de serem aceitos como afiliados, suas inscrições devem ser revisadas e aprovadas pela equipe responsável.</p>
                    <p><b>Conformidade com Políticas:</b> Os afiliados devem concordar em aderir e cumprir todas as políticas e diretrizes estabelecidas pelo seu programa de afiliados. Isso pode incluir políticas relacionadas a práticas de marketing éticas, uso adequado de materiais de marketing fornecidos e conformidade com regulamentos legais aplicáveis, como o GDPR.</p>
                    <p><b>Promoção Responsável:</b> Os afiliados devem promover seus produtos ou serviços de forma responsável e ética. Isso inclui evitar práticas de marketing enganosas, spam ou qualquer atividade que possa prejudicar a reputação do seu site ou marca.</p>
                    <p><b>Transparência e Divulgação:</b> Os afiliados devem divulgar claramente sua afiliação ao seu programa em todas as suas promoções e conteúdos relacionados aos seus produtos ou serviços. Isso garante transparência e ajuda os consumidores a entenderem que estão sendo direcionados para o seu site através de uma afiliação.</p>
                    <p><b>Desempenho e Relatórios:</b> Os afiliados recebem regularmente o desempenho de suas afiliações e receberam um relatórios de desempenho conforme solicitado. Isso ajuda a avaliar a eficácia de sua parceria como afiliado e permite ajustes estratégicos, se necessário, para melhorar os resultados.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4>Registrar Afiliado</h4>
                    <form method="POST" action="<?php echo e(route('afiliado.novo')); ?>">
						<?php echo csrf_field(); ?>
                    	<div class="row">
                    	    <div class="col-sm-6 mb-3">
                        		<label for="name" class="form-label">Nome Completo</label>
                        		<input type="text" name="nome" class="form-control">
                        	</div>
                        	<div class="col-sm-6 mb-3">
                        		<label for="cpf" class="form-label">CPF</label>
                        		<input type="text" name="cpf" class="form-control">
                        	</div>
                        	<div class="col-sm-6 mb-3">
                        		<label for="telephone" class="form-label">Telefone</label>
                        		<input type="tel" placeholder="(xx) xxxxx-xxxx" name="telephone" class="form-control">
                        	</div>
                        	<div class="col-sm-6 mb-3">
                        		<label for="email" class="form-label">Email</label>
                        		<input type="email" name="email" class="form-control">
                        	</div>
                        	<div class="col-sm-6 mb-3">
                        		<label for="pix" class="form-label">Chave PIX</label>
                        		<input type="text" name="pix" class="form-control">
                        	</div>
                        	
                        	
                    	</div>
                    	
                    	<button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/cadastra-novo-afiliados.blade.php ENDPATH**/ ?>
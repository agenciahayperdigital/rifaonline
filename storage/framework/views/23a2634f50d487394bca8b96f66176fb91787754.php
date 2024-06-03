<?php $__env->startSection('content'); ?>
<br>


<div class="container">
 
    <div class="col">
        <div class="card text-center">
        	<div class="card-header">
        		<b>PAINEL ADMINISTRATIVO</b>
        	</div>
        	<div class="card-body">
        		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-md-9 col-lg-6 col-xl-5">
                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/eoacwhtz.json"
                    trigger="loop"
                    delay="2000"
                    style="width:441px;height:300px">
                </lord-icon>
			</div>
			
			
			<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
				<form class="form-signin" method="POST" action="<?php echo e(route('login')); ?>">
				    <?php echo e(csrf_field()); ?>

					<!-- Email input -->
					<div>
					    <?php if($errors->has('email')): ?>
					    <div class="alert alert-danger" role="alert">
                          <strong><?php echo e($errors->first('email')); ?></strong>
                        </div>
        				<?php endif; ?>
        				<?php if($errors->has('password')): ?>
        				<div class="alert alert-danger" role="alert">
                          <strong><?php echo e($errors->first('password')); ?></strong>
                        </div>
        				<?php endif; ?>
        			</div>
					<div class="form-outline mb-3 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
					    <label class="form-label" for="email"><strong>Email Administrativo</strong></label>
						<input id="email" type="email" class="form-control form-control-lg" name="email" value="<?php echo e(old('email')); ?>" required placeholder="teste@sistemadirifa.com" />
					</div>
					<!-- Password input -->
					<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            			<label for="password" class="control-label"><strong>Senha Administrativa</strong></label>
            			<div class="col-md-12">
            				<input id="password" type="password" class="form-control form-control-lg" name="password" required placeholder="********"/>
            				<?php if($errors->has('password')): ?>
            				<span class="help-block">
            				<strong><?php echo e($errors->first('password')); ?></strong>
            				</span>
            				<?php endif; ?>
            			</div>
            		</div>
					<div class="text-center text-lg-start mt-4 pt-2 form-group">
						<button type="submit" type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Fazer Login</button>
						<p class="small fw-bold mt-2 pt-1 mb-0">Ainda não tem seu site de rifas? <a href="https://wa.me/5585981779372?text=Ol%C3%A1,%20gostaria%20de%20ter%20meu%20pr%C3%B3prio%20site%20de%20*Rifas%20Online*!%20Com%2050%%20de%20desconto%20na%20ades%C3%A3o%20do%20sistema!" target="_blank" class="link-danger">Clique Aqui</a></p>
					</div>
				</form>
			</div>
		</div>
        	</div>
        	<div class="card-footer text-muted">
        	    <b>AVISO: </b>Ao tentar logar varias vezes sem sucesso, seu acesso é bloqueado do site!<br>
        	    <img src="https://clipground.com/images/norton-secured-logo-png-7.jpg" width="250" height="70" />
        	</div>
        </div>
    </div>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/explo595/sistemadirifa.online/resources/views/auth/login.blade.php ENDPATH**/ ?>
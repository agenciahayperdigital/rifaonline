<!-- thegreg -->
@extends('layouts.admin')
@section('content')


<section class="content">
<br>
<section class="content">
	<div class="container-fluid">
		<div class="row">
		    
			<div class="col-md-3">
				<script>
					function submitFoto() {
					    $('#form-logo').submit();
					}
					
					function alteraLogo() {
					    $('#input-logo').click();
					}
				</script>
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							@if ($users->logo)
							<img src="{{ asset('products/' . $users->logo) }}" alt="" width="160">
							@endif
						</div>
						<h3 class="profile-username text-center"><button class="btn btn-sm btn-success"
							onclick="alteraLogo()">SELECIONAR LOGO MARCA</button></h3>
						<center>
							<p>O tamano ideal para o site é: 160 x 60.<br>Formato: PNG ou JPG</p>
						</center>
						<form class="d-none" action="{{ route('alterarLogo') }}" enctype="multipart/form-data"
							method="POST" id="form-logo">
							@csrf
							<input type="file" id="input-logo" name="logo" onchange="submitFoto()">
						</form>
						<p class="text-muted text-center"></p>
					</div>
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="settings">
								<form action="{{ route('updateProfile') }}" method="POST" class="form-horizontal">
									<div class="row">
									{{ csrf_field() }}
									<h1 class="display-6">Configurações Gerais</h1>
									<div class="form-group col-md-6">
										<label>Nome do Administrador</label>
										<input type="text" class="form-control form-control-sm" name="name"  value="{{ $users->name }}" placeholder="Nome">
										<div id="emailHelp" class="form-text">Escolha o nome que deseja ser chamado.</div>
									</div>
									<div class="form-group col-md-6">
										<label>Nome da Plataforma</label>
										<input type="text" class="form-control form-control-sm" name="platform" value="{{ $users->platform }}" placeholder="Plataforma">
										<div id="emailHelp" class="form-text">Digite acima o nome da sua Plataforma de Sorteios.</div>
									</div>
									@if (env('ACTIVE_TEMA'))
									<div class="form-group col-md-6">
										<label>Opções de Tema</label>
										<select name="tema" class="form-control form-control-sm">
										<option value="light" {{ $users->tema == 'light' ? 'selected' : '' }}>
										Claro</option>
										<option value="dark" {{ $users->tema == 'dark' ? 'selected' : '' }}>
										Escuro</option>
										</select>
										<div id="emailHelp" class="form-text">Esolha o tema do site: Padrão (Claro).</div>
									</div>
									@endif
									<div class="form-group col-md-6">
										<label>Número de WhatsApp</label>
										<input type="text" class="form-control form-control-sm" name="telephone" value="{{ $users->telephone }}" placeholder="Telefone">
										<div id="emailHelp" class="form-text">Digite apenas os números com DDD.</div>
									</div>
									
									<div class="form-group col-md-6">
										<label>Senha Administrativa</label>
										<input type="text" class="form-control form-control-sm" name="senha" placeholder="Senha">
										<div id="emailHelp" class="form-text">Minimo 8 números.</div>
									</div>
									<div class="form-group col-md-6">
										<label>E-mail Administrativo</label>
										<input type="email" class="form-control form-control-sm" name="email" value="{{ $users->email }}" placeholder="E-mail">
										<div id="emailHelp" class="form-text">Digite o e-mail administrativo. <i>"OBS: Esse email será seu login!"</i></div>
									</div>
									
									<hr>
									<h1 class="display-6">Redes Sociais</h1>
									<div class="form-group col-md-6">
										<label>Grupo Whatsapp</label>
										<input type="text" class="form-control form-control-sm" name="group_whats" value="{{ $users->group_whats }}" placeholder="">
										<div id="emailHelp" class="form-text">Digite o link de acesso ao seu grupo.</div>
									</div>
									<div class="form-group col-md-6">
										<label>Facebook</label>
										<input type="text" class="form-control form-control-sm" name="facebook" value="{{ $users->facebook }}" placeholder="Facebook">
										<div id="emailHelp" class="form-text">Digite o link de acesso ao seu grupo.</div>
									</div>
									<div class="form-group col-md-6">
										<label>Instagram</label>
										<input type="text" class="form-control form-control-sm" name="instagram" value="{{ $users->instagram }}" placeholder="instagram">
										<div id="emailHelp" class="form-text">Digite o link de acesso ao seu grupo.</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-danger">SALVAR DADOS</button>
									</div>
									</div>
								</form>
							</div>
							
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
@endsection


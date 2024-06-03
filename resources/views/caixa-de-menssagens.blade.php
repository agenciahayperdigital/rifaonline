<!-- thegreg -->
@extends('layouts.admin')
@section('content')

<section class="content">
    <br>
    <div class="row">
    	<div class="col-sm-12 text-center">
    		<h1 class="display-6">Caixa de mensagens</h1>
    		<p>Todas as mensagens do site chegam por aqui, basta clicar no botão do WhatsApp e responder a dúvida que foi enviada.</p>
    		<hr>
    	</div>
    </div>
</section>

<section class="content">
    <div class="row">
    	<div class="col-sm-12 text-center">
    		<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Telefone ou WhatsApp</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Qual Assunto</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><span class="badge bg-success"><i class="fab fa-whatsapp"></i> (85) 9.0000-0000</span></th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ações
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#vermensagem">Visualizar</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#excluirmsg">Excluir</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Voltar</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">Avançar</a></li>
                </ul>
            </nav>
    	</div>
    </div>
</section>

<!-- Ver Mensagem -->
<div class="modal fade" id="vermensagem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Mensagem Recebida</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
                	<div class="mb-3">
                		<label for="exampleInputEmail1" class="form-label">Telefone ou Whatsapp</label>
                		<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="(00) 9.0000-0000" disabled>
                	</div>
                	<div class="mb-3">
                		<label for="exampleInputPassword1" class="form-label">Nome Completo</label>
                		<input type="text" class="form-control" id="exampleInputPassword1" value="Nome Copmpleto" disabled>
                	</div>
                	<div class="mb-3">
                		<label for="exampleInputPassword1" class="form-label">Assunto</label>
                		<input type="text" class="form-control" id="exampleInputPassword1" value="Suporte" disabled>
                	</div>
                	<div class="mb-3">
                		<label for="exampleInputPassword1" class="form-label">Comprovante ou Documento Anexado</label>
                		<br>
                		<a href="javascript:void(0)"><span class="badge bg-success"><i class="fas fa-file-invoice"></i> Clique aqui para baixar.</span></a>
                	</div>
                	<div class="mb-3">
                		<label for="exampleInputPassword1" class="form-label">Mensagem</label>
                		<p>Mensagem aqui.</p>
                	</div>
                	<div class="mb-3">
                		<label for="exampleInputPassword1" class="form-label">Entrar em Contato</label><br>
                		<a href="javascript:void(0)"><span class="badge bg-success"><i class="fab fa-whatsapp"></i> Falar por WhatsApp</span></a>
                	</div>
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Sair</button>
			</div>
		</div>
	</div>
</div>

<!-- Excluir Mensagem -->
<div class="modal fade" id="excluirmsg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Mensagem</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir essa mensagem? Essa ação não pode ser desfeita.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Sair</button>
				<button type="button" class="btn btn-sm btn-danger">Excluir Mensagem</button>
			</div>
		</div>
	</div>
</div>


@endsection
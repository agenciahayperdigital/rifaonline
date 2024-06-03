<!-- thegreg -->
@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-sm-5">
            <div class="card">
            	<div class="card-header">
            		<b>Credênciais Mercado Pago</b>
            	</div>
            	<div class="card-body">
            		<div class="d-grid gap-2">
                        <a href="http://mpago.li/1KpmmFF" target="_blank" class="btn btn-success"><i class="fas fa-user-plus"></i> Criar Conta - Mercado Pago</a>
                        <a href="https://www.mercadopago.com.br/settings/account/credentials" target="_blank" class="btn btn-success"><i class="fas fa-code"></i> Credênciais - Mercado Pago</a>
                    </div>
                    <hr>
            		<p class="card-text">Caso não tenha conta no Mercado Pago, clique em criar conta. Após criar sua conta do mercado pago clique no botão <b>Credênciais - Mercado Pago</b> para gerenciar e criar suas credênciais de Produção. <br>
            		Caso seu site não esteja recebendo pagamento ou dando erro nos pagamento, lembre-se de conferir se suas credênciais estão salvas nos campos a seguir!</p>
            		<hr>
            		<p>OBS: o Mercado Pago as vezes desconecta suas credênciais se algum pagamento suspeito for detectado, caso saia do seu painel, basta clicar em <b>Credênciais - Mercado Pago</b> copiar e salvar novamente!</p>
            		
            	</div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="card">
            	<div class="card-header">
            		<b>Configuração de Credênciais</b>
            	</div>
            	<div class="card-body">
            		<form action="{{ route('update_gateway_pagamento') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" id="type_gateway" name="type_gateway" value="mp">
                    	<div class="mb-3">
                    		<label for="exampleInputEmail1" class="form-label">Public Key (Mercado Pago)</label>
                    		<input type="text" name="key_public" id="mercado_pago_key_public" value="{{ $users->key_pix_public }}" class="form-control form-control-sm" aria-describedby="emailHelp">
                    		<div id="key_public_Help" class="form-text">Basta copiar e colar a Sua chave <b> Publick Key.</b></div>
                    	</div>
                    	<div class="mb-3">
                    		<label for="exampleInputEmail1" class="form-label">Access Token (Mercado Pago)</label>
                    		<input type="text" value="{{ $users->key_pix }}" name="key" id="mercado_pago_key" class="form-control form-control-sm" aria-describedby="emailHelp">
                    		<div id="key_Help" class="form-text">Basta copiar e colar a Sua chave <b> Access Token.</b></div>
                    	</div>
                    	<button type="submit" class="btn btn-sm btn-primary"><b><i class="far fa-save"></i> SALVAR CREDÊNCIAIS</b></button>
                    </form>
            	</div>
            </div>
        </div>
    </div>
    
    <hr>
    
    <div class="row">
        <div class="col-sm-5">
            <div class="card">
            	<div class="card-header">
            		<b>Credênciais Banco Paggue</b>
            	</div>
            	<div class="card-body">
            		<div class="d-grid gap-2">
                        <a href="https://app.paggue.io" target="_blank" class="btn btn-success"><i class="fas fa-user-plus"></i> Criar Conta - Paggue</a>
                    </div>
                    <hr>
            		<p class="card-text">Caso não tenha conta no Paggue, clique em criar conta. Após criar sua conta do Paggue, gere suas credênciais e adicione no site. <br>
            		Caso seu site não esteja recebendo pagamento ou dando erro nos pagamento, lembre-se de conferer se suas credênciais estão salvas nos campos a seguir!</p>
            		<hr>
            		<p>OBS: Não esqueça de criar seu <b>Webhooks</b> no banco Paggue, basta clicar em <b>Novo +</b> selecionar <b>Pix Web</b> e colocar o link<br><b>http://<?php $URL_ATUAL = "$_SERVER[HTTP_HOST]"; echo $URL_ATUAL; ?>/api/webhook-paggue</b></p>
            		
            	</div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="card">
            	<div class="card-header">
            		<b>Configuração de Credênciais</b>
            	</div>
            	<div class="card-body">
            		<form action="{{ route('update_gateway_pagamento') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" id="type_gateway" name="type_gateway" value="paggue">
                    	<div class="mb-3">
                    		<label for="paggue_client_key" class="form-label">Client key (Paggue)</label>
                    		<input type="text" name="paggue_client_key" id="paggue_client_key" value="{{ $users->paggue_client_key }}" class="form-control form-control-sm" aria-describedby="emailHelp">
                    		<div id="paggue_client_key_public_Help" class="form-text">Basta copiar e colar a Sua chave <b> Client Key.</b></div>
                    	</div>
                    	<div class="mb-3">
                    		<label for="paggue_client_secret" class="form-label">Client Secret (Paggue)</label>
                    		<input type="text" value="{{ $users->paggue_client_secret }}" name="paggue_client_secret" id="paggue_client_secret" class="form-control form-control-sm" aria-describedby="emailHelp">
                    		<div id="paggue_client_secret_public_Help" class="form-text">Basta copiar e colar a Sua chave <b> Client Secret.</b></div>
                    	</div>
                    	<button type="submit" class="btn btn-sm btn-primary"><b><i class="far fa-save"></i> SALVAR CREDÊNCIAIS</b></button>
                    </form>
            	</div>
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

@endsection
@extends('layouts.admin')
@section('content')
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <div class="container-fluid">

        {{-- form auxiliar para adicionar imagens na rifa --}}
        <form class="d-none" action="{{ route('addFoto') }}" id="form-foto" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" id="rifa-id" name="idRifa">
            <input type="file" id="input-add-foto" accept="image/png,image/jpeg,image/jpg" multiple name="fotos[]">
        </form>
        <!-- Gerenciar Sorteio -->
        @foreach ($rifas as $key => $product)
            @if ($product->status !== 'Deletado')
                <div classs="row">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/products/{{ $product->imagem() ? $product->imagem()->name : '' }}"
                                    class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p>
                                        <b>{{ $product->name }}</b><br>{{ $product->subname }}<br>
                                        <small class="text-muted">
                                            <span class="badge bg-success">{{ $product->status }}</span>
                                            @if ($product->draw_date != null)
                                                <span
                                                    class="badge bg-success">{{ \Carbon\Carbon::parse($product->draw_date)->format('d/m/Y H:i') }}</span>
                                            @endif
                                            <span class="badge bg-success">Por Cota / R$
                                                {{ number_format(str_replace(',', '.', $product->price), 2, ',', '.') }}</span>
                                            <span class="badge bg-primary">Livres:
                                                {{ $product->qtdNumerosDisponiveis() }}</span>
                                            <span class="badge bg-warning">Reservados:
                                                {{ $product->qtdNumerosReservados() }}</span>
                                            <span class="badge bg-success">Vendidos:
                                                {{ $product->qtdNumerosPagos() }}</span>
                                        </small>
                                    </p>
                                    <p>


                                    </p>
                                    <p>
                                    <div class="progress" role="progressbar" aria-label="Example with label"
                                        aria-valuenow="{{ $product->porcentagem() }}" aria-valuemin="0"
                                        aria-valuemax="100">
                                        <div class="progress-bar" style="width: {{ $product->porcentagem() }}%">
                                            {{ $product->porcentagem() }}%</div>
                                    </div>
                                    </p>
                                    <hr>
                                    <p>
                                        <small class="text-muted">
                                            <a href="{{ route('product', $product->slug) }}" target="_blank"><span
                                                    class="badge bg-success">SORTEIO <i class="far fa-eye"></i></span></a>
                                            <a href="{{ route('rifa.compras', $product->id) }}"><span
                                                    class="badge bg-success">VENDAS <i
                                                        class="fas fa-hand-holding-usd"></i></span></a>
                                            <a href="{{ route('resumoRifa', $product->id) }}" target="_blank"><span
                                                    class="badge bg-success">PARTICIPANTES <i
                                                        class="fas fa-users"></i></span></a>
                                            <a href="#cotasVencedorasEmployeeModal{{ $product->id }}" data-toggle="modal"
                                                data-bs-target="#cotasVencedorasEmployeeModal{{ $product->id }}"><span
                                                    class="badge bg-success">COTAS <i
                                                        class="fas fa-ticket-alt"></i></span></a>
                                            {{-- <a href="javascript:void(0)" onclick="openRanking('{{ $product->id }}')"><span class="badge bg-success">COTAS <i class="fas fa-ticket-alt"></i></span></a> --}}
                                            <a href="#rankingCompradoresEmployeeModal{{ $product->id }}"
                                                style="cursor: pointer" data-toggle="modal"
                                                data-bs-target="#rankingCompradoresEmployeeModal{{ $product->id }}"
                                                data-id="{{ $product->id }}"><span class="badge bg-success">RANKING <i
                                                        class="fas fa-medal"></i></span></a>
                                            <a href="javascript:void(0)"
                                                onclick="verGanhadores('{{ $product->id }}')"><span
                                                    class="badge bg-success">GANHADORES <i
                                                        class="fas fa-trophy"></i></span></a>
                                            <hr>
                                            <a href="javascript:void(0)"
                                                onclick="definirGanhador('{{ $product->id }}')"><span
                                                    class="badge bg-success">ANUNCIAR GANHADOR <i
                                                        class="fas fa-bullhorn"></i></a>
                                            <hr>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#modal_editar_rifa{{ $product->id }}"><span
                                                    class="badge bg-warning">EDITAR SORTEIO <i
                                                        class="fas fa-wrench"></i></span></a>
                                            <a href="#deleteEmployeeModal{{ $product->id }}" style="cursor: pointer"
                                                data-toggle="modal"
                                                data-bs-target="#deleteEmployeeModal{{ $product->id }}"
                                                data-id="{{ $product->id }}"><span class="badge bg-danger">EXCLUIR SORTEIO
                                                    <i class="far fa-trash-alt"></i></span></a>
                                        </small>
                                    </p>
                                    <hr>
                                    <p>
                                        <a href="javascript:void(0)"><b><span class="badge bg-success">Arrecadado: R$
                                                    {{ number_format($product->totalValorVendido(), 2, ',', '.') }}</span></b></a>
                                        -
                                        <a href="javascript:void(0)"><b><span class="badge bg-success">Afiliados: R$
                                                    {{ number_format($product->totalVendidoDosAfiliados(), 2, ',', '.') }}</span></b></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal_editar_rifa{{ $product->id }}" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <form action="{{ route('update', ['id' => $product->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="container mt-3">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h1 class="display-6">Editar Sorteio</h1>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <nav>
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist"
                                                        style="font-size: 12px;">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="geral-tab" data-toggle="tab"
                                                                href="#geral{{ $product->id }}" role="tab"
                                                                aria-controls="geral" aria-selected="true">GERAL</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="ajustes-tab" data-toggle="tab"
                                                                href="#ajustes{{ $product->id }}" role="tab"
                                                                aria-controls="ajustes"
                                                                aria-selected="false">CONFIGURAÇÕES</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="premios-tab" data-toggle="tab"
                                                                href="#premios{{ $product->id }}" role="tab"
                                                                aria-controls="premios" aria-selected="true">PRÊMIOS</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="promocao-tab" data-toggle="tab"
                                                                href="#promocao{{ $product->id }}" role="tab"
                                                                aria-controls="promocao"
                                                                aria-selected="false">PROMOÇÕES</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="fotos-tab" data-toggle="tab"
                                                                href="#fotos{{ $product->id }}" role="tab"
                                                                aria-controls="fotos" aria-selected="false">GALERIA</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="compraAuto-tab" data-toggle="tab"
                                                                href="#compraAuto{{ $product->id }}" role="tab"
                                                                aria-controls="compraAuto" aria-selected="false">COMPRA
                                                                AUTOMÁTICA</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="cotas-tab" data-toggle="tab"
                                                                href="#cotasTab{{ $product->id }}" role="tab"
                                                                aria-controls="cotasTab" aria-selected="false">COTAS</a>
                                                        </li>
                                                    </ul>
                                                </nav>

                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="geral{{ $product->id }}"
                                                        role="tabpanel" aria-labelledby="geral-tab">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Titulo do Sorteio</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $product->id }}">
                                                                            <input type="text" class="form-control"
                                                                                name="name"
                                                                                value="{{ $product->name }}" />
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
                                                                            <input type="text" class="form-control"
                                                                                name="subname"
                                                                                value="{{ $product->subname }}">
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
                                                                                    <span
                                                                                        class="input-group-text">R$:</span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    name="price"
                                                                                    value="{{ $product->price }}" />
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
                                                                        <input type="number" class="form-control"
                                                                            min="1" max="5001" name="minimo"
                                                                            value="{{ $product->minimo }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Qtd máxima por bilhete</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <input type="number" class="form-control"
                                                                            name="maximo"
                                                                            value="{{ $product->maximo }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Tempo de expiração (min)</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <input type="number" class="form-control"
                                                                            name="expiracao" min="0"
                                                                            value="{{ $product->expiracao }}">
                                                                        <div id="emailHelp" class="form-text"> Minimo de 5
                                                                            minutos para pagamento. Caso o cliente não
                                                                            efetue o
                                                                            pagamento as cotas são disponibilizadas
                                                                            novamente
                                                                            para reserva. </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Mostar Ranking de compradores (Qtd).</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <input type="number" class="form-control"
                                                                            min="0" max="10"
                                                                            name="qtd_ranking"
                                                                            value="{{ $product->qtd_ranking }}">
                                                                        <div id="emailHelp" class="form-text">
                                                                            Selecione um número de 1 a 10 para exibir os
                                                                            participantes que adquiriram mais cotas.
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
                                                                            <option value="1"
                                                                                {{ $product->parcial == 1 ? 'selected' : '' }}>
                                                                                Mostrar Parcial </option>
                                                                            <option value="0"
                                                                                {{ $product->parcial == 0 ? 'selected' : '' }}>
                                                                                Não Mostrar Parcial </option>
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
                                                                            <option value="mp"
                                                                                {{ $product->gateway == 'mp' ? 'selected' : '' }}>
                                                                                Banco Mercado Pago</option>
                                                                            <option value="paggue"
                                                                                {{ $product->gateway == 'paggue' ? 'selected' : '' }}>
                                                                                Banco Paggue</option>
                                                                            {{-- <option value="asaas" {{ $product->gateway == 'asaas' ? 'selected' : '' }}> Banco ASAAS</option> --}}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--<div class="col-sm-12">
                                                                                                                                                                <div class="card card-outline">
                                                                                                                                                                    <div class="card-header">
                                                                                                                                                                        <b>% de Ganho do Afiliado</b>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="card-body ">
                                                                                                                                                                        <input type="number" class="form-control"
                                                                                                                                                                            name="ganho_afiliado"
                                                                                                                                                                            value="{{ $product->ganho_afiliado }}">
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div> -->

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Descrição do sorteio.</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <textarea class="form-control summernote" name="description" id="desc-{{ $product->id }}" rows="10">{!! $product->descricao() !!}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <div class="tab-pane fade show" id="premios{{ $product->id }}"
                                                        role="tabpanel" aria-labelledby="geral-tab">
                                                        <div class="row">
                                                            @foreach ($product->premios() as $premio)
                                                                <div class="col-md-6 mt-2">
                                                                    <label>{{ $premio->ordem }}º Prêmio</label>
                                                                    <input type="text" class="form-control"
                                                                        name="descPremio[{{ $premio->ordem }}]"
                                                                        value="{{ $premio->descricao }}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="ajustes{{ $product->id }}"
                                                        role="tabpanel" aria-labelledby="ajustes-tab">
                                                        <div class="row mt-3">

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Status do Sorteio</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <select class="form-control" name="status"
                                                                            id="status">
                                                                            {{-- <option value="Inativo" {{ $product->status == 'Inativo' ? "selected='selected'" : '' }}> Inativo </option> --}}
                                                                            <option value="Ativo"
                                                                                {{ $product->status == 'Ativo' ? "selected='selected'" : '' }}>
                                                                                Sorteio Ativo </option>
                                                                            <option value="Finalizado"
                                                                                {{ $product->status == 'Finalizado' ? "selected='selected'" : '' }}>
                                                                                Sorteio Finalizado </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Mostrar Sorteio na página Inicial?</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <select class="form-control" name="visible"
                                                                            id="visible">
                                                                            <option value="0"> Não - Exibir sorteio
                                                                            </option>
                                                                            <option value="1"
                                                                                {{ $product->visible == 1 ? "selected='selected'" : '' }}>
                                                                                Sim - Exibir Sorteio </option>
                                                                        </select>
                                                                        <div id="emailHelp" class="form-text"> Deseja
                                                                            exibir o
                                                                            sorteio para o publico?</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Favoritar Sorteio</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <select class="form-control" name="favoritar_rifa"
                                                                            id="favoritar_rifa">
                                                                            <option value="0"> Não - Favoritasr
                                                                                Sorteio
                                                                            </option>
                                                                            <option value="1"
                                                                                {{ $product->favoritar == 1 ? "selected='selected'" : '' }}>
                                                                                Sim - Favoritar Sorteio </option>
                                                                        </select>
                                                                        <div id="emailHelp" class="form-text">Esta opção
                                                                            destaca o sorteio como principal na página
                                                                            inicial
                                                                            do site. Apenas um sorteio por vez pode ser
                                                                            destacado.</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Data do Sorteio</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <form action="{{ route('drawDate') }}"
                                                                            method="POST">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $product->id }}">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-group">
                                                                                        <input type="datetime-local"
                                                                                            class="form-control"
                                                                                            name="data_sorteio"
                                                                                            id="data_sorteio"
                                                                                            value="{{ $product->draw_date ? date('Y-m-d H:i:s', strtotime($product->draw_date)) : '' }}">
                                                                                    </div>
                                                                                    <div id="emailHelp" class="form-text">
                                                                                        Defina a data e hora que o sorteio
                                                                                        dos
                                                                                        ganhadores vai acontecer.</div>
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
                                                                        <input type="text" class="form-control"
                                                                            name="cadastrar_ganhador"
                                                                            id="cadastrar_ganhador"
                                                                            value="{{ $product->winner }}">
                                                                        <div id="emailHelp" class="form-text"> Digite
                                                                            somente
                                                                            o nome do ganhador do prêmio principal.</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>URL amigável</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <input type="text" name="slug"
                                                                            value="{{ $product->slug }}"
                                                                            class="form-control">
                                                                        <div id="emailHelp" class="form-text">O uso de
                                                                            caracteres especiais, como <b>!@#$%¨&*()</b>,
                                                                            não é
                                                                            permitido no link.</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Tipo de Reserva?</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <select class="form-control" name="tipo_reserva"
                                                                            id="tipo_reserva">
                                                                            <option value="manual"
                                                                                {{ $product->type_raffles == 'manual' ? "selected='selected'" : '' }}>
                                                                                Modalidade 1 á 9.999 - Seleção Manual
                                                                            </option>
                                                                            <option value="automatico"
                                                                                {{ $product->type_raffles == 'automatico' ? "selected='selected'" : '' }}>
                                                                                Modalidade 1 á 4.000.000 - Seleção
                                                                                Automática
                                                                            </option>
                                                                            <option value="manual"
                                                                                {{ $product->type_raffles == 'manual' ? "selected='selected'" : '' }}>
                                                                                Modalidade Fazendinha </option>
                                                                            {{-- <option value="mesclado" {{ $product->type_raffles == 'mesclado' ? "selected='selected'" : '' }}> 	Automático & Manual </option> --}}
                                                                        </select>
                                                                        <div id="emailHelp" class="form-text">Esta opção
                                                                            destaca o sorteio como principal na página
                                                                            inicial
                                                                            do site. Apenas um sorteio por vez pode ser
                                                                            destacado.</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="card card-outline">
                                                                    <div class="card-header">
                                                                        <b>Estilo de jogo do Sorteio</b>
                                                                    </div>
                                                                    <div class="card-body ">
                                                                        <select class="form-control" name="rifa_numero"
                                                                            id="rifa_numero" disabled>
                                                                            <option value="numeros"
                                                                                {{ $product->modo_de_jogo == 'numeros' ? "selected='selected'" : '' }}>
                                                                                SORTEIO POR COTAS NÚMERICAS</option>
                                                                            <option value="fazendinha-completa"
                                                                                {{ $product->modo_de_jogo == 'fazendinha-completa' ? "selected='selected'" : '' }}>
                                                                                FAZENDINHA - GRUPO COMPLETO</option>
                                                                            <option value="fazendinha-meio"
                                                                                {{ $product->modo_de_jogo == 'fazendinha-meio' ? "selected='selected'" : '' }}>
                                                                                FAZENDINHA - MEIO GRUPO</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="promocao{{ $product->id }}"
                                                        role="tabpanel" aria-labelledby="promocao-tab">
                                                        <div id="emailHelp" class="form-text">Nesta guia, você
                                                            configura a quantidade de números e seus respectivos
                                                            descontos. Basta adicionar a quantidade de números e
                                                            a porcentagem de desconto correspondente. Insira
                                                            quantidades de 1 a 10.000 cotas. Se não desejar
                                                            incluir promoções, deixe todas as opções com o
                                                            número 0.</div>
                                                        @foreach ($product->promocoes() as $promo)
                                                            <div class="row text-center mt-2 promo">
                                                                <h5>Promoção {{ $promo->ordem }}</h5>
                                                                <div class="col-md-6">
                                                                    <label>Qtd de números</label>
                                                                    <input type="number" min="0"
                                                                        name="numPromocao[{{ $promo->ordem }}]"
                                                                        max="10000" class="form-control text-center"
                                                                        value="{{ $promo->qtdNumeros }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputEmail1">% de
                                                                        Desconto</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">%</span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control text-center"
                                                                            name="valPromocao[{{ $promo->ordem }}]"
                                                                            value="{{ $promo->desconto }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="tab-pane fade" id="fotos{{ $product->id }}"
                                                        role="tabpanel" aria-labelledby="promocao-tab">
                                                        <div class="col-md-12">
                                                            <center>
                                                                <br>
                                                                <button type="button" class="btn btn-sm btn-info"
                                                                    data-id="{{ $product->id }}"
                                                                    onclick="addFoto(this)">Adicionar +
                                                                    Foto(s)</button>
                                                            </center>
                                                            <div id="emailHelp" class="form-text">Apenas 3
                                                                fotos são permitidas por sorteio. Escolha as 3
                                                                fotos na resolução de (512 x 512) JPG ou PNG.
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex justify-content-center mt-4">
                                                            @if ($product->fotos()->count() > 0)
                                                                @foreach ($product->fotos() as $key => $foto)
                                                                    <div class="col-md-4 text-center"
                                                                        id="foto-{{ $foto->id }}">
                                                                        <img src="/products/{{ $foto->name }}"
                                                                            width="200" style="border-radius: 10px;">
                                                                        @if ($key >= 0)
                                                                            <a data-qtd="{{ $product->fotos()->count() }}"
                                                                                href="javascript:void(0)"
                                                                                class="delete btn btn-danger"
                                                                                onclick="excluirFoto(this)"
                                                                                data-id="{{ $foto->id }}">
                                                                                <i class="bi bi-trash3"></i>Excluir
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function changePopular(el) {
                                                            var rifaID = el.dataset.rifa;
                                                            document.getElementById(`popularCheck-${rifaID}`).value = el.dataset.id;
                                                        }
                                                    </script>

                                                    <div class="tab-pane fade" id="compraAuto{{ $product->id }}"
                                                        role="tabpanel" aria-labelledby="compraAuto-tab">
                                                        <div class="row mt-4">
                                                            <input type="hidden" name="popularCheck"
                                                                id="popularCheck-{{ $product->id }}"
                                                                value="{{ $product->getCompraMaisPopular() }}">
                                                            @foreach ($product->comprasAuto() as $compra)
                                                                <div class="col-md-6 mt-2">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"
                                                                            style="height: 37px;">
                                                                            <span class="input-group-text">
                                                                                <input type="radio" class="mr-2"
                                                                                    data-id="{{ $compra->id }}"
                                                                                    data-rifa="{{ $product->id }}"
                                                                                    id="popular-{{ $compra->id }}"
                                                                                    onchange="changePopular(this)"
                                                                                    name="popular"
                                                                                    {{ $compra->popular ? 'checked' : '' }}>
                                                                                <label for="popular-{{ $compra->id }}"
                                                                                    style="cursor: pointer">+
                                                                                    POPULAR</label>
                                                                            </span>
                                                                        </div>
                                                                        <input type="number" class="form-control"
                                                                            name="compra[{{ $compra->id }}]"
                                                                            value="{{ $compra->qtd }}">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="cotasTab{{ $product->id }}"
                                                        role="tabpanel" aria-labelledby="cotas-tab">
                                                        <div class="row mt-2 mb-2">
                                                            <div class="col-md-3 mt-2">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" disabled
                                                                        type="radio" name="tipo_cotas"
                                                                        id="tipo_cotas_0" value="0" required
                                                                        <?php echo $product->tipo_cotas == 0 ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label" for="inlineRadio1">SEM
                                                                        COTAS</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mt-2">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" disabled
                                                                        type="radio" name="tipo_cotas"
                                                                        id="tipo_cotas_40" value="40"
                                                                        <?php echo $product->tipo_cotas == 40 ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label" for="inlineRadio1">COM
                                                                        40%</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mt-2">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" disabled
                                                                        type="radio" name="tipo_cotas"
                                                                        id="tipo_cotas_60" value="60"
                                                                        <?php echo $product->tipo_cotas == 60 ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label" for="inlineRadio1">COM
                                                                        60%</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mt-2">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" disabled
                                                                        type="radio" name="tipo_cotas"
                                                                        id="tipo_cotas_80" value="80"
                                                                        <?php echo $product->tipo_cotas == 80 ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label" for="inlineRadio1">COM
                                                                        80%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @php

                                                            $cotasArray = explode(',', $product->cotas_premiadas);
                                                            $cotasCount = count($cotasArray);
                                                        @endphp
                                                        <div class="row mt-2 mb-2">
                                                            @for ($i = 0; $i < $cotasCount; $i++)
                                                                @if (isset($cotasArray[$i]))
                                                                    <div class="col-md-6 mt-2">
                                                                        <label>{{ $i + 1 }}º
                                                                            Cota</label>
                                                                        <input type="text"
                                                                            id="{{ $i + 1 }}_cota"
                                                                            name="{{ $i + 1 }}_n_cota"
                                                                            class="form-control"
                                                                            value="{{ $i < $cotasCount ? $cotasArray[$i] : '' }}"
                                                                            disabled>
                                                                    </div>
                                                                @endif
                                                            @endfor
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

                <div id="deleteEmployeeModal{{ $product->id }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('destroy') }}" method="POST" enctype="multipart/form-data">
                                @method('DELETE')
                                {{ csrf_field() }}
                                <div class="modal-header">
                                    <h4 class="modal-title">Deletar Rifa</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza de que deseja excluir esse registros?</p>
                                    <p class="text-warning"><small>Essa ação não pode ser desfeita..</small></p>
                                    <input name="deleteId" type="hidden" id="deleteId" value="{{ $product->id }}">
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                    <input type="submit" class="btn btn-danger" value="Deletar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="rankingCompradoresEmployeeModal{{ $product->id }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <span id="content-modal-ranking"><!-- thegreg -->
                                    <style>
                                        body {
                                            background-color: #fff !important;
                                        }

                                        ul.nav.nav-tabs {
                                            /*background-color: #333;
                                                                                                            border-radius: 20px;*/
                                        }

                                        a.nav-link.active.show {
                                            background-color: #9c2526;
                                        }

                                        .nav-tabs .nav-item.show .nav-link,
                                        .nav-tabs .nav-link.active {
                                            color: #495057;
                                            background-color: #222222 !important;
                                            border-radius: 10px;
                                            border-color: #dee2e6 #dee2e6 #fff;
                                        }

                                        .nav-tabs {
                                            border-bottom: none !important;
                                        }

                                        .nav-tabs .nav-link {
                                            margin-bottom: -1px;
                                            border-radius: 10px !important;
                                            border: 1px solid transparent;
                                            border-top-left-radius: 0px;
                                            border-top-right-radius: 0px;
                                        }

                                        .nav-tabs .nav-item.show .nav-link,
                                        .nav-tabs .nav-link.active {
                                            color: #495057;
                                            background-color: #132439 !important;
                                            border-radius: 10px;
                                            border-color: #dee2e6 #dee2e6 #fff;
                                        }

                                        /* width */
                                        #teste::-webkit-scrollbar {
                                            width: 10px;
                                        }

                                        /* Track */
                                        #teste::-webkit-scrollbar-track {
                                            box-shadow: inset 0 0 5px grey;
                                            border-radius: 10px;
                                        }

                                        /* Handle */
                                        #teste::-webkit-scrollbar-thumb {
                                            background: #28a745 !important;
                                            border-radius: 10px;
                                        }

                                        /* Handle on hover */
                                        #teste::-webkit-scrollbar-thumb:hover {
                                            background: #28a745 !important;
                                        }

                                        .list-group-item {
                                            background-color: #000 !important;
                                            border: 1px solid #333 !important;
                                            color: #fff;
                                        }

                                        .btn-auto {
                                            background-color: #E5E5E5 !important;
                                            border-radius: 10px !important;
                                            border-color: #E5E5E5 !important;
                                            font-size: 22px;
                                            min-height: 100px;
                                            justify-content: center !important;
                                            align-items: center !important;
                                            text-align: center;
                                        }

                                        .btn-popular {
                                            background-color: #fff !important;
                                            border-color: green !important;
                                        }

                                        .popular {
                                            background-color: green;
                                        }

                                        .text-popular {
                                            margin-top: -21px;
                                            right: 10px;
                                            position: absolute;
                                            margin-top: -55px;
                                            font-size: 12px !important;
                                            margin-right: 80px;
                                        }

                                        .item-ranking {
                                            width: 45% !important;
                                            color: #000;
                                            background-color: #fff;
                                            border-radius: 0px;
                                            padding: 10px;
                                            border: 1px solid;
                                            margin-top: 10px !important;
                                            margin-left: 5px;
                                        }

                                        @media (max-width: 768px) {
                                            .text-popular {
                                                margin-right: 35px;
                                            }
                                        }
                                    </style>
                                    <div class="card"
                                        style="border: none;border-radius: 10px;background-color: transparent;">
                                        <div class="card-body"
                                            style="background-color: #f1f1f1;border: none;border-radius: 10px;">
                                            <div class="" style="">

                                            </div>
                                            <div class="row text-center">
                                                <h1 class="display-6">Ranking do Sorteio <br>{{ $product->name }}
                                                </h1>
                                            </div>

                                            @php
                                                $rankings = $product->listaParticipantesComCotasPremiadas();
                                            @endphp
                                            <div class="row"
                                                style="display: flex;justify-content:center;position:relative">
                                                @if (count($rankings) > 0)
                                                    @foreach ($rankings as $index => $ranking)
                                                        <div class="btn-auto item-ranking">
                                                            {{ $index + 1 }}º 🥇<br>
                                                            <span
                                                                style="font-size: 20px;font-weight: bold;">{{ $ranking->name }}</span>
                                                            <br>
                                                            <span style="font-size: 12px;">Qtd. de Bilhetes
                                                                {{ $ranking->pagos }}</span>
                                                            <br>
                                                            <span style="font-size: 12px;"><strong>Total Gasto: R$
                                                                    {{ $ranking->valor }}</strong></span>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span>Sem Compradores</span>
                                                @endif

                                                {{-- <div class="btn-auto item-ranking" onclick="addQtd('5')">
                                                2º 🥈<br>
                                                <span style="font-size: 20px;font-weight: bold;">Teste do Sistema</span>
                                                <br>
                                                <span style="font-size: 12px;">Qtd. de Bilhetes 5000</span>
                                                <br>
                                                <span style="font-size: 12px;"><strong>Total Gasto: R$
                                                        2.125,00</strong></span>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="cotasVencedorasEmployeeModal{{ $product->id }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <span id="content-modal-ranking"><!-- thegreg -->
                                    <style>
                                        body {
                                            background-color: #fff !important;
                                        }

                                        ul.nav.nav-tabs {
                                            /*background-color: #333;
                                                                                                            border-radius: 20px;*/
                                        }

                                        a.nav-link.active.show {
                                            background-color: #9c2526;
                                        }

                                        .nav-tabs .nav-item.show .nav-link,
                                        .nav-tabs .nav-link.active {
                                            color: #495057;
                                            background-color: #222222 !important;
                                            border-radius: 10px;
                                            border-color: #dee2e6 #dee2e6 #fff;
                                        }

                                        .nav-tabs {
                                            border-bottom: none !important;
                                        }

                                        .nav-tabs .nav-link {
                                            margin-bottom: -1px;
                                            border-radius: 10px !important;
                                            border: 1px solid transparent;
                                            border-top-left-radius: 0px;
                                            border-top-right-radius: 0px;
                                        }

                                        .nav-tabs .nav-item.show .nav-link,
                                        .nav-tabs .nav-link.active {
                                            color: #495057;
                                            background-color: #132439 !important;
                                            border-radius: 10px;
                                            border-color: #dee2e6 #dee2e6 #fff;
                                        }

                                        /* width */
                                        #teste::-webkit-scrollbar {
                                            width: 10px;
                                        }

                                        /* Track */
                                        #teste::-webkit-scrollbar-track {
                                            box-shadow: inset 0 0 5px grey;
                                            border-radius: 10px;
                                        }

                                        /* Handle */
                                        #teste::-webkit-scrollbar-thumb {
                                            background: #28a745 !important;
                                            border-radius: 10px;
                                        }

                                        /* Handle on hover */
                                        #teste::-webkit-scrollbar-thumb:hover {
                                            background: #28a745 !important;
                                        }

                                        .list-group-item {
                                            background-color: #000 !important;
                                            border: 1px solid #333 !important;
                                            color: #fff;
                                        }

                                        .btn-auto {
                                            background-color: #E5E5E5 !important;
                                            border-radius: 10px !important;
                                            border-color: #E5E5E5 !important;
                                            font-size: 22px;
                                            min-height: 100px;
                                            justify-content: center !important;
                                            align-items: center !important;
                                            text-align: center;
                                        }

                                        .btn-popular {
                                            background-color: #fff !important;
                                            border-color: green !important;
                                        }

                                        .popular {
                                            background-color: green;
                                        }

                                        .text-popular {
                                            margin-top: -21px;
                                            right: 10px;
                                            position: absolute;
                                            margin-top: -55px;
                                            font-size: 12px !important;
                                            margin-right: 80px;
                                        }

                                        .item-ranking {
                                            width: 45% !important;
                                            color: #000;
                                            background-color: #fff;
                                            border-radius: 0px;
                                            padding: 10px;
                                            border: 1px solid;
                                            margin-top: 10px !important;
                                            margin-left: 5px;
                                        }

                                        @media (max-width: 768px) {
                                            .text-popular {
                                                margin-right: 35px;
                                            }
                                        }
                                    </style>
                                    <div class="card"
                                        style="border: none;border-radius: 10px;background-color: transparent;">
                                        <div class="card-body"
                                            style="background-color: #f1f1f1;border: none;border-radius: 10px;">
                                            <div class="" style="">

                                            </div>
                                            <div class="row text-center">
                                                <h1 class="display-6">Cotas Premiadas <br>{{ $product->name }}
                                                </h1>
                                            </div>

                                            @php
                                                $cotas_premiadas = explode(',', $product->cotas_premiadas);

                                            @endphp
                                            <div class="row">
                                                @foreach ($cotas_premiadas as $key => $cotas)
                                                    @if (intval($cotas) > 0)
                                                        <div class="col-3 p-1 mt-1">
                                                            <div
                                                                class="{{ $product->cotaPremiadaTemGanhador($cotas) ? 'bg-danger' : 'bg-success' }} rounded text-center">
                                                                {{ $cotas }}</div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <!-- Gerenciar Sorteio -->

        <div class="w-100 d-flex flex-row align-items-center justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($rifas->onFirstPage())
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    @endif
                    @foreach ($rifas->getUrlRange(1, $rifas->lastPage()) as $page => $url)
                        <li class="page-item {{ $rifas->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    @if ($rifas->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $rifas->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>
        </div>

        <!-- Modal Editar Rifa -->
        @foreach ($rifas as $key => $product)
        @endforeach
        <!-- Modal Editar Rifa -->


        <!-- Modal Deletar Sorteio -->
        @foreach ($rifas as $key => $product)
        @endforeach
        <!-- Modal Deletar Sorteio -->


        <!-- Modal Definir Ganhador -->
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
        <!-- Modal Definir Ganhador -->


        <!-- Mostrar Ranking -->
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
        <!-- Mostrar Ranking -->

        <!-- Ver Ganhadores -->
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
        <!-- Ver Ganhadores -->

        <!-- Scripts -->
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
                    url: "{{ route('ranking.admin') }}",
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
                var url = '{{ route('excluirFoto') }}'

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
                    url: "{{ route('definirGanhador') }}",
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
                    url: "{{ route('verGanhadores') }}",
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
        @if (session()->has('sorteio'))
            <script>
                $(function(e) {
                    verGanhadores('{{ session('sorteio') }}')
                })
            </script>
        @endif
        <!-- Footer -->
        <div class="content mt-2">
            <footer class="bg-dark text-center text-white rounded-3">
                <div class="text-center p-1">
                    © 2019 - <?php $anoAtual = date('Y');
                    echo "$anoAtual"; ?> | Desenvolvido com: <i class="fab fa-php"></i> <i
                        class="fab fa-laravel"></i>
                </div>
            </footer>
        </div>
        <br>
        <!-- Footer -->
    </div>
@endsection

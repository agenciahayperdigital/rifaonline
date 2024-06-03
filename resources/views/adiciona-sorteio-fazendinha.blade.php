<!-- thegreg -->
@extends('layouts.admin')
@section('content')
    <section class="content">
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success text-center" role="alert">
                    <h4 class="alert-heading"><b>Adicionar Fazendinha</b></h4>
                    <p>Para incluir um sorteio, é necessário preencher todos os campos abaixo. Importante destacar que antes
                        de cadastrar qualquer sorteio, é imperativo configurar as credenciais de pagamento do Mercado Pago
                        no seu sistema. Basta acessar: <b>(Menu > Gateway de Pagamentos)</b> e realizar a configuração.</p>
                    <hr>
                    <p class="mb-0">Caso deseje cancelar a criação do sorteio <a href="meus-sorteios"
                            class="badge badge-danger">CANCELAR CRIAÇÃO</a></p>
                </div>
            </div>
        </div>


    </section>

    <section class="content">
        <br>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Titulo do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Ex: Primeira Fazendinha da Sorte!" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Sub Titulo do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subname" name="subname"
                                            placeholder="Participe agora mesmo e concorra!" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Selecionar o Modo do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <select name="modo_de_jogo" class="form-control" required>
                                            <option value="fazendinha-completa">Fazendinha - Grupo Completo (Reserva Manual)
                                            </option>
                                            <option value="fazendinha-meio">Fazendinha - Meio Grupo (Reserva Manual)
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Selecionar o Modo de Pagamento</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <select name="gateway" class="form-control" required>
                                            <option value="mp">Banco Digital - Mercado Pago</option>
                                            {{-- <option value="paggue">Banco Paggue</option> --}}
                                            {{-- <option value="asaas">Banco ASAAS</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Valor Por Cota Reservada</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>R$:</b></span>
                                            </div>
                                            <input type="text" class="form-control" name="price" placeholder="Ex: 0,35"
                                                maxlength="5" id="price" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <hr>

                        <div class="col-sm-12">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Selecione até 3 Imagens</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="images[]" accept="image/*"
                                            multiple required />
                                        <div id="emailHelp" class="form-text">
                                            Padrão do tamanho daimagem é <b>(512 x 512) JPG ou PNG</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Quant. Minima de Reserva</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="minimo" min="1"
                                            max="50" value="1" required />
                                        <div id="emailHelp" class="form-text">Selecione a quantidade
                                            minima de reserva para participação do sorteio.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Quant. Máxima de Reserva</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="maximo" min="1"
                                            max="50" value="10" required />
                                        <div id="emailHelp" class="form-text">A quantidade
                                            máxima de reserva de cotas por bilhete do sorteio é <b>[ 50 ]</b>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Quant. de Cotas no Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="1" name="numbers" min="1"
                                            max="1" placeholder="Ex: 1" required />
                                        <div id="emailHelp" class="form-text">O valor 1 para fazendinha ja vem como padrão não precisa alterar!</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Tempo Para Pagamento de Reserva</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="expiracao" min="5"
                                            max="21" placeholder="Exemplo: 15" value="15" required>
                                        <div id="emailHelp" class="form-text">Minimo 5 minutos, Máximo 20
                                            mim. Caso cliente não pague o bilhete o mesmo é cancelado e as
                                            cotas ficam disponivéis novamente para reserva!<br> Caso o
                                            sorteio seja gratuito a confirmação de pagamento e liberação das
                                            cotas é feita automatica.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <b>Descrição do Sorteio</b>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <textarea class="form-control" id="summernote" name="description" rows="10" style="min-height: 200px;"
                                            required></textarea>
                                        <div id="emailHelp" class="form-text">Digite acima a descrição do sorteio,
                                            caso tenha cotas prêmiados digitar as cotas na descrição! </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <center>
                                        <h4>PRÊMIOS PRINCIPAIS</h4>
                                        <p>Coloque o que cada ganhador vai levar, preencha somente os prêmios que
                                            estarão disponiveis para o sorteio!</p>
                                    </center>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <div class="row mb-4">
                                            <div class="col-md-3 mt-2">
                                                <label>1º Prêmio Principal</label>
                                                <input type="text" class="form-control" name="premio1" required>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>2º Prêmio</label>
                                                <input type="text" class="form-control" name="premio2">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>3º Prêmio</label>
                                                <input type="text" class="form-control" name="premio3">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>4º Prêmio</label>
                                                <input type="text" class="form-control" name="premio4">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>5º Prêmio</label>
                                                <input type="text" class="form-control" name="premio5">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>6º Prêmio</label>
                                                <input type="text" class="form-control" name="premio6">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>7º Prêmio</label>
                                                <input type="text" class="form-control" name="premio7">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>8º Prêmio</label>
                                                <input type="text" class="form-control" name="premio8">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>9º Prêmio</label>
                                                <input type="text" class="form-control" name="premio9">
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <label>10º Prêmio</label>
                                                <input type="text" class="form-control" name="premio10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="criar btn btn-success">CRIAR
                                SORTEIO</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
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
@endsection

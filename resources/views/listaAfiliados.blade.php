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
    <br>

    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">
                    			    <div class="form-check">
                                    	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                    			</th> --}}
                                    <th scope="col">#ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($afiliados as $afiliado)
                                    <tr>
                                        {{-- <th scope="row">
                    			    <div class="form-check">
                                    	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                    			</th> --}}
                                        <th scope="row">{{ $afiliado->id }}</th>
                                        <td>{{ $afiliado->name }}</td>
                                        <td>{{ $afiliado->email }}</td>
                                        <td>{{ $afiliado->telephone }}</td>
                                        <td>
                                            <a href="#">
                                                <span
                                                    class="badge {{ $afiliado->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $afiliado->status === 1 ? 'Ativo' : 'Inativo' }}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <div>

                                                <a href="{{ route('painel.excluirAfiliado', ['id' => $afiliado->id]) }}"
                                                    type="button" class="btn btn-sm btn-danger">Excluir</a>
                                                <a href="{{ route('detalhesAfiliados', ['id' => $afiliado->id]) }}"
                                                    class="btn btn-sm btn-primary" {{-- data-bs-toggle="modal" 
                                    data-bs-target="#copiarlink"  --}}
                                                    {{-- aria-expanded="false" --}}>Visualizar <i class="fas fa-eye"></i></a>
                                            </div>
                                        </td>
                                        {{-- <td>
                    			    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Ações</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#verafiliado" href="javascript:void(0)"><i class="far fa-eye"></i> Ver Afiliado</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#excluirafiliado" href="javascript:void(0)"><i class="far fa-trash-alt"></i> Excluir Afiliado</a></li>
                                        </ul>
                                    </div>
                    			</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
    </section>


    <!-- Modal Copiar Link -->
    <div class="modal fade" id="copiarlink" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Linkdo Afiliado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Basta copiar o link a baixo e passar para seu afiliado, cada cota vendida pelo seu link gerará uma
                        comissão!</p>
                    <hr>
                    <p><b>https://meusite.com/afiliado</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Copiar Link</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Copiar Link -->

    <!-- Modal Ver Afiliado Link -->
    <div class="modal fade" id="verafiliado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">$nome-do-afiliado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Sorteio: </b>$nome-do-sorteio<br>
                        <b>Tipo de Comissão: </b>Porcentagem<br>
                        <b>Valor da Comissão: </b>10%
                    </p>
                    <hr>
                    <p>
                        <b>Bilhetes Vendidos: </b>154<br>
                        <b>Valor Ganho: </b>R$ 15,40
                    </p>
                    <hr>
                    <p>
                        <b>Nome Completo: </b>$nome-completo<br>
                        <b>CPF Cadastrado: </b>000.000.000-00<br>
                        <b>Email Cadastrado: </b>teste@gmail.com<br>
                        <b>Chave Pix: </b>$chave-pix<br>
                        <b>Data de Cadastro: </b>00/00/0000
                    </p>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Ver Afiliado Link -->

    <!-- Modal Excluir Afiliado -->
    <div class="modal fade" id="excluirafiliado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">$nome-do-afiliado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza de que deseja excluir este afiliado? Após essa ação, todos os dados relacionados ao
                        faturamento do sorteio serão eliminados e não poderão ser recuperados. Antes de prosseguir,
                        certifique-se de revisar e liquidar o saldo pendente do afiliado em questão.</p>
                    <hr>
                    <p><b>Excluir afiliado?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não Excluir</button>
                    <button type="button" class="btn btn-primary">Sim Excluir</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Excluir Afiliado Link -->






































    <!--

                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
    <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
                                                    </ul>
                                                </div>
    @endif

                                            @if (session()->has('message'))
    <div class="alert alert-success">
                                                    <ul>
                                                        <li>{{ session('message') }}</li>
                                                    </ul>
                                                </div>
    @endif

                                            
                                            {{-- START TABELA MEUS SORTEIOS --}}
                                            <div class="container mt-3" style="max-width:100%;min-height:100%;">
                                                <div class="table-wrapper ">
                                                    <div class="table-title">
                                                        <table class="table table-striped table-bordered table-responsive-sm table-hover align=center"
                                                            id="table_rifas">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nome</th>
                                                                    <th>Data de Cadastro</th>
                                                                    <th>Total de Ganhos</th>
                                                                    <th>Acões</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($afiliados as $afiliado)
    <tr>
                                                                        <td>{{ $afiliado->name }}</td>
                                                                        <td>{{ date('d/m/Y', strtotime($afiliado->created_at)) }}</td>
                                                                        <td>R$ {{ number_format($afiliado->totalGanhos(), 2, ',', '.') }}</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-sm btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                                Ações
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item" href="{{ route('painel.excluirAfiliado', $afiliado->id) }}"><i class="bi bi-trash3"></i>&nbsp;Excluir</a>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </td>
                                                                    </tr>
    @endforeach
                                                            </tbody>
                                                        </table>
                                                        
                                                        <div class="row">
                                                            <p>Obs.: As ações disponíveis são somente de exclusão de afiliado, o total de ganhos é geral desde o cadastro dele! Caso queira zerar o
                                                            total do afiliado, basta excluir a conta dele, o mesmo basta efetuar um novo cadastro, podendo usar os mesmo dados!</p>
                                                        </div>
                                                        
                                                        
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

                                                    </div>
                                                </div>

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
                                            </div>
                                            <script src="https://code.jquery.com/jquery-3.7.0.min.js"
                                                integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
                                            </script>

                                            @if (session()->has('sorteio'))
    <script>
        $(function(e) {
            verGanhadores('{{ session('sorteio') }}')
        })
    </script>
    @endif

                                        </div>
                                    </div>
                                -->
@endsection

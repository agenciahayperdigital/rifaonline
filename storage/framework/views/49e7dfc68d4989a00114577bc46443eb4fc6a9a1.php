<!-- thegreg -->

<!-- Stored in resources/views/layouts/master.blade.php -->

<html style="height: auto;">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link href="<?php echo e(asset('/dist/css/adminlte.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/plugins/summernote/summernote-bs4.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/plugins/codemirror/codemirror.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/plugins/codemirror/theme/monokai.css')); ?>" rel="stylesheet">
    

    <link href="<?php echo e(asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>"
        rel="stylesheet">
    <link href="<?php echo e(asset('/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title><?php echo @$data['social']->name; ?></title>

</head>

<body>



    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark">

            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button">
                        <span class="badge bg-primary"><i class="fas fa-bars"></i> MENU</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('inicio')); ?>" target="_blank">
                        <span class="badge bg-primary"><i class="fab fa-internet-explorer"></i> VER SITE</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">
                        <span class="badge bg-success"><i class="fas fa-user-check"></i> LOGADO</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <form name="logout" action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <span class="badge badge-danger" onclick="javascript:logout.submit()"><i
                                    class="fas fa-sign-out-alt"></i> SAIR</span>
                        </form>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary">
            <a href="home"class="brand-link text-center" style=" text-decoration: none">
                <span class="brand-text font-weight-light"><i class="fas fa-users-cog"></i> Administração</span>
            </a>



            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="<?php echo e(route('home')); ?>" class="nav-link" id="home">
                                <i class="fab fa-fort-awesome"></i>
                                <p>Pagina Inicial</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('tutoriais')); ?>"
                                class="nav-link <?php echo e(request()->is('tutoriais*') ? 'active' : ''); ?>" id="wpp-msgs">
                                <i class="fab fa-youtube"></i>
                                <p>Guia do Sistema</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('profile')); ?>" class="nav-link" id="perfil">
                                <i class="fas fa-cogs"></i>
                                <p>Configurações Gerais</p>
                            </a>
                        </li>

                        

                        <li class="nav-item">
                            <a href="<?php echo e(route('gateway_pagamento')); ?>"
                                class="nav-link <?php echo e(request()->is('gateway_pagamento*') ? 'active' : ''); ?>"
                                id="perfil">
                                <i class="fas fa-hand-holding-usd"></i>
                                <p>Gateway de Pagamento</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('pixel_google_ads')); ?>"
                                class="nav-link <?php echo e(request()->is('pixel_google_ads*') ? 'active' : ''); ?>"
                                id="perfil">
                                <i class="fas fa-code"></i>
                                <p>Pixel & Google ADS</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="adiciona-novo-sorteio" class="nav-link">
                                <i class="fas fa-ticket-alt"></i>
                                <p>Adicionar Rifa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('addNovaFazendinha')); ?>" class="nav-link">
                                <i class="fab fa-sticker-mule"></i>
                                <p>Adicionar Fazendinha</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('mySweepstakes')); ?>" class="nav-link" id="meus-sorteios">
                                <i class="fas fa-dice"></i>
                                <p>Gerenciar Sorteios</p>
                            </a>
                        </li>

                        <?php if(!env('HIDE_GANHADORES')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('painel.ganhadores')); ?>"
                                    class="nav-link <?php echo e(request()->is('admin-ganhadores*') ? 'active' : ''); ?>"
                                    id="meus-sorteios">
                                    <i class="fas fa-trophy"></i>
                                    <p>Ganhadores</p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a href="<?php echo e(route('listClientes')); ?>"
                                class="nav-link <?php echo e(request()->is('clientes*') ? 'active' : ''); ?>" id="clientes">
                                <i class="fas fa-user-edit"></i>
                                <p>Usuarios Cadastrados</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('cadNovoAfililiado')); ?>"
                                class="nav-link" >
                                <i class="fas fa-user-edit"></i>
                                <p>Cadastrar Afiliados</p>
                            </a>
                        </li>

                        <?php if(env('AFILIADOS')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('afiliados')); ?>"
                                    class="nav-link <?php echo e(request()->is('lista-afiliados*') ? 'active' : ''); ?>"
                                    id="wpp-msgs">
                                    <i class="fas fa-comments-dollar"></i>
                                    <p>Gerenciar Afiliados</p>
                                </a>
                            </li>
                            <!--<li class="nav-item">
                                <a href="<?php echo e(route('painel.solicitacaoAfiliados')); ?>"
                                    class="nav-link <?php echo e(request()->is('solicitacao-pagamento*') ? 'active' : ''); ?>"
                                    id="wpp-msgs">
                                    <i class="fas fa-cash-register"></i>
                                    <p>Solicitação de Pgto.</p>
                                </a>
                            </li> -->
                        <?php endif; ?>

                    </ul>
                </nav>
            </div>


        </aside>

        <div class="content-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /.content -->

        <div id="sidebar-overlay"></div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="background: #010140 !important">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <script src="<?php echo e(asset('/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/dist/js/adminlte.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/codemirror/codemirror.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/codemirror/mode/css/css.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/codemirror/mode/xml/xml.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/codemirror/mode/htmlmixed/htmlmixed.js')); ?>"></script>
    
    

    <script src="<?php echo e(asset('/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
        $(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        var url_atual = window.location.pathname;

        if (url_atual == '/home') {
            var d = document.getElementById("home");
            d.className += " active";
        } else if (url_atual == '/adicionar-sorteio') {
            var d = document.getElementById("adicionar-sorteio");
            d.className += " active";
        } else if (url_atual == '/meus-sorteios') {
            var d = document.getElementById("meus-sorteios");
            d.className += " active";
        } else if (url_atual == '/perfil') {
            var d = document.getElementById("perfil");
            d.className += " active";
        }

        //console.log(url_atual);
    </script>

    <!--<script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>-->

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <?php echo $__env->yieldPushContent('datetimepicker'); ?>

    <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function(e) {
            document.querySelectorAll('.summernote').forEach((el) => {
                $('#' + el.id).summernote({
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear', 'fontname']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['misc', ['fullscreen']],
                        ['link']
                    ]
                })
            });


            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear', 'fontname']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['misc', ['fullscreen']],
                    ['link']
                ]
            })
        })

        function loading() {
            var el = document.getElementById('loadingSystem');
            el.classList.toggle("d-none");
        }
    </script>
    <script>
        $('#editarcliente').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var code = button.closest('tr').data('code');
            var nome = button.closest('tr').data('nome');
            var telefone = button.closest('tr').data('telefone');
            var modal = $(this);
            modal.find('.modal-body #editInputEmail').val(nome)
            modal.find('.modal-body #editInputPassword').val(telefone);
            modal.find('.modal-body #editInputCode').val(code);
        });
        $('#excluircliente').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget);
            var code = button.closest('tr').data('code');
            var nome = button.closest('tr').data('nome');
            var telefone = button.closest('tr').data('telefone');
            var modal = $(this);
            console.log(code, nome, telefone)
            modal.find('.modal-body #excluirInputCode').val(code);
            modal.find('.modal-body #excluirInputEmail').val(nome)
            modal.find('.modal-body #excluirInputPassword').val(telefone);

        });
    </script>



</body>

</html>
<?php /**PATH /home2/script42/teste.sistemadirifa.com/resources/views/layouts/admin.blade.php ENDPATH**/ ?>
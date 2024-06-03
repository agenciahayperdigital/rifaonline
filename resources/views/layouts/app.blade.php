<!-- thegreg -->

<!-- Stored in resources/views/layouts/master.blade.php -->
<html lang="pt-br">

<head>
    <!-- Titulo -->
    <title><?php echo @$data['social']->name; ?> @yield('title')</title>
    <!-- Titulo -->

    <!-- CODIGO PARA APARECER AQUI facebook PAGEVIWER -->

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="color-scheme" content="light only">
    <meta name="X-DarkMode-Default" value="false" />
    <meta name="facebook-domain-verification" content="<?php echo @$data['social']->verify_domain_fb; ?>" />
    <meta name="facebook-domain-verification" content="<?php echo @$data['ads']->cod_verif_dom_facebook; ?>" />
    <?php echo @$data['social']->pixel; ?>

    @if (!is_null(@$data['ads']->PiexelPageViwer) && @$data['ads']->PiexelPageViwer !== '')
        <?php echo @$data['ads']->PiexelPageViwer; ?>
    @endif
    <!-- Meta Tags PiexelPageViwer -->

    <!-- Meta Links -->
    @yield('ogContent')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/rifapress.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/menu2.css') }}">
    <!-- Meta Links -->

    <!-- Meta Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
        integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("<?php echo @$data['social']->key_pix_public; ?>");
    </script>
    <!-- Meta Script -->
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>

<body>
    @section('sidebar')
    @show
    <?php
    $subDomain = explode('.', request()->getHost());
    ?>

    <div id="loadingSystem" class="d-none"></div>
    
    
    
    
    <nav class="navbar navbar-expand-lg" style="background: #000000">
        <div class="container header-menu" style="justify-content:space-evenly;align-items: center;">
            <div class="col-md-6 col-12  d-flex justify-content-between align-items-center">
                <div>
                    <a class="" href="{{ route('inicio') }}"
                        style="color: #ffffff!important;font-family: 'Roboto Condensed', sans-serif;">
                        @if (@$data['social']->logo)
                            <img src="{{ asset('products/' . @$data['social']->logo) }}" alt="www.sistemadirifa.com"
                                width="160" height="60">
                        @else
                            www.sistemadirifa.com
                        @endif
                    </a>
                </div>

                <div>
                    @if (@$data['social']->instagram != null)
                        <a href="{{ @$data['social']->instagram }}"
                            style="text-decoration: none; font-size: 20px; color: #fff" target="_blank">
                            <span class="badge  p-2" style="font-size: 10px;">
                                <i class="bi bi-instagram"
                                    style="margin-top: 5px;font-size: 25px;color: rgb(180, 180, 180) !important; opacity: 1;"></i>
                            </span>
                        </a>
                    @endif
                    
                    @if (@$data['social']->group_whats != null)
                        <a href="{{ @$data['social']->group_whats }}"
                            style="text-decoration: none; font-size: 20px; color: #fff" target="_blank">
                            <span class="badge  p-2" style="font-size: 10px;">
                                <i class="bi bi-whatsapp"
                                    style="margin-top: 5px;font-size: 25px;color: rgb(180, 180, 180) !important; opacity: 1;"></i>
                            </span>
                        </a>
                    @endif
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#mobileMenu"
                        style="text-decoration: none; font-size: 20px; color: #fff" target="_blank">
                        <span class="badge  p-2" style="font-size: 10px;">
                            <i class="bi bi-filter-right"
                                style="margin-top: 5px;font-size: 25px;color: rgb(180, 180, 180) !important; opacity: 1;"></i>
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </nav>
    
    <menu id="mobileMenu" class="modal fade modal-fluid" tabindex="-1" aria-labelledby="mobileMenuLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-cor-primaria">
                <header class="app-header app-header-mobile--show" style="background: #000 !important">
                    <div class="container container-600 h-100 d-flex align-items-center justify-content-between">
                        <a href="/">
                            @if (@$data['social']->logo)
                                <img src="{{ asset('products/' . @$data['social']->logo) }}" alt="www.sistemadirifa.com"
                                    width="160" height="60">
                            @else
                                www.sistemadirifa.com
                            @endif
                        </a>
                        <div class="app-header-mobile">
                            <button type="button" class="btn btn-link text-white menu-mobile--button pe-0 font-lgg"
                                data-bs-dismiss="modal" aria-label="Fechar"><i
                                    class="far fa-window-close"></i></button>
                        </div>
                    </div>
                </header>

                <div class="modal-body" style="background: #D3D3D3 !important">
                    <div class="container container-600">
                        <!--<nav class="nav-vertical nav-submenu font-xs mb-2">
        <ul>
         <li>
         <a class="" alt="Página Principal" href="/">
         <i class="fa-solid fa-house-flag"></i>
         <span>Pagina Inicial</span>
         </a>
         </li>
         <li>
         <a class="text-white" alt="Página Principal" href="{{ route('novoCadastro') }}">
         <i class="fa-solid fa-list"></i>
         <span>Faça seu Cadastro</span>
         </a>
         </li>
         <li>
         <a class="text-white" alt="Página Principal" href="/sorteios">
         <i class="fas fa-bullhorn"></i>
         <span>Todas as Campanhas</span>
         </a>
         </li>
         <li>
         <a class="text-white" alt="Página Principal" href="/area-afiliado" target="_blank">
         <i class="fas fa-bullhorn"></i>
         <span>Area de Afiliados</span>
         </a>
         </li>
         <li>
         <a class="text-white" alt="Página Principal" href="{{ route('entreEmContato') }}">
         <i class="fa-solid fa-envelope-circle-check"></i>
         <span>Entre em Contato</span>
         </a>
         </li>
         <li>
         <a class="text-white" alt="Página Principal" href="{{ route('todosOsGanhadores') }}">
         <i class="fas fa-gamepad"></i>
         <span>Jogos Gratuitos</span>
         </a>
         </li>
         <li>
         <a class="text-white" alt="Página Principal" href="{{ route('termosDeUsoEParticipacao') }}">
         <i class="fa-solid fa-file-lines"></i>
         <span>Termos de Uso & Participação</span>
         </a>
         </li>
        </ul>
       </nav>-->
                        <div class="text-center pb-1"><a type="button" href="/"
                                class="btn btn-dark w-100 rounded-pill"><i class="icone bi bi-house"></i> Pagina
                                Inicial</a></div>
                        <div class="text-center pb-1"><a type="button" href="{{ route('novoCadastro') }}"
                                class="btn btn-dark w-100 rounded-pill"><i class="icone bi bi-file-earmark-text"></i>
                                Novo Cadastro</a></div>
                        <div class="text-center pb-1"><a type="button" href="/sorteios"
                                class="btn btn-dark w-100 rounded-pill"><i class="icone bi bi-stars"></i> Todas as
                                Campanhas</a></div>
                        <!--<div class="text-center pb-1"><a type="button" href="/area-afiliado" target="_blank"
                                class="btn btn-dark w-100 rounded-pill"><i class="icone bi bi-people-fill"></i> Area
                                de Afiliados</a></div>-->
                        <div class="text-center pb-1"><a type="button" href="{{ route('entreEmContato') }}"
                                class="btn btn-dark w-100 rounded-pill"><i class="icone bi bi-envelope"></i> Entre em
                                Contato</a></div>
                        {{-- <div class="text-center pb-1"><a type="button" href="{{route('todosOsGanhadores')}}" class="btn btn-dark w-100 rounded-pill"><i class="icone bi bi-joystick"></i> Jogos Gratuitos</a></div> --}}
                        <div class="text-center pb-1"><a type="button"
                                href="{{ route('termosDeUsoEParticipacao') }}"
                                class="btn btn-dark w-100 rounded-pill"><i class="icone bi bi-journal-text"></i>
                                Termos de Uso & Participação</a></div>
                        <div class="text-center pb-1">
                            @if (@$data['social']->instagram != null)
                                <a href="{{ @$data['social']->instagram }}"
                                    style="text-decoration: none; font-size: 20px; color: #000" target="_blank">
                                    <span class="badge  p-2" style="font-size: 10px;">
                                        <i class="bi bi-instagram"
                                            style="margin-top: 5px;font-size: 25px;color: #000 !important; opacity: 1;"></i>
                                    </span>
                            @endif
                            </a>
                            @if (@$data['social']->group_whats != null)
                                <a href="{{ @$data['social']->group_whats }}"
                                    style="text-decoration: none; font-size: 20px; color: #000" target="_blank">
                                    <span class="badge  p-2" style="font-size: 10px;">
                                        <i class="bi bi-whatsapp"
                                            style="margin-top: 5px;font-size: 25px;color: #000 !important; opacity: 1;"></i>
                                    </span>
                            @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </menu>

    <!-- Modal  consultar Segundo-->
    <div class="modal" id="consultar-reservas" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Consultar meus bilhetes 🎫</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('minhasReservas') }}" method="POST" style="display: flex;"
                        class="row g-3">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <span class="input-group-text">+55</span>
                            <input type="text" name="telephone" id="telephone"
                                aria-describedby="passwordHelpBlock" maxlength="15"
                                placeholder="Somente os números.." class="form-control" required
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" id="button-addon2" type="submit">Buscar <i
                                    class="bi bi-search"></i></button>
                        </div>
                        <div id="emailHelp" class="form-text">Para verificar seus bilhetes basta inserir seu número de
                            telefone cadastrado e clicar em buscar. <br><i><strong>Exemplo: (00) 00000-0000</strong></i>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar Busca</button>
                </div>
            </div>
        </div>
    </div>
    @yield('content')

    <script>
        document.getElementById('telephone').addEventListener('input', function(e) {
            var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
            e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
        });

        document.getElementById('telephone1').addEventListener('input', function(e) {
            var aux = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
            e.target.value = !aux[2] ? aux[1] : '(' + aux[1] + ') ' + aux[2] + (aux[3] ? '-' + aux[3] : '');
        });

        function loading() {
            var el = document.getElementById('loadingSystem');
            el.classList.toggle("d-none");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script> --}}

</body>

</html>

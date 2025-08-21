<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @stack('styles')
</head>

<body>
    <nav>
        <div class="nav-wrapper container">
            <a href="{{ route('user.index') }}" class="brand-logo center">ConectaRim</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger left">
                <i class="material-icons">menu</i>
            </a>

            <ul id="nav" class="left hide-on-med-and-down">
                <li>
                    <a href="{{ route('user.index') }}" class="valign-wrapper nav-option">
                        <span class="material-icons">home</span>Início
                    </a>
                </li>
                <li>
                    <a href="" class="valign-wrapper nav-option">
                        <span class="material-icons">play_arrow</span>Vídeos
                    </a>
                </li>
            </ul>

            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger valign-wrapper" href="#!" data-target="dropdown-admin">
                        <span class="material-icons">admin_panel_settings</span>Admin
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>

            <!-- Dropdown Structure -->
            @if (Auth::check())
                <ul id="dropdown-admin" class="dropdown-content">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.videos.index') }}">Gerenciar Vídeos</a></li>
                    <li><a href="{{ route('login.logout') }}">Sair</a></li>
                </ul>
            @else
                <ul id="dropdown-admin" class="dropdown-content">
                    <li><a href="{{ route('login.form') }}">Logar</a></li>
                </ul>
            @endif
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li>
            <a href="#" data-target="mobile-demo" class="valign-wrapper sidenav-close nav-option">
                <span class="material-icons">arrow_left</span> Voltar
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}" class="valign-wrapper nav-option">
                <span class="material-icons">home</span>Início
            </a>
        </li>
        <li>
            <a href="" class="valign-wrapper nav-option">
                <span class="material-icons">play_arrow</span>Vídeos
            </a>
        </li>
        <li>
            <ul class="collapsible">
                <li>
                    <div id="dropdown-admin" class="collapsible-header valign-wrapper nav-option">
                        <span class="material-icons">admin_panel_settings</span>Admin
                        <i class="material-icons right">arrow_drop_down</i>
                    </div>                        
                    <div id="dropdown-admin" class="collapsible-body">
                            @if (Auth::check())
                            <a href="{{ route('admin.dashboard') }}"> Dashboard</a>
                            <a href="{{ route('admin.videos.index') }}">Gerenciar vídeo</a>
                            <a href="{{ route('login.logout') }}">Sair</a>
                        @else
                            <a href="{{ route('login.form') }}">Logar</a>
                        @endif
                    </div>
                </li>
            </ul>
        </li>
    </ul>

    <div class="content">
        @yield('conteudo')
    </div>

    <footer>
        <div class="footer">
            <h6 class="white-text">
              <a href="https://codelabifpr.com.br/">  Desenvolvido por CodeLab – IFPR </a>
            </h6>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            M.Sidenav.init(elems);

            var dropdowns = document.querySelectorAll('.dropdown-trigger');
            M.Dropdown.init(dropdowns, {
                alignment: 'right',
                constrainWidth: false,
                coverTrigger: false
            });

            var collapsibles = document.querySelectorAll('.collapsible');
            M.Collapsible.init(collapsibles);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            M.Modal.init(elems);
        });
    </script>
</body>

</html>

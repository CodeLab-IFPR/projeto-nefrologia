@extends('layout')

@section('title', 'Painel Administrativo')

@section('conteudo')


    {{-- Adicionamos um CSS customizado para esta página --}}
    <style>
        .panel-wrapper {
            padding: 40px 0;
            /* Espaçamento no topo e na base */
        }

        .panel-card {
            /* Estrutura do card */
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 180px;
            /* Altura mínima para todos os cards */
            color: #333;
            /* Cor do texto padrão */
        }

        /* Efeito de "levantar" ao passar o mouse */
        .panel-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: rgb(20, 103, 175);

        }

        /* Estilo do Ícone */
        .panel-card i.material-icons {
            font-size: 4rem;
            /* Tamanho grande para o ícone */
            color: #187bcd;
            margin-bottom: 15px;
        }

        /* Estilo do Texto do Card */
        .panel-card span {
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Garante que os cards tenham um espaço entre eles no mobile */
        .panel-card-col {
            margin-bottom: 20px;
        }

        /* --- Estilos para Telas Pequenas (Celulares) --- */
        @media only screen and (max-width: 600px) {

            .panel-wrapper {
                padding: 20px 0;
                /* Menos espaçamento no celular */
            }

            /* Ajusta o card para o modo "lista" no celular */
            .panel-card {
                min-height: auto;
                /* Remove a altura mínima */
                flex-direction: row;
                /* Ícone e texto ficam LADO A LADO */
                justify-content: flex-start;
                /* Alinha os itens à esquerda */
                padding: 20px;
            }

            /* Deixa o ícone menor e o afasta do texto */
            .panel-card i.material-icons {
                font-size: 2.5rem;
                /* Ícone significativamente menor */
                margin-bottom: 0;
                /* Remove a margem de baixo */
                margin-right: 20px;
                /* Cria uma margem à direita */
            }

            .panel-card span {
                font-size: 1rem;
                /* Fonte do texto um pouco menor */
            }

            /* Ajusta o título principal da página no celular */
            .panel-wrapper h3 {
                font-size: 2.2rem;
            }
        }
    </style>

    <div class="container panel-wrapper">

        {{-- Título da Página --}}
        <div class="row">
            <div class="col s12">
                <h3>Painel Administrativo</h3>
                <p class="flow-text" style="margin-top: -10px;">Bem-vindo, {{ auth()->user()->name }}!</p>
            </div>
        </div>

        {{-- Grid com os Cards de Funções --}}
        <div class="row">

            {{-- Card: Gerenciar Vídeos --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('admin.videos.index') }}" class="panel-card">
                    <i class="material-icons">video_library</i>
                    <span>Gerenciar Vídeos</span>
                </a>
            </div>

            {{-- Card: Cadastrar Usuário --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('admin.users.create') }}" class="panel-card">
                    <i class="material-icons">person_add</i>
                    <span>Cadastrar Usuário</span>
                </a>
            </div>


            {{-- Card: Alterar Senha --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('admin.seguranca.edit') }}" class="panel-card">
                    <i class="material-icons">lock</i>
                    <span>Alterar Senha</span>
                </a>
            </div>

            {{-- Card: Sair --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('login.logout') }}" class="panel-card">
                    <i class="material-icons">exit_to_app</i>
                    <span>Sair</span>
                </a>
            </div>

        </div>
    </div>

@endsection

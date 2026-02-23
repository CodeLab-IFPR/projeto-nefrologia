@push('styles')
    <link rel="stylesheet" href="{{ asset('css/guialeitura.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js\home.js') }}"></script>
@endpush
@extends('layout')
@section('title', 'Alimentos e Fósforo')
@section('conteudo')
    <main class="container main">
        <div class="page-header">
            <span class="emoji">🧂</span>
            <h1>Alimentos e Fósforo</h1>
            <p>Para pacientes em hemodiálise</p>
        </div>

        <div class="subtitle-card">
            <div class="subtitle-accent"></div>
            <p>
                Classificação aproximada por
                <strong>100g</strong> de alimento
            </p>
        </div>

        <div class="grid">
            <div class="food-card low">
                <div class="card-header">
                    <div class="header-title">
                        <span class="emoji">🟢</span>
                        <span>Baixo Fósforo</span>
                    </div>
                    <div class="range">até 100 mg</div>
                </div>

                <div class="card-body">
                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Frutas
                        </div>
                        <ul>
                            <li>Maçã</li>
                            <li>Abacaxi</li>
                            <li>Morango</li>
                            <li>Uva</li>
                            <li>Pera</li>
                            <li>Melancia</li>
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Verduras / Legumes
                        </div>
                        <ul>
                            <li>Alface</li>
                            <li>Pepino</li>
                            <li>Abobrinha</li>
                            <li>Chuchu</li>
                            <li>Repolho</li>
                            <li>Berinjela</li>
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Cereias
                        </div>
                        <ul>
                            <li>Arroz branco</li>
                            <li>Macarrão comum</li>
                            <li>Tapioca</li>
                            <li>Cuscuz</li>
                            <li>Pão branco</li>
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Proteínas
                        </div>
                        <ul>
                            <li>Clara de ovo</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="food-card moderate">
                <div class="card-header">
                    <div class="header-title">
                        <span class="emoji">🟡</span>
                        <span>Moderado Fósforo</span>
                    </div>
                    <div class="range">101 a 200 mg</div>
                </div>

                <div class="card-body">
                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Proteínas
                        </div>
                        <ul>
                            <li>Ovo inteiro</li>
                            <li>Frango</li>
                            <li>Peixe</li>
                            <li>Carne magra</li>
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Grãos
                        </div>
                        <ul>
                            <li>Feijão</li>
                            <li>Milho</li>
                            <li>Aveia</li>
                            <li>Pão integral</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="food-card high">
                <div class="card-header">
                    <div class="header-title">
                        <span class="emoji">🔴</span>
                        <span>Alto Fósforo</span>
                    </div>
                    <div class="range">acima de 200 mg</div>
                </div>

                <div class="card-body">
                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Laticínios
                        </div>
                        <ul>
                            <li>Leite</li>
                            <li>Queijo</li>
                            <li>Iogurte</li>
                            <li>Requeijão</li>
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Leguminosas
                        </div>
                        <ul>
                            <li>Lentilha</li>
                            <li>Grão-de-bico</li>
                            <li>Soja</li>
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Oleaginosas
                        </div>
                        <ul>
                            <li>Castanhas</li>
                            <li>Amendoim</li>
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-title">
                            <span class="dot"></span> Industrializados
                        </div>
                        <ul>
                            <li>Refrigerante tipo cola</li>
                            <li>Embutidos (presunto, salsicha)</li>
                            <li>Nuggets</li>
                            <li>Queijo processado</li>
                            <li>Produtos com "fosfato" no rótulo</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="tips">

            <div class="tips-top">
                <div class="accent-bar"></div>

                <div class="tips-content">
                    <div class="tips-header">
                        <span class="tips-icon">⚠️</span>
                        <h2>Dicas Importantes</h2>
                    </div>

                    <ul class="tips-list">
                        <li class="tip-green">Prefira alimentos da coluna <strong>verde.</strong></li>
                        <li class="tip-yellow">Consuma os da coluna <strong>amarela</strong> com orientação.</li>
                        <li class="tip-red">Evite ou limite os da coluna <strong>vermelha.</strong></li>
                    </ul>

                    <div class="tips-divider"></div>

                    <div class="tips-block">
                        <p class="tips-bold">
                            Leia o rótulo: se tiver a palavra "fosfato", "fosfórico" ou "phos-", evite.
                        </p>

                        <ul class="tips-sublist">
                            <li>Fósforo de origem vegetal (grãos/leguminosas) é menos absorvido (~30–50%).</li>
                            <li>Fósforo de origem animal é mais absorvido (~60–80%).</li>
                            <li> Fósforo de alimentos industrializados é quase totalmente absorvido (~90–100%).</li>
                        </ul>

                        <p class="tips-warning">
                            ⚠️ O controle do fósforo também depende do uso correto dos quelantes prescritos como o
                            Sevelâmer.
                        </p>
                        <p class="tips-warning">
                            ⚠️ A quantidade total consumida ao longo do dia influencia o resultado do exame de sangue.
                        </p>
                    </div>

                    <div class="tips-divider"></div>
                </div>

            </div>
    </main>
@endsection

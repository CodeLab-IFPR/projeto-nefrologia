@push('styles')
    <link rel="stylesheet" href="{{ asset('css/guialeitura.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js\home.js') }}"></script>
@endpush
@extends('layout')
@section('title', 'Alimentos e Potássio')
@section('conteudo')

<main class="container main">
  <div class="page-header">
    <span class="emoji">🍎</span>
    <h1>Alimentos e Potássio</h1>
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
          <span>Baixo Potássio</span>
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
          </ul>
        </div>

        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Verduras / Legumes
          </div>
          <ul>
            <li>Alface</li>
            <li>Pepino</li>
            <li>Chuchu</li>
            <li>Abobrinha</li>
          </ul>
        </div>

        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Outros
          </div>
          <ul>
            <li>Arroz branco</li>
            <li>Pão branco</li>
            <li>Cuscuz de milho</li>
            <li>Farinha de mandioca</li>
            <li>Tapioca</li>
            <li>Polenta</li>
            <li>Frango</li>
            <li>Peixe fresco</li>
            <li>Carne bovina magra</li>
            <li>Bolo simples, sem chocolate e sem frutas secas</li>
            <li>Clara de ovo</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="food-card moderate">
      <div class="card-header">
        <div class="header-title">
          <span class="emoji">🟡</span>
          <span>Moderado Potássio</span>
        </div>
        <div class="range">101 a 200 mg</div>
      </div>

      <div class="card-body">
        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Frutas
          </div>
          <ul>
            <li>Pera</li>
            <li>Caqui</li>
            <li>Pêssego</li>
            <li>Laranja Lima</li>
            <li>Ameixa fresca</li>
            <li>Melancia</li>
          </ul>
        </div>

        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Verduras / Legumes
          </div>
          <ul>
            <li>Cenoura cozida</li>
            <li>Beterraba cozida</li>
            <li>Couve-flor</li>
          </ul>
        </div>

        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Outros
          </div>
          <ul>
            <li>Macarrão</li>
            <li>Peixe magro</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="food-card high">
      <div class="card-header">
        <div class="header-title">
          <span class="emoji">🔴</span>
          <span>Alto Potássio</span>
        </div>
        <div class="range">acima de 200 mg</div>
      </div>

      <div class="card-body">
        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Frutas
          </div>
          <ul>
            <li>Banana</li>
            <li>Abacate</li>
            <li>Melão</li>
            <li>Kiwi</li>
            <li>Mamão</li>
            <li>Laranja Pera</li>
            <li>Mexerica</li>
            <li>Goiaba</li>
            <li>Jaca</li>
            <li>Ameixa seca</li>
            <li>Maracujá</li>
            <li>Manga</li>
          </ul>
        </div>

        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Verduras / Legumes
          </div>
          <ul>
            <li>Batata</li>
            <li>Batata-doce</li>
            <li>Tomate</li>
            <li>Espinafre</li>
          </ul>
        </div>

        <div class="section">
          <div class="section-title">
            <span class="dot"></span> Outros
          </div>
          <ul>
            <li>Feijão</li>
            <li>Lentilha</li>
            <li>Leite</li>
            <li>Soja</li>
            <li>Grão de bico</li>
            <li>Castanhas</li>
            <li>Amendoim</li>
            <li>Uva passa</li>
            <li>Pão integral</li>
            <li>Chocolate</li>
            <li>Coco seco</li>
            <li>Caldo de cana</li>
            <li>Água de coco</li>
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
        <li class="tip-yellow">Os da coluna <strong>amarela</strong> devem ser consumidos com moderação.</li>
        <li class="tip-red">Evite ou limite os da coluna <strong>vermelha.</strong></li>
      </ul>

      <div class="tips-divider"></div>

      <div class="tips-block">
        <p class="tips-bold">
          Alguns legumes e tubérculos podem ter parte do potássio reduzida quando:
        </p>

        <ul class="tips-sublist">
          <li>São descascados;</li>
          <li>Cortados em pedaços pequenos;</li>
          <li>Cozidos em bastante água;</li>
          <li>E a água do cozimento é descartada.</li>
        </ul>

        <p class="tips-warning">
          ⚠️ Mesmo assim, continuam tendo potássio e devem ser consumidos com orientação.
        </p>
      </div>

      <div class="tips-divider"></div>

      <div class="tips-extra">
        <p>
          🥤 Se as frutas forem consumidas em forma de 
          <strong>suco ou vitaminas</strong>, a concentração de potássio será maior.
        </p>

        <p>
          💡 <strong>Dica:</strong> O risco não é apenas o alimento isolado, mas o 
          <strong>total diário ingerido</strong>.
        </p>
      </div>
    </div>

  </div>

</div>


</main>

@endsection
@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('css/catalog.css')}}">

<div class="container">
  <div class="search mb-5" id="searchInput">
    <h1>Catálogo</h1>
    <form action="" method="get" id="formFilter">
      <input type="text" class="mb-3" name="name" id="name" placeholder="Buscar jogo" value="{{request('name')}}">
    <input type="submit" value="Filtrar" id="filtrar">
  </div>
      <div class="jogos">
        <div class="filtro">
          <div class="filtroAplicado mb-3">
            <div>
              <span>{{$count}} resultados</span>
              @if (request('name'))
              <a href="{{ route('catalogo', array_merge($filterName)) }}" class="btn btn-secondary btn-sm ms-3">Nome <i class="bi bi-x-circle-fill"></i></a>
              @endif
              @if (request('order'))
              <a href="{{ route('catalogo', array_merge($filterOrder)) }}" class="btn btn-secondary btn-sm ms-3">Ordem <i class="bi bi-x-circle-fill"></i></a>
              @endif
              @if (request('platform'))
              <a href="{{ route('catalogo', array_merge($filterPlatform)) }}" class="btn btn-secondary btn-sm ms-3">Plataforma <i class="bi bi-x-circle-fill"></i></a>
              @endif
              @if (request('category'))
              <a href="{{ route('catalogo', array_merge($filterCategory)) }}" class="btn btn-secondary btn-sm ms-3">Categoria <i class="bi bi-x-circle-fill"></i></a>
              @endif
              @if (request('price'))
              <a href="{{ route('catalogo', array_merge($filterPrice)) }}" class="btn btn-secondary btn-sm ms-3">Preço <i class="bi bi-x-circle-fill"></i></a>
              @endif
              @if (request('mode'))
              <a href="{{ route('catalogo', array_merge($filterMode)) }}" class="btn btn-secondary btn-sm ms-3">Modo de Jogo <i class="bi bi-x-circle-fill"></i></a>
              @endif
              
              <a href="/games/catalogs" class="ms-3 limparFiltro"><i class="bi bi-x-circle-fill"></i> limpar filtros</a>
            </div>
            <div class="listarSelect">
              <label for="select">Filtrar por:</label>
              <select class="form-select" name="order" id="order">
                <option value="1" {{ request('order') == 1 ? 'selected' : '' }}>Últimos Adicionados</option>
                <option value="2" {{ request('order') == 2 ? 'selected' : '' }}>Mais Vendidos</option>
                <option value="3" {{ request('order') == 3 ? 'selected' : '' }}>Ordem Alfabética</option>
                <option value="4" {{ request('order') == 4 ? 'selected' : '' }}>Data de Lançamento</option>
                <option value="5" {{ request('order') == 5 ? 'selected' : '' }}>Menor Preço</option>
                <option value="6" {{ request('order') == 6 ? 'selected' : '' }}>Maior desconto</option>
              </select>
            </div>
          </div>

          <div class="selectFilter">
            <select class="form-select" id="primeiroSelect" name="platform">
              <option value="">Plataforma</option>
              <option value="Computador" {{ request('platform') == 'Computador' ? 'selected' : '' }}>Computador</option>
              <option value="Xbox" {{ request('platform') == 'Xbox' ? 'selected' : '' }}>Xbox</option>
              <option value="Playstation" {{ request('platform') == 'Playstation' ? 'selected' : '' }}>Playstation</option>
              <option value="Nintendo" {{ request('platform') == 'Nintendo' ? 'selected' : '' }}>Nintendo</option>
            </select>
            <select class="form-select" name="category" id="category">
              <option value="">Categorias</option>
              @foreach ($generos as $genero)
              <option value="{{$genero->id}}" {{ request('category') == $genero->id ? 'selected' : '' }}>{{$genero->name}}</option>
              @endforeach
            </select>
            <select class="form-select" name="mode" id="mode">
              <option value="">Modo de Jogo</option>
              <option value="1" {{ request('distributor') == "1" ? 'selected' : '' }}>Um jogador</option>
              <option value="2" {{ request('distributor') == "2" ? 'selected' : '' }}>Multijogador</option>
              <option value="3" {{ request('distributor') == "3" ? 'selected' : '' }}>PvP</option>
              <option value="4" {{ request('distributor') == "4" ? 'selected' : '' }}>Cooperativo</option>
              <option value="5" {{ request('distributor') == "5" ? 'selected' : '' }}>Tela compartilhada/dividida</option>
            </select>
            <select class="form-select" id="ultimoSelect" name="price">
              <option value="">Preço</option>
              <option value="5" {{ request('price') == 5 ? 'selected' : '' }}>Abaixo de R$5,00</option>
              <option value="10" {{ request('price') == 10 ? 'selected' : '' }}>Abaixo de R$10,00</option>
              <option value="15" {{ request('price') == 15 ? 'selected' : '' }}>Abaixo de R$15,00</option>
              <option value="20" {{ request('price') == 20 ? 'selected' : '' }}>Abaixo de R$20,00</option>
              <option value="25" {{ request('price') == 25 ? 'selected' : '' }}>Abaixo de R$25,00</option>
              <option value="50" {{ request('price') == 50 ? 'selected' : '' }}>Abaixo de R$50,00</option>
              <option value="100" {{ request('price') == 100 ? 'selected' : '' }}>Abaixo de R$100,00</option>
              <option value="oferta" {{ request('price') == 'oferta' ? 'selected' : '' }}>Em oferta</option>
            </select>
          </div>
        </form>
      <div class="viewJogos mt-3">
        @yield('jogos')
      </div>

    </div>
  </div>
  <div class="pagination mt-3" id="pagination">
    {{ $jogos->appends(['order' => $order, 'name' => $name, 'platform' => $platform, 'category' => $category, 'price' => $price])->links() }}
  </div>
</div>

<script src="{{asset('js/catalog.js')}}"></script>

@endsection


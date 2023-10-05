@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('css/game.css')}}">

<div class="container">

  <div class="gameInfo">
    <div class="carousel me-3">
      <div class="imagemJogo">
        <img src="{{asset('image/jogos/'.$jogo->image)}}" alt="" class="mb-3">
      </div>
      <div class="nomeJogo">
        <h2>{{$jogo->name}}</h2>
        <div>
          @if ($jogo->discount > 0) 
            <p class="me-1" id="discountGame">-{{$jogo->discount}}%</p>
          @endif
          <form method="POST" action="/cart/add">
            @csrf
            <input type="hidden" name="produto_id" value="{{$jogo->id}}">
            <a href="" id="priceGame" onclick="event.preventDefault(); this.closest('form').submit();">R$ {{number_format($jogo->priceDiscount,2,",",".")}}</a>
          </form>
        </div>
      </div>
      @if ($jogo->reqMinimos[0] != null)
      <div class="requisitos mt-5">
        <h3>Requisitos de Sistema</h3>
        <div class="mt-3 d-flex">
          <div class="me-3">
            <h6>MÍNIMOS</h6>    
            <p><strong>SO:</strong> {{$jogo->reqMinimos[0]}}</p>
            <p><strong>Armazenamento:</strong> {{$jogo->reqMinimos[1]}}</p>
            <p><strong>Processador:</strong> {{$jogo->reqMinimos[2]}}</p>
            <p><strong>Memória:</strong> {{$jogo->reqMinimos[3]}}</p>
            <p><strong>Placa de vídeo:</strong> {{$jogo->reqMinimos[4]}}</p>
          </div>
          <div>
            <h6>RECOMENDADOS</h6>
            <p><strong>SO:</strong> {{$jogo->reqRecomendados[0]}}</p>
            <p><strong>Armazenamento:</strong> {{$jogo->reqRecomendados[1]}}</p>
            <p><strong>Processador:</strong> {{$jogo->reqRecomendados[2]}}</p>
            <p><strong>Memória:</strong> {{$jogo->reqRecomendados[3]}}</p>
            <p><strong>Placa de vídeo:</strong> {{$jogo->reqRecomendados[4]}}</p>
          </div>
        </div>
      </div>
      @endif
    </div>
    <div class="sobre">
      <h2 class="mt-2">Sobre o Jogo</h2>
      <div class="sobreJogo">
        <span class="short-text">{{mb_substr($jogo->about, 0, 370, 'UTF-8')}}<a class="read-more" id="lerMais">...Ler mais</a></span>
        <span class="full-text" style="display: none">{{$jogo->about}} <a class="read-less">...Ler menos</a></span>
      </div>
      <div class="infoJogo">
        <span><strong>Lançamento:</strong> {{ \Carbon\Carbon::parse($jogo->launch)->format('d/m/Y')}}</span>
        <span><strong>Desenvolvedor:</strong> {{$jogo->producer}}</span>
        <p>Plataforma</p>
        <span class="mb-2">
        @foreach ($jogo->platform as $platform)
          <a href="/games/catalogs?platform={{$platform}}">{{$platform}}</a>
          @endforeach
        </span>
        <p>Categoria/Gênero</p>
        <span class="mb-2 d-flex categoryGame">
          @foreach ($jogo->category as $category)
            @foreach ($generos as $genero)
              @if ($genero->id == $category)
                <a href="/games/catalogs?category={{$genero->id}}">{{$genero->name}}</a>
              @endif
            @endforeach
          @endforeach
        </span>
        <p>Modo de Jogo</p>
        <span class="mb-2 gameMode">
        @foreach ($jogo->modoJogo as $modoJogo)
          @if ($modoJogo == '1')
            <a href="/games/catalogs?&mode=1" id="gameMode">Um Jogador</a>
          @endif
          @if ($modoJogo == '2')
            <a href="/games/catalogs?&mode=2" id="gameMode">Multijogador</a>
          @endif
          @if ($modoJogo == '3')
            <a href="/games/catalogs?&mode=3" id="gameMode">PvP</a>
          @endif
          @if ($modoJogo == '4')
            <a href="/games/catalogs?&mode=4" id="gameMode">Cooperativo</a>
          @endif
          @if ($modoJogo == '5')
            <a href="/games/catalogs?&mode=5" id="gameMode">Tela compartilhada/dividida</a>
          @endif
        @endforeach
        </span>
      </div>
    </div>
  </div>


</div>
<script src="{{asset('js/game.js')}}"></script>
@endsection


@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

<style>
#borderDesejo {
  border-top: 3px solid rgb(255, 0, 0);
}
</style>

<div class="container">

  <ul class="nav-list" id="tirarPadding">
    <div class="navProfile">
      <li class="dropdown" id="borderDesejo">
        <a href="/account/wishlist">Lista de Desejos</a></a>
      </li>
      <li class="dropdown" id="borderPedido">
        <a href="/account/requests">Pedidos</a></a>
      </li>
      <li class="dropdown" id="borderConta">
        <a href="/account/details">Minha Conta</a></a>
      </li>
    </div>
  </ul>


  @if (count($userFavs) > 0)
  @for ($i = 0; $i < count($userFavs); $i++)
  <div class="gameWishlist mt-3">
    <div>
      <form method="POST" action="/disfavor/game/{{$userFavs[$i]['id']}}">
        @csrf
        <i class="bi bi-heart-fill me-3" onclick="event.preventDefault(); this.closest('form').submit();"></i>
      </form>
      <img src="{{asset('image/jogos/'.$userFavs[$i]['image'])}}" alt="">
      <div id="divEsquerdaWishlist" class="ms-3">
        <a href="/game/{{$userFavs[$i]['id']}}">{{$userFavs[$i]['name']}}</a>
        <p>
          @for ($j = 0; $j < count($userFavs[$i]['platform']); $j++)
            @if ($userFavs[$i]['platform'][$j] == 'Computador')
            <i class="bi bi-windows"></i>
            @endif
            @if ($userFavs[$i]['platform'][$j] == 'Xbox')
            <i class="bi bi-xbox"></i>
            @endif
            @if ($userFavs[$i]['platform'][$j] == 'Playstation')
            <i class="bi bi-playstation"></i>
            @endif
            @if ($userFavs[$i]['platform'][$j] == 'Nintendo')
            <i class="bi bi-nintendo-switch"></i>
            @endif
          @endfor
        </p>
      </div>
    </div>
    <div class="priceWishlist">
      <div class="d-flex align-items-center mb-1">
        @if ($userFavs[$i]['discount'] > 0)
        <span id="discountWishlist">-{{$userFavs[$i]['discount']}}%</span>
        @endif
        <div class="d-flex flex-column">
          @if ($userFavs[$i]['discount'] > 0)
          <span id="price">R$ {{number_format($userFavs[$i]['price'],2,",",".")}}</span>
          @endif
          <span id="priceDiscount">R$ {{number_format($userFavs[$i]['priceDiscount'],2,",",".")}}</span>
        </div>
      </div>
      <a href="">Comprar</a>
    </div>
  </div>
  @endfor
  @else
  <h1 class="nenhumFav">Você ainda não possui nenhum jogo :(</h1>
  @endif
</div>

<script src="{{asset('js/profile.js')}}"></script>

@endsection


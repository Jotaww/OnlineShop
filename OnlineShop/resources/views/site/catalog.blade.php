@extends('layouts.catalog')

@section('jogos')

@foreach ($jogos as $jogo)
<div class="slideGameSection">
  <a href="/game/{{$jogo->id}}">
    <div class="imageGameCatalog">
      <img src="{{asset('image/jogos/'.$jogo->image)}}" alt="">
      @if (in_array($jogo->id, $arrayTrue))
        <form method="POST" action="/disfavor/game/{{$jogo->id}}" id="formFav">
          @csrf
          <i class="bi bi-heart-fill" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
        </form>
      @else
        <form method="POST" action="/fav/game/{{$jogo->id}}" id="formFav">
          @csrf
          <i class="bi bi-heart" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
        </form>
      @endif
    </div>
    <div class="gameSectionInd">
      <div>
        <p id="nomeJogo" title="{{$jogo->name}}">{{$jogo->name}}</p>
        <p id="plataformas"><i class="bi bi-steam"></i><i class="bi bi-windows"></i></p>
        <p id="lancamento">Lançamento {{ \Carbon\Carbon::parse($jogo->launch)->format('d/m/Y')}}</p>
      </div>
      <div class="divPrice">
        @if ($jogo->discount > 0) 
        <a href="" id="discountGame">-{{$jogo->discount}}%</a>
        @endif
        <form method="POST" action="/cart/add">
          @csrf
          <input type="hidden" name="produto_id" value="{{$jogo->id}}">
          <a href="" id="priceGame" onclick="event.preventDefault(); this.closest('form').submit();">R$ {{number_format($jogo->priceDiscount,2,",",".")}}</a>
        </form>
      </div>
    </div>
  </a>
</div>
@endforeach

@endsection


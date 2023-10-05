@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('css/homePage.css')}}">

<div class="container">

  <div class="carousel" id="carouselPc">
    <div class="slider">
      <div class="slides">
        @for ($i = 0; $i < 3; $i++)
        <div class="slide">
          <a href="/game/{{$carousel[$i]->idGame}}"><img src="{{asset('image/jogos/'.$carousel[$i]->image)}}" alt="Image 1"></a>
          <section>
            @if ($carousel[$i]->discount > 0) 
              <a href="/game/{{$carousel[$i]->idGame}}" id="slideDiscount">-{{$carousel[$i]->discount}}%</a>
            @endif
            <form method="POST" action="/cart/add">
              @csrf
              <input type="hidden" name="produto_id" value="{{$carousel[$i]->idGame}}">
              <button onclick="event.preventDefault(); this.closest('form').submit();" id="slidePrice">R$ {{number_format($carousel[$i]->priceDiscount,2,",",".")}}</button>
            </form>
            @if (in_array($carousel[$i]->idGame, $arrayTrue))
              <form method="POST" action="/disfavor/game/{{$carousel[$i]->idGame}}">
                @csrf
                <i class="bi bi-heart-fill" id="favSlideFill" onclick="event.preventDefault(); this.closest('form').submit();"></i>
              </form>
            @else
              <form method="POST" action="/fav/game/{{$carousel[$i]->idGame}}">
                @csrf
                <i class="bi bi-heart" id="favSlide" onclick="event.preventDefault(); this.closest('form').submit();"></i>
              </form>
            @endif
          </section>
          <div>
            <div class="smallerSlideOne">
              <a href="/game/{{$carousel[$i+3]->idGame}}"><img src="{{asset('image/jogos/'.$carousel[$i+3]->image)}}" alt="Image 2"></a>
              <section>
                @if ($carousel[$i+3]->discount > 0) 
                  <a href="/game/{{$carousel[$i+3]->idGame}}" id="slideDiscount">-{{$carousel[$i+3]->discount}}%</a>
                @endif
                <form method="POST" action="/cart/add">
                  @csrf
                  <input type="hidden" name="produto_id" value="{{$carousel[$i+3]->idGame}}">
                  <button onclick="event.preventDefault(); this.closest('form').submit();" id="slidePrice">R$ {{number_format($carousel[$i+3]->priceDiscount,2,",",".")}}</button>
                </form>
                @if (in_array($carousel[$i+3]->idGame, $arrayTrue))
                  <form method="POST" action="/disfavor/game/{{$carousel[$i+3]->idGame}}">
                    @csrf
                    <i class="bi bi-heart-fill" id="favSlideFill" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                  </form>
                @else
                  <form method="POST" action="/fav/game/{{$carousel[$i+3]->idGame}}">
                    @csrf
                    <i class="bi bi-heart" id="favSlide" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                  </form>
                @endif
              </section>
            </div>
            <div class="smallerSlideTwo">
              <a href="/game/{{$carousel[$i+6]->idGame}}"><img src="{{asset('image/jogos/'.$carousel[$i+6]->image)}}" alt="Image 3"></a>
              <section>
                @if ($carousel[$i+6]->discount > 0) 
                  <a href="/game/{{$carousel[$i+6]->idGame}}" id="slideDiscount">-{{$carousel[$i+6]->discount}}%</a>
                @endif
                <form method="POST" action="/cart/add">
                  @csrf
                  <input type="hidden" name="produto_id" value="{{$carousel[$i+6]->idGame}}">
                  <button onclick="event.preventDefault(); this.closest('form').submit();" id="slidePrice">R$ {{number_format($carousel[$i+6]->priceDiscount,2,",",".")}}</button>
                </form>
                @if (in_array($carousel[$i+6]->idGame, $arrayTrue))
                  <form method="POST" action="/disfavor/game/{{$carousel[$i+6]->idGame}}">
                    @csrf
                    <i class="bi bi-heart-fill" id="favSlideFill" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                  </form>
                @else
                  <form method="POST" action="/fav/game/{{$carousel[$i+6]->idGame}}">
                    @csrf
                    <i class="bi bi-heart" id="favSlide" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                  </form>
                @endif
              </section>
            </div>
          </div>
        </div>
        @endfor
      </div>
    </div>
    <div class="menuControls">
      <div class="controls">
        <button class="prev-button">&#10094;</button>
      </div>
      <div class="dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
      <div class="controls">
        <button class="next-button">&#10095;</button>
      </div>
    </div>
  </div>


  <div class="carousel" id="carouselMobile">
    <div class="slider">
      <div class="slidesMobile">
        @for ($i = 0; $i < 9; $i++)
          <div class="slideMobile">
            <a href="/game/{{$carousel[$i]->idGame}}"><img src="{{asset('image/jogos/'.$carousel[$i]->image)}}" alt="Image 1"></a>
            <section>
              @if ($carousel[$i]->discount > 0) 
                <a href="/game/{{$carousel[$i]->idGame}}" id="slideDiscount">-{{$carousel[$i]->discount}}%</a>
              @endif
              <form method="POST" action="/cart/add">
                @csrf
                <input type="hidden" name="produto_id" value="{{$carousel[$i]->idGame}}">
                <button onclick="event.preventDefault(); this.closest('form').submit();" id="slidePrice">R$ {{number_format($carousel[$i]->priceDiscount,2,",",".")}}</button>
              </form>
              @if (in_array($carousel[$i]->idGame, $arrayTrue))
                <form method="POST" action="/disfavor/game/{{$carousel[$i]->idGame}}">
                  @csrf
                  <i class="bi bi-heart-fill" id="favSlideFill" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                </form>
              @else
                <form method="POST" action="/fav/game/{{$carousel[$i]->idGame}}">
                  @csrf
                  <i class="bi bi-heart" id="favSlide" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                </form>
              @endif
            </section>
          </div>
        @endfor
      </div>
    </div>
    <div class="menuControls">
      <div class="controls">
        <button class="prev-button-mobile">&#10094;</button>
      </div>
      <div class="dots">
        <span class="dotMobile active"></span>
        <span class="dotMobile"></span>
        <span class="dotMobile"></span>
        <span class="dotMobile"></span>
        <span class="dotMobile"></span>
        <span class="dotMobile"></span>
        <span class="dotMobile"></span>
        <span class="dotMobile"></span>
        <span class="dotMobile"></span>
      </div>
      <div class="controls">
        <button class="next-button-mobile">&#10095;</button>
      </div>
    </div>
  </div>


  <div class="gameSection">
    <div class="titleSection mb-3">
      <div>
        <h3>Bethesda Softworks</h3>
        <span>Jogos com até {{$discountBethesda}}% de desconto!</span>
      </div>
      <a href="/games/catalogs?distributor=Bethesda" class="btn btn-primary">Ver mais</a>
    </div>
    <div class="gamesDiv">
      @foreach ($bethesdaJogos as $bethesdaJogo)
      <div class="games">
        <a href="/game/{{$bethesdaJogo->id}}">
          <div class="gameImage">
            <img src="{{asset('image/jogos/'.$bethesdaJogo->image)}}" alt="">
            @if (in_array($bethesdaJogo->id, $arrayTrue))
              <form method="POST" action="/disfavor/game/{{$bethesdaJogo->id}}" id="formFav">
              @csrf
              <i class="bi bi-heart-fill" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
            </form>
            @else
              <form method="POST" action="/fav/game/{{$bethesdaJogo->id}}" id="formFav">
                @csrf
                <i class="bi bi-heart" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
              </form>
            @endif
          </div>
          <div class="gameDescription">
            <div>
              <p id="nomeJogo" title="{{$bethesdaJogo->name}}">{{$bethesdaJogo->name}}</p>
              <p id="plataformas">
                @for ($i = 0; $i < count($bethesdaJogo->platform); $i++)
                  @if ($bethesdaJogo->platform[$i] == 'Computador')
                  <i class="bi bi-windows"></i>
                  @endif
                  @if ($bethesdaJogo->platform[$i] == 'Xbox')
                  <i class="bi bi-xbox"></i>
                  @endif
                  @if ($bethesdaJogo->platform[$i] == 'Playstation')
                  <i class="bi bi-playstation"></i>
                  @endif
                  @if ($bethesdaJogo->platform[$i] == 'Nintendo')
                  <i class="bi bi-nintendo-switch"></i>
                  @endif
                @endfor
              </p>
              <p id="lancamento">Lançamento {{ \Carbon\Carbon::parse($bethesdaJogo->launch)->format('d/m/Y')}}</p>
            </div>
            <div class="divPrice">
              @if ($bethesdaJogo->discount > 0) 
                <a href="/game/{{$bethesdaJogo->id}}" id="discountGame">-{{$bethesdaJogo->discount}}%</a>
              @endif
              <form method="POST" action="/cart/add">
                @csrf
                <input type="hidden" name="produto_id" value="{{$bethesdaJogo->id}}">
                <a href="" id="priceGame" onclick="event.preventDefault(); this.closest('form').submit();">R$ {{number_format($bethesdaJogo->priceDiscount,2,",",".")}}</a>
              </form>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>


  <div class="gameSection mt-5">
    <div class="titleSection mb-3">
      <div>
        <h3>Especial Nintendo</h3>
        @if ($discountNintendo > 0)
        <span>Jogos com até {{$discountNintendo}}% de desconto!</span>
        @endif
      </div>
      <a href="/games/catalogs?distributor=Bethesda" class="btn btn-primary">Ver mais</a>
    </div>
    <div class="gamesDiv">
      @foreach ($nintendoJogos as $nintendoJogo)
      <div class="games">
        <a href="/game/{{$nintendoJogo->id}}">
          <div class="gameImage">
            <img src="{{asset('image/jogos/'.$nintendoJogo->image)}}" alt="">
            @if (in_array($nintendoJogo->id, $arrayTrue))
              <form method="POST" action="/disfavor/game/{{$nintendoJogo->id}}" id="formFav">
              @csrf
              <i class="bi bi-heart-fill" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
            </form>
            @else
              <form method="POST" action="/fav/game/{{$nintendoJogo->id}}" id="formFav">
                @csrf
                <i class="bi bi-heart" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
              </form>
            @endif
          </div>
          <div class="gameDescription">
            <div>
              <p id="nomeJogo" title="{{$nintendoJogo->name}}">{{$nintendoJogo->name}}</p>
              <p id="plataformas">
                @for ($i = 0; $i < count($nintendoJogo->platform); $i++)
                  @if ($nintendoJogo->platform[$i] == 'Computador')
                  <i class="bi bi-windows"></i>
                  @endif
                  @if ($nintendoJogo->platform[$i] == 'Xbox')
                  <i class="bi bi-xbox"></i>
                  @endif
                  @if ($nintendoJogo->platform[$i] == 'Playstation')
                  <i class="bi bi-playstation"></i>
                  @endif
                  @if ($nintendoJogo->platform[$i] == 'Nintendo')
                  <i class="bi bi-nintendo-switch"></i>
                  @endif
                @endfor
              </p>
              <p id="lancamento">Lançamento {{ \Carbon\Carbon::parse($nintendoJogo->launch)->format('d/m/Y')}}</p>
            </div>
            <div class="divPrice">
              @if ($nintendoJogo->discount > 0) 
                <a href="/game/{{$nintendoJogo->id}}" id="discountGame">-{{$nintendoJogo->discount}}%</a>
              @endif
              <form method="POST" action="/cart/add">
                @csrf
                <input type="hidden" name="produto_id" value="{{$nintendoJogo->id}}">
                <a href="" id="priceGame" onclick="event.preventDefault(); this.closest('form').submit();">R$ {{number_format($nintendoJogo->priceDiscount,2,",",".")}}</a>
              </form>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>


  <div class="gameDestaque mt-5">
    <img src="{{asset('image/jogos/'.$highlight->image)}}" alt="2">
    <div class="gameDestaqueFade"></div>
    <div class="gameDestaqueBtn">
      @if ($highlight->discount > 0) 
        <a href="/game/{{$highlight->idGame}}" id="gameDestaqueDiscount">-{{$highlight->discount}}%</a>
      @endif
      <form method="POST" action="/cart/add">
        @csrf
        <input type="hidden" name="produto_id" value="{{$highlight->idGame}}">
        <a href=""  onclick="event.preventDefault(); this.closest('form').submit();" id="destaquePrice">R$ {{number_format($highlight->priceDiscount,2,",",".")}}</a>
      </form>
      @if (in_array($highlight->idGame, $arrayTrue))
      <form method="POST" action="/disfavor/game/{{$highlight->idGame}}">
        @csrf
        <i class="bi bi-heart-fill" id="favDestaqueFill" onclick="event.preventDefault(); this.closest('form').submit();"></i>
      </form>
      @else
        <form method="POST" action="/fav/game/{{$highlight->idGame}}">
          @csrf
          <i class="bi bi-heart" id="favDestaque" onclick="event.preventDefault(); this.closest('form').submit();"></i>
        </form>
      @endif
    </div>
  </div>


  <div class="gameSection mt-5">
    <div class="titleSection mb-3">
      <div>
        <h3>Menores Preços</h3>
        <span>Jogos com até {{$bestDiscount}}% de desconto!</span>
      </div>
      <a href="/games/catalogs?distributor=Bethesda" class="btn btn-primary">Ver mais</a>
    </div>
    <div class="gamesDiv">
      @foreach ($orderByPrices as $orderByPrice)
      <div class="games">
        <a href="/game/{{$orderByPrice->id}}">
          <div class="gameImage">
            <img src="{{asset('image/jogos/'.$orderByPrice->image)}}" alt="">
            @if (in_array($orderByPrice->id, $arrayTrue))
              <form method="POST" action="/disfavor/game/{{$orderByPrice->id}}" id="formFav">
              @csrf
              <i class="bi bi-heart-fill" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
            </form>
            @else
              <form method="POST" action="/fav/game/{{$orderByPrice->id}}" id="formFav">
                @csrf
                <i class="bi bi-heart" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
              </form>
            @endif
          </div>
          <div class="gameDescription">
            <div>
              <p id="nomeJogo" title="{{$orderByPrice->name}}">{{$orderByPrice->name}}</p>
              <p id="plataformas">
                @for ($i = 0; $i < count($orderByPrice->platform); $i++)
                  @if ($orderByPrice->platform[$i] == 'Computador')
                  <i class="bi bi-windows"></i>
                  @endif
                  @if ($orderByPrice->platform[$i] == 'Xbox')
                  <i class="bi bi-xbox"></i>
                  @endif
                  @if ($orderByPrice->platform[$i] == 'Playstation')
                  <i class="bi bi-playstation"></i>
                  @endif
                  @if ($orderByPrice->platform[$i] == 'Nintendo')
                  <i class="bi bi-nintendo-switch"></i>
                  @endif
                @endfor
              </p>
              <p id="lancamento">Lançamento {{ \Carbon\Carbon::parse($orderByPrice->launch)->format('d/m/Y')}}</p>
            </div>
            <div class="divPrice">
              @if ($orderByPrice->discount > 0) 
                <a href="/game/{{$orderByPrice->id}}" id="discountGame">-{{$orderByPrice->discount}}%</a>
              @endif
              <form method="POST" action="/cart/add">
                @csrf
                <input type="hidden" name="produto_id" value="{{$orderByPrice->id}}">
                <a href="" id="priceGame" onclick="event.preventDefault(); this.closest('form').submit();">R$ {{number_format($orderByPrice->priceDiscount,2,",",".")}}</a>
              </form>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>


  <div class="gameSection mt-5">
    <div class="titleSection mb-3">
      <div>
        <h3>Melhores Ofertas</h3>
        <span>Jogos com até {{$bestDiscount}}% de desconto!</span>
      </div>
      <a href="/games/catalogs?distributor=Bethesda" class="btn btn-primary">Ver mais</a>
    </div>
    <div class="gamesDiv">
      @foreach ($orderByDiscounts as $orderByDiscount)
      <div class="games">
        <a href="/game/{{$orderByDiscount->id}}">
          <div class="gameImage">
            <img src="{{asset('image/jogos/'.$orderByDiscount->image)}}" alt="">
            @if (in_array($orderByDiscount->id, $arrayTrue))
              <form method="POST" action="/disfavor/game/{{$orderByDiscount->id}}" id="formFav">
              @csrf
              <i class="bi bi-heart-fill" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
            </form>
            @else
              <form method="POST" action="/fav/game/{{$orderByDiscount->id}}" id="formFav">
                @csrf
                <i class="bi bi-heart" id="favIcon" onclick="event.preventDefault(); this.closest('form').submit();"></i>
              </form>
            @endif
          </div>
          <div class="gameDescription">
            <div>
              <p id="nomeJogo" title="{{$orderByDiscount->name}}">{{$orderByDiscount->name}}</p>
              <p id="plataformas">
                @for ($i = 0; $i < count($orderByDiscount->platform); $i++)
                  @if ($orderByDiscount->platform[$i] == 'Computador')
                  <i class="bi bi-windows"></i>
                  @endif
                  @if ($orderByDiscount->platform[$i] == 'Xbox')
                  <i class="bi bi-xbox"></i>
                  @endif
                  @if ($orderByDiscount->platform[$i] == 'Playstation')
                  <i class="bi bi-playstation"></i>
                  @endif
                  @if ($orderByDiscount->platform[$i] == 'Nintendo')
                  <i class="bi bi-nintendo-switch"></i>
                  @endif
                @endfor
              </p>
              <p id="lancamento">Lançamento {{ \Carbon\Carbon::parse($orderByDiscount->launch)->format('d/m/Y')}}</p>
            </div>
            <div class="divPrice">
              @if ($orderByDiscount->discount > 0) 
                <a href="/game/{{$orderByDiscount->id}}" id="discountGame">-{{$orderByDiscount->discount}}%</a>
              @endif
              <form method="POST" action="/cart/add">
                @csrf
                <input type="hidden" name="produto_id" value="{{$orderByDiscount->id}}">
                <a href="" id="priceGame" onclick="event.preventDefault(); this.closest('form').submit();">R$ {{number_format($orderByDiscount->priceDiscount,2,",",".")}}</a>
              </form>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>


</div>

<script src="{{asset('js/homePage.js')}}"></script>
@endsection


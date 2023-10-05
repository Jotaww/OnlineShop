@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">

<div class="container">
  <div class="titleCart">
    <h1>Meu Carrinho</h1>
    <a href="/" class="btn btn-primary"><i class="bi bi-chevron-left"></i> Continuar Comprando</a>
  </div>
  <div class="menu mt-3">
    <div class="cartFinalize me-3">

      <div class="cart">
        <div class="prodValor">
          <h5>Produto</h5>
          <h5>Valor</h5>
        </div>
        @foreach ($carrinho as $produtoId => $item)
        <div class="gamesCart">
          <div class="imgGame">
            <img src="{{asset('image/jogos/'.$item['produto']->image)}}" alt="">
          </div>
          <div class="nameGame">
            <span><a href="/game/{{ $item['produto']->id }}">{{ $item['produto']->name }}</a></span>
            <span>
              @for ($i = 0; $i < count($item['produto']->platform); $i++)
              @if ($item['produto']->platform[$i] == 'Computador')
              <i class="bi bi-windows"></i>
              @endif
              @if ($item['produto']->platform[$i] == 'Xbox')
              <i class="bi bi-xbox"></i>
              @endif
              @if ($item['produto']->platform[$i] == 'Playstation')
              <i class="bi bi-playstation"></i>
              @endif
              @if ($item['produto']->platform[$i] == 'Nintendo')
              <i class="bi bi-nintendo-switch"></i>
              @endif
              @endfor
            </span>
          </div>
          <div class="valorGame">
            @if ($item['produto']->discount > 0) 
              <span class="discountGame">R$ {{number_format($item['produto']->price,2,",",".")}}</span>
            @endif
            <span class="priceGame">R$ {{number_format($item['produto']->priceDiscount,2,",",".")}}</span>
            <form method="POST" action="/cart/remove">
              @csrf
              <input type="hidden" name="produto_id" value="{{$item['produto']->id}}">
              <a href="" class="removeGame" onclick="event.preventDefault(); this.closest('form').submit();">Remover</a>
            </form>
          </div>
        </div>
        @endforeach
        <div class="total">
          <h5>Subtotal</h5>
          <h5 id="subtotal">R$ {{number_format($totalDiscount,2,",",".")}}</h5>
        </div>
      </div>

      <div class="finalize mt-3 pt-3 pb-3">
        <div class="saved">
          <h5>Valor Economizado</h5>
          <h6>- R$ {{number_format($discount,2,",",".")}}</h6>
        </div>
        <div class="totalPrice">
          <h5>Valor Total</h5>
          <h5>R$ {{number_format($totalDiscount,2,",",".")}}</h5>
        </div>
        <div id="finalizeBtn">
          <button type="submit" class="btn btn-danger">Finalizar Pedido</button>
        </div>
      </div>
      
    </div>

    <div class="payment">
      <div class="titlePayment">
        <h5>Formas de Pagamento</h5>
      </div>
      <div class="d-flex">
        <input class="form-check-input" type="radio" name="creditCard" id="creditCard" checked>
        <div class="paymentMethods ms-2">
          <h5>Cartão de Crédito</h5>
          <p>Parcele sem juros em até 3x ou com juros de 4x a 12x</p>
          <ul>
            <li><i class="visa" title="Visa"></i></li>
            <li><i class="mastercard" title="Mastercard"></i></li>
            <li><i class="elo" title="Elo"></i></li>
          </ul>
        </div>
      </div>
      <div class="d-flex">
        <input class="form-check-input" type="radio" name="paypal" id="paypal">
        <div class="paymentMethods ms-2">
          <h5>Paypal</h5>
          <p>Até 4x sem juros no cartão</p>
          <ul>
            <li><i class="visa" title="Visa"></i></li>
            <li><i class="mastercard" title="Mastercard"></i></li>
            <li><i class="elo" title="Elo"></i></li>
          </ul>
        </div>
      </div>
      <div class="d-flex">
        <input class="form-check-input" type="radio" name="pix" id="pix">
        <div class="paymentMethods ms-2">
          <h5>Pix</h5>
          <p>Informe os mesmos dados registrados no seu CPF</p>
          <ul>
            <li><i class="pix" title="Pix"></i></li>
          </ul>
        </div>
      </div>
      <div class="d-flex">
        <input class="form-check-input" type="radio" name="boleto" id="boleto">
        <div class="paymentMethods ms-2">
          <h5>Boleto Expresso</h5>
          <p>Informe os mesmos dados registrados no seu CPF</p>
          <ul>
            <li><i class="boleto" title="Boleto"></i></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="finalizeMobile mt-3 pt-3 pb-3">
      <div class="saved">
        <h5>Valor Economizado</h5>
        <h6>- R$ {{number_format($discount,2,",",".")}}</h6>
      </div>
      <div class="totalPrice">
        <h5>Valor Total</h5>
        <h5>R$ {{number_format($totalDiscount,2,",",".")}}</h5>
      </div>
      <div id="finalizeBtn">
        <button type="submit" class="btn btn-danger">Finalizar Pedido</button>
      </div>
    </div>

  </div>
</div>

<script src="{{asset('js/cart.js')}}"></script>
@endsection


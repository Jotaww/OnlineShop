@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

<style>
  #borderPedido {
  border-top: 3px solid rgb(161, 0, 194);
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

  <table class="table mt-4" id="tabelaPedidos">
    <thead>
      <tr id="tr">
        <th scope="col" id="th">NÚMERO</th>
        <th scope="col" id="th">PRODUTO</th>
        <th scope="col" id="th">PAGAMENTO</th>
        <th scope="col" id="th">VALOR</th>
        <th scope="col" id="th">SITUAÇÃO</th>
      </tr>
    </thead>
    <tbody>
      <tr id="tr">
        <td colspan="5" id="tdNoResults">Não há pedidos realizados</td>
      </tr>
    </tbody>
  </table>

</div>

<script src="{{asset('js/profile.js')}}"></script>

@endsection


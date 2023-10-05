@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

<style>
#borderConta {
  border-top: 3px solid rgb(0, 225, 255);
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

  <div class="infosBanner mt-4">
    <img src="{{asset('image/jogos/'.auth()->user()->photo)}}" alt="">
    <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="post" id="myForm">
      @csrf
      @method('patch')
      <label for="photo" id="iconPhoto"><i class="bi bi-image"></i></label>
      <input type="file" name="photo" id="photo" onchange="enviarFormulario()">
    </form>
    <div class="ms-3">
      <h3>{{Auth()->user()->name}}</h3>
      <p>{{Auth()->user()->email}}</p>
      <div class="mt-5">
        <p>Criado em: {{ \Carbon\Carbon::parse(Auth()->user()->created_at)->format('d/m/Y')}}</p>
      </div>
    </div>
  </div>

  <div class="minhaConta mt-5">
    <div class="listaMenu">
      <ul>
        <li class="mb-3" id="minhaConta">Minha Conta</li>
        <li id="changePassBtn">Alterar Senha</li>
      </ul>
    </div>
    <div class="infosAccount ms-5" id="infosAccount">
      <h3>Minha Conta</h3>
      <h5>Informação Pública</h5>
      <p>Não serão exibidas publicamente. Se certifique que os dados preenchidos estão corretos e são verdadeiros.</p>
      <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
          <label for="email" class="form-label">Login</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="email" 
          value="{{auth()->user()->email}}" required>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
          value="{{auth()->user()->name}}" required>
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label">Sobrenome</label>
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="lastName"
          value="{{auth()->user()->lastName}}" required>
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF"
          value="{{auth()->user()->cpf}}" required>
        </div>
        <div class="mb-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone"
          value="{{auth()->user()->telefone}}" required>
        </div>
        <div class="mb-3">
          <label for="dataNasc" class="form-label">Data de Nascimento</label>
          <input type="date" class="form-control" id="dataNasc" name="dataNasc" placeholder="Data de Nascimento"
          value="{{auth()->user()->dataNasc}}" required>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>

    <div class="changePass ms-5" id="changePass">
      <h3>Alterar Senha</h3>
      <form method="post" action="{{ route('password.update') }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
          <label for="current_password" class="form-label">Senha atual</label>
          <input  id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Nova senha</label>
          <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" required>
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirmar senha</label>
          <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" required>
        </div>

        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
    
  </div>

</div>

<script src="{{asset('js/profile.js')}}"></script>

@endsection


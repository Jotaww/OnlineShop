@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{asset('css/createGame.css')}}">
<div class="container mt-5">
  <div class="formEdit">
    <form enctype="multipart/form-data" method="post" action="">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Imagem</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      <div class="mb-3">
        <label for="idGame" class="form-label">Id do Jogo</label>
        <input type="text" class="form-control" name="idGame" id="idGame">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Preço</label>
        <input type="text" class="form-control" name="price" id="price">
      </div>
      <div class="mb-3">
        <label for="discount" class="form-label">Desconto</label>
        <input type="text" class="form-control" name="discount" id="discount">
      </div>
      <button type="submit" class="btn btn-success d-flex m-auto mt-3 mb-3">Criar</button>
    </form>
  </div>
</div>
@endsection
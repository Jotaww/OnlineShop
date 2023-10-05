@extends('layouts.admin')

@section('content')
<style>
  #criaJogo {
    background-color: rgb(62, 196, 21)
  }
</style>
<link rel="stylesheet" href="{{asset('css/createGame.css')}}">
<div class="container mt-5">
  <form enctype="multipart/form-data" method="post" action="">
    @csrf
    <div class="mb-3">
      <label for="producer" class="form-label">Produtora</label>
      <input type="text" class="form-control" name="producer" id="producer">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Imagem</label>
      <input type="file" class="form-control" name="image" id="image">
    </div>
    <h5>Plataforma</h5>
    <div class="d-flex mb-3">
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="platform[]" value="Computador" id="Computador">
        <label class="form-check-label" for="Computador">Computador</label>
      </div>
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="platform[]" value="Xbox" id="Xbox">
        <label class="form-check-label" for="Xbox">Xbox</label>
      </div>
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="platform[]" value="Playstation" id="Playstation">
        <label class="form-check-label" for="Playstation">Playstation</label>
      </div>
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="platform[]" value="Nintendo" id="Nintendo">
        <label class="form-check-label" for="Nintendo">Nintendo</label>
      </div>
    </div>
    <div class="mb-3">
      <label for="launch" class="form-label">Lançamento</label>
      <input type="date" class="form-control" name="launch" id="launch">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Preço</label>
      <input type="text" class="form-control" name="price" id="price">
    </div>
    <div class="mb-3">
      <label for="discount" class="form-label">Desconto</label>
      <input type="text" class="form-control" name="discount" id="discount">
    </div>
    <div class="mb-3">
      <label for="about">Sobre</label>
      <textarea class="form-control" id="about" name="about" style="height: 100px"></textarea>
    </div>
    <h5>Categorias</h5>
    <div class="d-flex flex-wrap mb-3">
      @foreach ($genders as $gender)
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="category[]" value="{{$gender->id}}" id="acao">
        <label class="form-check-label" for="acao">{{$gender->name}}</label>
      </div>
      @endforeach
    </div>
    <h5>Modo de Jogo</h5>
    <div class="d-flex flex-wrap mb-3">
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="1" id="umJogador">
        <label class="form-check-label" for="umJogador">Um jogador</label>
      </div>
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="2" id="multijogador">
        <label class="form-check-label" for="multijogador">Multijogador</label>
      </div>
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="3" id="pvp">
        <label class="form-check-label" for="pvp">PvP</label>
      </div>
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="4" id="cooperativo">
        <label class="form-check-label" for="cooperativo">Cooperativo</label>
      </div>
      <div class="form-check me-3">
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="5" id="telaDividida">
        <label class="form-check-label" for="telaDividida">Tela compartilhada/dividida</label>
      </div>
    </div>
    <hr>
    <div class="form-check me-3">
      <input class="form-check-input" type="checkbox" id="requerimentos">
      <label class="form-check-label" for="requerimentos">Requerimentos?</label>
    </div>
    <div class="requerimentosDiv" id="requerimentosDiv">
      <h5>Requisitos Mínimos</h5>
      <div class="mb-3">
        <label for="so" class="form-label">Sistema Operacional</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="so">
      </div>
      <div class="mb-3">
        <label for="armazenamento" class="form-label">Armazenamento</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="armazenamento">
      </div>
      <div class="mb-3">
        <label for="processador" class="form-label">Processador</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="processador">
      </div>
      <div class="mb-3">
        <label for="memoria" class="form-label">Memória</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="memoria">
      </div>
      <div class="mb-3">
        <label for="placaVideo" class="form-label">Placa de vídeo</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="placaVideo">
      </div>
      <h5>Requisitos Recomendados</h5>
      <div class="mb-3">
        <label for="so" class="form-label">Sistema Operacional</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="so">
      </div>
      <div class="mb-3">
        <label for="armazenamento" class="form-label">Armazenamento</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="armazenamento">
      </div>
      <div class="mb-3">
        <label for="processador" class="form-label">Processador</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="processador">
      </div>
      <div class="mb-3">
        <label for="memoria" class="form-label">Memória</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="memoria">
      </div>
      <div class="mb-3">
        <label for="placaVideo" class="form-label">Placa de vídeo</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="placaVideo">
      </div>
    </div>
    
    <button type="submit" class="btn btn-success d-flex m-auto mt-3 mb-3">Criar</button>
  </form>
</div>
@endsection
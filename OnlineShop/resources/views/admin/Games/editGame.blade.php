@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{asset('css/createGame.css')}}">
<div class="container mt-5">
  <form enctype="multipart/form-data" method="post" action="">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="producer" class="form-label">Produtora</label>
      <input type="text" class="form-control" name="producer" id="producer" value="{{$jogo->producer}}">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" name="name" id="name" value="{{$jogo->name}}">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Imagem</label>
      <input type="file" class="form-control" name="image" id="image">
    </div>
    <h5>Plataforma</h5>
    <div class="d-flex mb-3">
      <div class="form-check me-3">
        @for ($i = 0; $i < count($arrayPlatform); $i++)
        @if ($arrayPlatform[$i] == 'Computador')
        <input class="form-check-input" checked type="checkbox" name="platform[]" value="Computador" id="Computador">  
        @else
        <input class="form-check-input" type="checkbox" name="platform[]" value="Computador" id="Computador">    
        @endif
        @endfor
        <label class="form-check-label" for="Computador">Computador</label>
      </div>
      <div class="form-check me-3">
        @for ($i = 0; $i < count($arrayPlatform); $i++)
        @if ($arrayPlatform[$i] == 'Xbox') 
        <input class="form-check-input" checked type="checkbox" name="platform[]" value="Xbox" id="Xbox">
        @else 
        <input class="form-check-input" type="checkbox" name="platform[]" value="Xbox" id="Xbox">
        @endif
        @endfor
        <label class="form-check-label" for="Xbox">Xbox</label>
      </div>
      <div class="form-check me-3">
        @for ($i = 0; $i < count($arrayPlatform); $i++)
        @if ($arrayPlatform[$i] == 'Playstation') 
        <input class="form-check-input" checked type="checkbox" name="platform[]" value="Playstation" id="Playstation">
        @else 
        <input class="form-check-input" type="checkbox" name="platform[]" value="Playstation" id="Playstation">
        @endif
        @endfor
        <label class="form-check-label" for="Playstation">Playstation</label>
      </div>
      <div class="form-check me-3">
        @for ($i = 0; $i < count($arrayPlatform); $i++)
        @if ($arrayPlatform[$i] == 'Nintendo') 
        <input class="form-check-input" checked type="checkbox" name="platform[]" value="Nintendo" id="Nintendo">
        @else 
        <input class="form-check-input" type="checkbox" name="platform[]" value="Nintendo" id="Nintendo">
        @endif
        @endfor
        <label class="form-check-label" for="Nintendo">Nintendo</label>
      </div>
    </div>
    <div class="mb-3">
      <label for="launch" class="form-label">Lançamento</label>
      <input type="date" class="form-control" name="launch" id="launch" value="{{$jogo->launch}}">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Preço</label>
      <input type="text" class="form-control" name="price" id="price" value="{{$jogo->price}}">
    </div>
    <div class="mb-3">
      <label for="discount" class="form-label">Desconto</label>
      <input type="text" class="form-control" name="discount" id="discount" value="{{$jogo->discount}}">
    </div>
    <div class="mb-3">
      <label for="about">Sobre</label>
      <textarea class="form-control" id="about" name="about" style="height: 100px">{{$jogo->about}}</textarea>
    </div>
    <h5>Categorias</h5>
    <div class="d-flex flex-wrap mb-3">
      @foreach ($genders as $gender)
      <div class="form-check me-3">
        @if (in_array($gender->id, $arrayCategory))
        <input class="form-check-input" checked type="checkbox" name="category[]" value="{{$gender->id}}" id="acao">
        @else
        <input class="form-check-input" type="checkbox" name="category[]" value="{{$gender->id}}" id="acao">
        @endif
        <label class="form-check-label" for="acao">{{$gender->name}}</label>
      </div>
      @endforeach
    </div>
    <h5>Modo de Jogo</h5>
    <div class="d-flex flex-wrap mb-3">
      <div class="form-check me-3">
        @if (in_array('1', $arrayCategory)) 
        <input class="form-check-input" checked type="checkbox" name="modoJogo[]" value="1" id="umJogador">
        @else 
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="1" id="umJogador">
        @endif
        <label class="form-check-label" for="umJogador">Um jogador</label>
      </div>
      <div class="form-check me-3">
        @if (in_array('2', $arrayCategory)) 
        <input class="form-check-input" checked type="checkbox" name="modoJogo[]" value="2" id="multijogador">
        @else 
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="2" id="multijogador">
        @endif
        <label class="form-check-label" for="multijogador">Multijogador</label>
      </div>
      <div class="form-check me-3">
        @if (in_array('3', $arrayCategory)) 
        <input class="form-check-input" checked type="checkbox" name="modoJogo[]" value="3" id="pvp">
        @else 
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="3" id="pvp">
        @endif
        <label class="form-check-label" for="pvp">PvP</label>
      </div>
      <div class="form-check me-3">
        @if (in_array('4', $arrayCategory)) 
        <input class="form-check-input" checked type="checkbox" name="modoJogo[]" value="4" id="cooperativo">
        @else 
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="4" id="cooperativo">
        @endif
        <label class="form-check-label" for="cooperativo">Cooperativo</label>
      </div>
      <div class="form-check me-3">
        @if (in_array('5', $arrayCategory)) 
        <input class="form-check-input" checked type="checkbox" name="modoJogo[]" value="5" id="telaDividida">
        @else 
        <input class="form-check-input" type="checkbox" name="modoJogo[]" value="5" id="telaDividida">
        @endif
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
        <input type="text" class="form-control" name="reqMinimos[]" id="so" value="{{$arrayReqMinimos[0]}}">
      </div>
      <div class="mb-3">
        <label for="armazenamento" class="form-label">Armazenamento</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="armazenamento" value="{{$arrayReqMinimos[1]}}">
      </div>
      <div class="mb-3">
        <label for="processador" class="form-label">Processador</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="processador" value="{{$arrayReqMinimos[2]}}">
      </div>
      <div class="mb-3">
        <label for="memoria" class="form-label">Memória</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="memoria" value="{{$arrayReqMinimos[3]}}">
      </div>
      <div class="mb-3">
        <label for="placaVideo" class="form-label">Placa de vídeo</label>
        <input type="text" class="form-control" name="reqMinimos[]" id="placaVideo" value="{{$arrayReqMinimos[4]}}">
      </div>
      <h5>Requisitos Recomendados</h5>
      <div class="mb-3">
        <label for="so" class="form-label">Sistema Operacional</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="so" value="{{$arrayReqRecomendados[0]}}">
      </div>
      <div class="mb-3">
        <label for="armazenamento" class="form-label">Armazenamento</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="armazenamento" value="{{$arrayReqRecomendados[1]}}">
      </div>
      <div class="mb-3">
        <label for="processador" class="form-label">Processador</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="processador" value="{{$arrayReqRecomendados[2]}}">
      </div>
      <div class="mb-3">
        <label for="memoria" class="form-label">Memória</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="memoria" value="{{$arrayReqRecomendados[3]}}">
      </div>
      <div class="mb-3">
        <label for="placaVideo" class="form-label">Placa de vídeo</label>
        <input type="text" class="form-control" name="reqRecomendados[]" id="placaVideo" value="{{$arrayReqRecomendados[4]}}">
      </div>
    </div>
    
    <button type="submit" class="btn btn-success d-flex m-auto mt-3 mb-3">Atualizar</button>
  </form>
</div>
@endsection
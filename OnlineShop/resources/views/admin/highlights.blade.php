@extends('layouts.admin')

@section('content')

<style>
    #highlights {
      background-color: rgb(62, 196, 21)
    }
</style>

<div class="container pt-4 pb-4">

  <table class="hover stripe mb-5" id="example">
    <thead>
      <tr>
          <th>ID</th>
          <th>Imagem</th>
          <th>idGame</th>
          <th></th>
      </tr>
      </thead>
      <tbody>
          @foreach ($highlights as $highlight)
          <tr>
              <td>{{$highlight->id}}</td>
              <td>{{$highlight->image}}</td>
              <td>{{$highlight->idGame}}</td>
              <td>
                <form method="POST" action="/admin/delete/highlight/{{$highlight->id}}">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  
  <form enctype="multipart/form-data" method="post" action="">
    @csrf
    <div class="mb-3">
      <label for="image" class="form-label">Imagem</label>
      <input type="file" class="form-control" name="image" id="image">
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
      <label for="idGame" class="form-label">ID do jogo</label>
      <input type="text" class="form-control" name="idGame" id="idGame">
    </div>
    <button type="submit" class="btn btn-success d-flex m-auto mt-3 mb-3">Criar</button>
  </form>

</div>
@endsection
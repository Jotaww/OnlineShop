@extends('layouts.admin')

@section('content')

<style>
    #genders {
      background-color: rgb(62, 196, 21)
    }
</style>

<div class="container pt-4 pb-4">

  <table class="hover stripe mb-5" id="example">
    <thead>
      <tr>
          <th>ID</th>
          <th>Gênero</th>
          <th></th>
      </tr>
      </thead>
      <tbody>
          @foreach ($genders as $gender)
          <tr>
              <td>{{$gender->id}}</td>
              <td>{{$gender->name}}</td>
              <td>
                <form method="POST" action="/admin/delete/gender/{{$gender->id}}">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  
  <form method="post" action="">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <button type="submit" class="btn btn-success d-flex m-auto mt-3 mb-3">Criar</button>
  </form>

</div>
@endsection
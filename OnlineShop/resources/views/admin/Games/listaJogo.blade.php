@extends('layouts.admin')

@section('content')
<style>
    #listaJogo {
        background-color: rgb(62, 196, 21)
    }
</style>

<div class="container pt-4 pb-4">
    <table id="example" class="hover stripe">
      <thead>
        <tr>
            <th>Produtora</th>
            <th>Nome</th>
            <th>Lançamento</th>
            <th>Preço</th>
            <th>Desconto</th>
            <th><a href="/admin/create/game" class="btn btn-success btn-sm">Criar</a></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($jogos as $jogo)
            <tr>
                <td>{{$jogo->producer}}</td>
                <td>{{$jogo->name}}</td>
                <td>{{$jogo->launch}}</td>
                <td>{{$jogo->price}}</td>
                <td>{{$jogo->discount}}</td>
                <td class="d-flex">
                    <a href="/admin/edit/game/{{$jogo->id}}" class="btn btn-primary btn-sm me-1">Editar</a>
                    <form method="POST" action="/admin/delete/game/{{$jogo->id}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
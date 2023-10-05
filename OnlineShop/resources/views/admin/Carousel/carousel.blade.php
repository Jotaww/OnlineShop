@extends('layouts.admin')

@section('content')

<style>
    #carrosel {
      background-color: rgb(62, 196, 21)
    }
</style>

<div class="container pt-4 pb-4">
    <table class="hover stripe" id="example">
      <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Link</th>
            <th>
                @if (count($carousels) < 9)
                <a href="/admin/create/carousel" class="btn btn-success btn-sm">Criar</a>
                @endif
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach ($carousels as $carousel)
            <tr>
                <td>{{$carousel->id}}</td>
                <td>{{$carousel->image}}</td>
                <td>{{$carousel->link}}</td>
                <td class="d-flex">
                    <a href="/admin/edit/carousel/{{$carousel->id}}" class="btn btn-primary btn-sm me-1">Editar</a>
                    <form method="POST" action="/admin/delete/carousel/{{$carousel->id}}">
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
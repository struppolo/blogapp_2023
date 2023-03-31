@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Contenuto</th>
            <th scope="col">Autore</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
            <td class="align-middle"><a href="{{route('posts.show',$post->id)}}"">{{ $post->titolo }}</a></td>
            <td class="align-middle">{{ $post->contenuto }}</td>
            <td class="align-middle">{{ $post->user->name }}</td>
            <td>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning me-2">Modifica</a>
                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

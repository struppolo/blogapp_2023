@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Contenuto</th>
            <th scope="col" colspan="2">Azioni</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
            <td class="align-middle"><a href="{{route('posts.show',$post->id)}}"">{{ $post->titolo }}</a></td>
            <td class="align-middle">{{ $post->contenuto }}</td>
         
            <td>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning me-2">Modifica</a></td>
                <td>
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

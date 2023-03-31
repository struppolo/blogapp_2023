@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica post: {{$post->titolo}}</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @method('patch')
        @csrf
        <label>Titolo</label>
        <input type="text" name="titolo" class="form-control mb-3" value="{{ $post->titolo }}" />
        <label>Contenuto</label>
        <textarea name="contenuto" class="form-control mb-4">{{ $post->contenuto }}</textarea>
        <button class="btn btn-primary" type="submit">Salva modifiche</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea post</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <label>Titolo</label>
        <input type="text" name="titolo" class="form-control" />
        <label>Contenuto</label>
        <input type="text" name="contenuto" class="form-control mb-4" />
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<form action="{{ route('posts.store') }}" method="post">
@csrf
Titolo <input type="text" name="titolo" class="form-control" />
Testo <input type="text" name="contenuto" class="form-control" />
<button type="submit">Invia</button>
</form>
@endsection
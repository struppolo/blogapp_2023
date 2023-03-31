@extends('layouts.app')

@section('content')
Titolo: {{ $post->titolo}}<br />
Contenuto: {{ $post->contenuto}}<br />
Creato il {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i')}} da {{ $post->user->name }}
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Home Page</title>
</head>
<body>
    <div class="container" >
       
    <div class="jumbotron">
      <h1 class="display-4">My Blog App</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
     
    </div>
   
<h2>Lista ultimi posts</h2>
@foreach ($posts as $post)
<div class="card">
  <div class="card-header"><b>{{ $post->titolo }}</b></div>
  <div class="card-body">
    {{ $post->contenuto }} 
  </div>
  <div class="card-footer">
{{ $post->user->name}} - Inserito il {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}
  </div>
</div>
   <br />
@endforeach
{{ $posts->links() }}
<a href="{{ route('login')}}">Area riservata</a>
</div>
</body>
</html>
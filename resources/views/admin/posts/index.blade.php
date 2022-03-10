<title>index</title>
<a href="{{route('create')}}">Criar novo post</a>
<hr>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<h1>Posts</h1>

@foreach ($posts as $post)
    <p>
        {{ $post->title }}
        [
            <a href="{{route('show', $post->id)}}">Ver</a> |
            <a href="{{route('edit', $post->id)}}">Editar</a>
        ]
    </p>
    
@endforeach
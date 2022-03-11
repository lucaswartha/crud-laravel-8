<title>index</title>
<a href="{{route('posts.create')}}">Criar novo post</a>
<hr>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('posts.search') }}" method="POST">
    @csrf
    <a href="{{ route('posts.index') }}">Visualizar todas vagas</a>
    <input type="text" name="search" placeholder="Pesquisar">
    <button type="submit">Filtrar</button>
</form>

<h1>Posts</h1>

@foreach ($posts as $post)
    <p>
        {{ $post->title }}
        [
            <a href="{{route('posts.show', $post->id)}}">Ver</a> |
            <a href="{{route('posts.edit', $post->id)}}">Editar</a>
        ]
    </p>
    
@endforeach
<hr>
@if (isset($filters))
{{ $posts->appends($filters)->links() }}
@else 
{{ $posts->links() }}
@endif
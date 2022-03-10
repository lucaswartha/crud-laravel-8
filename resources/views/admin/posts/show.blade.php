<h1>Detalhes do post {{$post->title}}</h1>
<ul>
    <li style="list-style: none"> <strong>Título: </strong> {{ $post->title }} </li>
    <li style="list-style: none"> <strong>Descrição: </strong> {{ $post->content }} </li>
</ul>

<form action="{{ route('destroy', $post->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar o post {{ $post->title }}</button>
</form>
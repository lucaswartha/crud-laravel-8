<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate();

        return view('admin.posts.index', compact('posts'));

    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('message', 'Post criado com sucesso');
    }

    public function show($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show', compact('post'));

    }

    public function destroy($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        $post->delete();
        return redirect()
            ->route('posts.index')
            ->with('message', 'Post deletado com sucesso!');
    }

    public function edit($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->back();
        }

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        $post->update($request->all());
        return redirect()->route('posts.index')
            ->with('message', 'Post editado com sucesso');

    }

    public function search(Request $request){
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                            ->orWhere('content', 'LIKE', "%{$request->search}%")
                            ->paginate(1);
        return view('admin.posts.index', compact('posts', 'filters'));
    }   
}

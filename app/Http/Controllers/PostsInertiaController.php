<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsInertiaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Inertia\Response
     */
    public function index()
    {
        return inertia("Posts/ListPosts", [ 'value' => Post::getListData() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Livewire\Request
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        return inertia("Posts/CreatePost");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());
        $post->save();
        return inertia(
            "Posts/EditPostLayout",
            [
                'value' => $post->only('id', 'title', 'content'),
                'edit' => true
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  string $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return inertia(
            'Posts/EditPostLayout',
            [
                'value' => $post,
                'edit' => false
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return inertia('Posts/EditPostLayout', [
            'value' => $post, 'edit' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Inertia\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->id){
            $post->fill($request->all());
            $post->save();
        }
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Inertia\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post && $post->id) {
            $post->delete();
        }
        return inertia("Posts\ListPosts", [
            'value' => $post,
            'edit' => false
        ]);
    }
}

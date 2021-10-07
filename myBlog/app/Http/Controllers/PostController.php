<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('user')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs = request()->validate([
            'title' => 'required|min:2|max:255',
            'post_image' => 'file',
            'body' => 'required|min:2|max:255',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = $request->file('post_image')->store('avatars2', 'public');
        }

        // auth()->user()->posts()->create($inputs);

        $currentUser = User::with('posts')->find(Auth::id());
        $currentUser->posts()->create($inputs);
        return redirect('/admin/post')->with('success', 'You have created a post !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blog-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $inputs = request()->validate([
            'title' => 'required|min:2|max:255',
            'post_image' => 'file',
            'body' => 'required|min:2|max:255',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = $request->file('post_image')->store('avatars2', 'public');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->save();

        return redirect('/admin/post')->with('success', 'You have updated the post  !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return back()->with('warning', 'You have delete the item !');
    }
}

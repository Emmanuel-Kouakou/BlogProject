<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all(); or

       // Je veux les différents posts suivi de leurs catégories et users
        $posts = Post::with('category', 'user')->latest()->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // Formulaire de création
    public function create()
    {
        //
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
        $imageName = $request->image->store('posts');

        Post::create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imageName,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id
            ] 
            );

            return redirect()->route('dashboard')->with('success', 'Votre post a été créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        //
        $arrayUpdate = [
            'title' =>$request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ];

        if ($request->image != null) {
            $imageName = $request->image->store('posts');

            $arrayUpdate = array_merge($arrayUpdate, ['image' => $imageName]);

        }

        $post->update($arrayUpdate);

        return redirect()->route('dashboard')->with('success', 'Votre post a été modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Votre post a été supprimé avec succès');

    }
}

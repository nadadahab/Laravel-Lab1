<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
       $posts = Post::with('user')paginate(2);
 
        // $post = $posts->first();

        return view('posts.index',[

            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $input=$request->only(['title','description','user_id']);
        Post::create($input);
        
       return redirect(route('posts.index')); 
    }
    public function edit($id)
    {
        $users = User::all();

        $post = Post::find($id);
        return view('posts.edit',[
            'post' => $post,
            'users' => $users
        ]);
    }


    public function update(UpdatePostRequest $request,$id)
    {
       
	
        $post = Post::findOrFail($id);
        $post->slug=null;
        $post ->update($request->all());
        return redirect()->route('posts.index');
    }
    public function delete($id)
    {
       
      
        $post = Post::find($id);
        $post->delete();
        return redirect(route('posts.index'));
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',[
            'post' => $post
        ]);
    

    }


}

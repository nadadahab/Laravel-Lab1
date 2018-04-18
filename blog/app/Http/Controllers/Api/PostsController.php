<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


class PostsController extends Controller
{
    public function index()
    {
       $posts = Post::paginate(2);
        return PostResource::collection($posts);
    }
     public function store(StorePostRequest $request)
    {
        $input=$request->only(['title','description','user_id']);
        $post=Post::create($input);
       return new PostResource($post) ; 

    }
    
    
}

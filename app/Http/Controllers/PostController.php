<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller{
    public function index(){

        $posts = Post::latest();

        if(request('search')){
            $posts->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            "title" => "All Posts",
            "posts" => $posts->paginate(7)
        ]);
    }

 
    public function show(Post $post){
        return view('post',[
            "title" => "Single Post",
            "posts" => $post
        ]);
    }}
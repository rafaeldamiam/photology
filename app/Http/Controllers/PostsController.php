<?php

namespace Photology\Http\Controllers;

use Illuminate\Http\Request;
use Photology\User;
use Photology\Post;

class PostsController extends Controller

{

   public function __construct()

   {

       $this->middleware('auth');

   }

   public function index(){
        $id = auth()->id();
        //dd($id);
        $posts = Post::all()->where('user_id', $id);
        $user = User::all()->where('id', $id);
        //dd($user);
        return view('posts.list')->with('posts', $posts)->with('user', $user);

   }

   public function create() {

       return view('posts.create');

   }

   public function store(){

       request()->validate([

           'image_path' => ['required', 'image']          

       ]);      

       $post = Post::create([

           'user_id' => auth()->id(),

           'image_path' => request()->file('image_path')->store('posts', 'public'),

           'description' => request('description'),

           'filter' => request('filter'),

           'likes' => 0

       ])->save();

       return redirect('home');

   }

}
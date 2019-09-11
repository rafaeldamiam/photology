<?php

namespace Photology\Http\Controllers;

use Illuminate\Http\Request;
use Photology\User;
use Photology\Post;
use Photology\Like;

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
        return view('posts.list', compact('posts', 'user'));

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

           'filter' => request('filter')

       ])->save();

       return redirect('home');

   }

   public function like($post_id){
        $a = Like::select('like_id')
            ->where('user_id', auth()->id())
            ->where('post_id', $post_id)
            ->get();
        if (count($a) == 0){
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post_id
            ])->save();
    
        }
        //dd($post_id);
        
        return redirect()->back();
   }

    public function unlike(Request $data){
        $post_like = Post::findOrFail($data['idPost']);
        $post_like->likes -= 1;
        $post_like->save();
        return redirect()->back();
    }

}
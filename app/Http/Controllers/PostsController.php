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
        $posts = Post::select('*')->join('users', 'posts.user_id', '=', 'users.id')->get();
        $like = Like::join('posts', 'posts.user_id', '=', 'likes.user_id')->get();
        return view('posts.list')->with('posts', $posts)->with('like', $like);
        //$id = auth()->id();
        //dd($id);
        //$posts = Post::all()->where('user_id', $id);
        //$user = User::all()->where('id', $id);
        //dd($user);
        //return view('posts.list', compact('posts', 'user'));

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

           'like' => 0

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
            $post_like = Post::findOrFail($post_id);
            $post_like->like += 1;
            $post_like->save();

            //dd($post_like);
    
        }
        
        return redirect()->back();
   }

    public function unlike($post_id){
        $a = Like::select('like_id')
            ->where('user_id', auth()->id())
            ->where('post_id', $post_id)
            ->get();
        $b = Post::select('')
            ->where('post_id', $post_id)
            ->get();
        if ($a->like_id =! 0){
            Like::destroy($a->like_id);
            $post_like = Post::findOrFail($post_id);
            $post_like->like -= 1;
            $post_like->save();
            //dd($post_like);
    
        }
        
        return redirect()->back();
    }

}
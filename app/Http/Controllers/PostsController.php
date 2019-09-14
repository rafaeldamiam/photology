<?php

namespace Photology\Http\Controllers;

use Illuminate\Http\Request;
use Photology\User;
use Photology\Post;
use Photology\Like;
use Photology\Comments;

class PostsController extends Controller

{

   public function __construct()

   {

       $this->middleware('auth');

   }

   public function index(){
        $posts = Post::select('posts.id','posts.user_id','posts.image_path','posts.description','posts.like','posts.created_at','users.name')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->where('posts.user_id', auth()->id())
        ->where('users.id', auth()->id())
        ->get();
        $like = Like::join('posts', 'posts.user_id', '=', 'likes.user_id')->get();
        $comment = Comments::select('comments.text', 'comments.post_id', 'users.name')
        ->join('posts', 'posts.id', '=', 'comments.post_id')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->get();
        return view('home')->with('posts', $posts)->with('like', $like)->with('comment', $comment);
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
        }
        
        return redirect()->back();
    }

    public function unlike($post_id){
        $a = Like::where('post_id', '=', $post_id)->where('user_id', '=', auth()->id())->delete();
        if($a == 1){
            $post_like = Post::findOrFail($post_id);
            $post_like->like -= 1;
            $post_like->save();
        }
        return redirect()->back();
    }

    public function comments(Request $request){
        Comments::create([
            'user_id' => auth()->user()->id,
            'post_id' => request('post_id'),
            'text' => request('text')
        ])->save();

        return redirect()->back();
    }

}
<?php

namespace Photology\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Photology\User;
use Photology\Post;
use Photology\Like;
use Photology\Comments;

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth', ['except' => 'index']);

    }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {  

        if (Auth::check()){            

            return redirect('home');

        }

        return view('welcome');        

    }

    public function home(){
        $posts = Post::select('posts.id','posts.user_id','posts.image_path','posts.description','posts.like','posts.created_at','users.name')
        ->join('users', 'users.id', '=', 'posts.user_id')->get();
        $like = Like::join('posts', 'posts.user_id', '=', 'likes.user_id')->get();
        $comment = Comments::select('comments.text', 'comments.post_id', 'users.name', 'comments.user_id', 'comments.comment_id')
        ->join('posts', 'posts.id', '=', 'comments.post_id')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->get();
        return view('home')->with('posts', $posts)->with('like', $like)->with('comment', $comment);

    }

}

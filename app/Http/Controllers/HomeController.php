<?php

namespace Photology\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Photology\User;
use Photology\Post;
use Photology\Like;

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
        //$posts = Post::all();
        $posts = Post::select('*')->join('users', 'posts.user_id', '=', 'users.id')->get();
        $like = Like::join('posts', 'posts.user_id', '=', 'likes.user_id')->get();
        return view('home')->with('posts', $posts)->with('like', $like);

    }

}

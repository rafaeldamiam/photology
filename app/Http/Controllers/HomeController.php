<?php

namespace Photology\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Photology\Post;

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
        $posts = Post::all();
        return view('home')->with('posts', $posts);

    }

}

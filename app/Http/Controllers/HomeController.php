<?php

namespace Photology\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Photology\User;
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
        //$id = $posts->id;
        //dd($id);
        //foreach($posts as $post){ 
        //    $user = User::all()->where('id', $post->id);
        //    return view('home')->with('posts', $posts)->with('user', $user);
        //}
        //dd($user);
        //$leagues = DB::table('leagues')
        //->select('league_name')
        //->join('countries', 'countries.country_id', '=', 'leagues.country_id')
        //->where('countries.country_name', $country)
        //->get();
        return view('home')->with('posts', $posts);

    }

}

@extends('layouts.app')

@section('content')

<div class="container">

<div class="row justify-content-center">
    @if(count($posts)== 0)
        <div class="text-center">
            <h1>Está vazio!!</h1><br>
            <h2>Crie um Postagem e compartilhe com o mundo!</h2><br>
            <h3>\(◉⩊◉)/</h3>
        </div>
    @else
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card mt-4">
                    @foreach ($user as $users)
                        <div class="card-body">
                            <h3 class="" style="text-transform:capitalize;">{{$users->name}}</h3>
                        </div>
                    @endforeach 
                    <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap" style="padding:10%;">
                    <div class="card-body">
                        <p>Descrição: {{$post->description}}</p> 

                        @if ($post->likes == 0)
                            <a class="btn" href="{{route('like', ['idPost' => $post->id])}}">
                                Like: <img src="{{ asset('images/like.svg') }}">
                            </a>
                        @else
                            <a class="btn" href="{{route('unlike', ['idPost' => $post->id])}}">
                                {{$post->likes}} Like: <img src="{{ asset('images/like.svg') }}">
                            </a>
                        @endif 
                        <p>Comentarios: {{$post->coments}}</p>
                    </div>
                </div>   
            @endforeach
        </div>
    @endif
</div>

</div>

@endsection
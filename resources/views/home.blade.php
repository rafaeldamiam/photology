@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">
       
           @foreach ($posts as $post)
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="" style="text-transform:capitalize;">{{$post->name}}</h3>
                        <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap" style="padding:10%;">
                        <p>Descrição: {{$post->description}}</p> 

                        <a class="btn" href="{{route('like', ['idPost' => $post->id])}}">
                            {{$post->like}} Like: <img width="110%" src="{{ asset('images/like.svg') }}">
                        </a>
                        <br>
                        <a class="btn" href="{{route('unlike', ['idPost' => $post->id])}}">
                            {{$post->like}} Dislike: <img width="75%" src="{{ asset('images/dislike.svg') }}">
                        </a>
                        
                        <p>Comentarios: {{$post->coments}}</p>
                    </div>
                </div>
            @endforeach   

       </div>

   </div>

</div>
@endsection

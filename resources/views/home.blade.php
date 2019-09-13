@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">
       
           @foreach ($posts as $post)
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="" style="text-transform:capitalize;">{{$post->name}}</h3>
                    </div> 
                    

                   <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap" style="padding:10%;">
                   <div class="card-body">
                        <p>Descrição: {{$post->description}}</p> 
                        @foreach ($like as $likes)
                                    <a class="btn" href="{{route('like', ['idPost' => $post->id])}}">
                                    Curtidas: {{$post->like}} <img src="{{ asset('images/like.svg') }}" width="110%">
                                    </a>
                               
                                    <a class="btn" href="{{route('unlike', ['idPost' => $post->id])}}">
                                    Curtidas: {{$post->like}} <img src="{{ asset('images/dislike.svg') }}" width="75%">
                                    </a>

                        @endforeach
                        <p>Comentarios: {{$post->coments}}</p>
                    </div>

               </div>   

           @endforeach

       </div>

   </div>

</div>
@endsection

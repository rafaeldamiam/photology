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
                        
                        <p>Comentarios:</p>
                        <form action="{{route('comments')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="text">
                            </div>
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <button type="submit" class="btn btn-dark">Comentar</button>
                        </form>
                        @foreach($comment as $comments)
                            @if ($comments->post_id == $post->id)
                                <p>{{$comments->text}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach   

       </div>

   </div>

</div>
@endsection

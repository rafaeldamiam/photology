@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">
       
           @foreach ($posts as $post)
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 style="text-transform:capitalize;">{{$post->name}}</h3>
                        <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap" style="padding:10%;">
                        <p><strong>Postado em:</strong> {{$post->created_at}}</p>
                        <p><strong>Descrição:</strong> {{$post->description}}</p> 
                        <p><strong>Likes:</strong> {{$post->like}}</p>
                        <div class='row text-left'>
                            <div class='col-md-2'>
                                <a class="btn" href="{{route('like', ['idPost' => $post->id])}}">
                                    Like: <img width="100%" src="{{ asset('images/like.svg') }}">
                                </a>
                            </div>
                            <div class='col-md-2'>
                                <a class="btn" href="{{route('unlike', ['idPost' => $post->id])}}">
                                    Dislike: <img width="75%" src="{{ asset('images/dislike.svg') }}">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <form action="{{route('comments')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class='row'>
                                    <div class='col-md-10'>
                                        <input type="text" class="form-control" name="text">
                                    </div>
                                    <div class='col-md-2'>
                                        <button type="submit" class="btn btn-dark">Comentar</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                        </form>
                    </div>

                    <div class="card-body">
                        <p><strong>Comentários:</strong></p>
                        @foreach($comment as $comments)
                            @if ($comments->post_id == $post->id)
                                <div class='row'>
                                    <div class='col-md-10'>
                                        <p class="card-img" style="text-transform:capitalize;"><strong>{{$comments->name}}:</strong> {{$comments->text}}</p>
                                    </div>
                                    <div class='col-md-2'>
                                        @if ($comments->user_id == auth()->user()->id)
                                            <a href="{{route('uncomments', ['comment_id' => $comments->comment_id])}}">Excluir</a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            @endforeach   

       </div>

   </div>

</div>
@endsection

@extends('layouts.app')

@section('content')

@if(!empty($posts))
<div class="container">

<div class="row justify-content-center">

    <div class="col-md-8">

        @foreach ($posts as $post)
                <div class="card mt-4">
                    @foreach ($user as $users)
                        <h3 class="" style="text-transform='capitalize';">{{$users->name}}</h3>
                    @endforeach

                <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                <div class="card-body">Descrição: {{$post->description}}</div>
                
                <div class="card-body">Likes: {{$post->likes}}</div>
                <img src="{{ asset('images/like.png') }}">

                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                        <textarea type="text" name="comment" class="form-control"></textarea>
                        </div>
                    
                        <div class="form-group">
                        <button type="submit" class="btn btn-dark">Comentar</button>
                        </div>
                    </form>
            </div>   

        @endforeach

    </div>

</div>

</div>
@else
<h1>a</h1>
@endif
@endsection
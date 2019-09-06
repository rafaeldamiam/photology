@extends('layouts.app')

@section('content')

<div class="container text-center">



 <h2>Nova publicação</h2>

  <form method="POST" enctype="multipart/form-data" action="/posts">
    @csrf

    <div class="form-group">
      <label for="description">Descrição</label>
      <textarea type="text" name="description" class="form-control"></textarea>
    </div>

    <div class="form-group"> 
      <label for="filter">Filtro:</label>
      <input type="text" name="filter" class="form-control">
    </div>

    <div class="form-group">
      <label for="image_path">Arquivo:</label>
      <input type="file" name="image_path" class="form-control">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-dark">Postar</button>
    </div>

  </form>

</div>

@endsection
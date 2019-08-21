@extends('layouts.app')

@section('content')

<div class="container text-center">

   

           <h1>Nova publicação</h1>

           <form method="POST" enctype="multipart/form-data" action="/posts">

         

               @csrf
               <div class="row">
               <div class="col-md-8">

               Descrição<textarea type="text" name="description"></textarea>

         

               Filter:<input type="text" name="filter">

         

               Arquivo:<input type="file" name="image_path">

         

               <button type="submit">vai</button>

           </form>

       </div>

   </div>

</div>

@endsection
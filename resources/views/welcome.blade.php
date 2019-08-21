@extends('layouts.guest')

@section('content')

    <div class="row">

        <div class="col-lg-5 offset-lg-1 col-xl-4 offset-xl-2 welcome-left d-flex align-items-center justify-content-center ">              

        </div>

        <div class="col-lg-5 col-xl-5 welcome-right ">

            @include('forms.register', ['clases'=>'col-md-12'])                

        </div>

    </div>

@endsection
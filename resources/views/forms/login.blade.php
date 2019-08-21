<div class="login">

    <div class="row">

        <div class="offset-md-4 col-md-4 border text-center p-8 bg-white">            

            <img class="text-center" src="{{ asset('images/logo.png') }}" >

               

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="form-group row">                    

                    <div class="col-md-12">

                        <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required="" autofocus="">

                        @if ($errors->has('email'))

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $errors->first('email') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>

                <div class="form-group row">                    

                    <div class="col-md-12">

                        <input placeholder="senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required="">

                        @if ($errors->has('password'))

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $errors->first('password') }}</strong>

                            </span>

                        @endif

                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-md-6 offset-md-3">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" name="remember" id="remember">

                            <label class="form-check-label" for="remember">

                                Recordar-me

                            </label>

                        </div>

                    </div>

                </div>

                <div class="form-group row mt-0">

                    <div class="col-md-12">

                        <button type="submit" class="btn btn-primary">

                            Entrar

                        </button>

                 

                    </div>

                </div>

            </form>

               

           

        </div>

    </div>

   <div class="row mt-4">

    <div class="offset-md-4 col-md-4 bg-white border text-center">

        <p class="m-3">

            Não tem uma conta? <a href="{{ route('register') }}">Registre-se</a>

        </p>

    </div>

    </div>

</div>
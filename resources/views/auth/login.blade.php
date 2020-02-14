@extends('layouts.app')

@section('content')

<!-- <div class="container row">
<div class="row">
</div>
<div class="row">
</div>
  <div class="card col s4 offset-s4">

    <div class="row">
    </div>
    <div class="row">
      <div class="col s12 center">
        Mouqarpox
      </div>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input id="mail" type="text" class="validate form-control @error('mail') is-invalid @enderror" value="{{ old('mail') }}" required>
          <label for="mail">Votre mail</label>
          @error('mail')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6 offset-s3">
          <input id="password" type="password" class="validate form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
          <label for="password">Mot de passe</label>
          <a href="" class="right">Mot de passe oublié ?</a>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      </div>

      <div class="row">
      </div>

      <div class="row">
        <div class="col s12 center">
          <button class="btn waves-effect waves-light light-green" type="submit" name="action">
            Connectez vous !
          </button>
        </div>
      </div>
      <div class="row">
      </div>

    </form>
    <div class="row">
      <div class="col s8 offset-s2">
        <hr/>
      </div>
    </div>
    <div class="row">
      <div class="col s12 center">
        <button class="btn waves-effect waves-light  blue darken-4" type="submit" name="action">
          Connexion via Facebook
        </button>
      </div>
    </div>
    <div class="row">
    </div>

  </div>
</div>

<div class="container row">
  <div class="card col s4 offset-s4 center">
  <div class="row">
  </div>
    <a href="{{ route('register') }}">Nouveau sur Mouqarpox ? Inscrivez-vous !</a>
    <div class="row">
    </div>
  </div>
</div> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

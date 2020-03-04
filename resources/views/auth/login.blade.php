@extends('layouts.app')

@section('content')

<div class="container row">
<div class="row">
</div>
<div class="row">
</div>
  <div class="card col l4 offset-l4 m6 offset-m3 s10 offset-1">

    <div class="row">
    </div>
    <div class="row">
      <div class="col s12 center">
      <img src="{{asset('images/logo.svg')}}" alt="logo mouqarpox" class="responsive-img">
      </div>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="row">
        <div class="input-field col s8 offset-s2">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <label for="email">Votre mail</label>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8 offset-s2">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <label for="password">Mot de passe</label>
          <a href="{{ route('password.request') }}" class="right">Mot de passe oublié ?</a>
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
            Se connecter
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
        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-primary"><i class="fab fa-google"></i> Google</a>
      </div>
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
</div>

<div class="container row">
<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">

    </div>
</div>
</div>

@endsection

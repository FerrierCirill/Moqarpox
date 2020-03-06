@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="card col l6 offset-l3 m6 offset-m3 s10 offset-1">
            <div class="card">
                <div class="card-header center">Réinitialiser votre mot de passe</div>

                <div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-field col s8 offset-s1">
                            <label for="email">Adresse mail *</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-field col s6 offset-s1">
                            <label for="password">Mot de passe *</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="input-field col s6 offset-s1">
                            <label for="password-confirm">Mot de passe *</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="col s12">
                            <button type="submit" class="btn">
                                Modifier votre mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

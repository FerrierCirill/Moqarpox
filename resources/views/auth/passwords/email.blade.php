@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="card col l6 offset-l3 m6 offset-m3 s10 offset-1">
            <div class="card-header center">
                <h2>Mot de passe Oublié ?</h2>
            </div>
            <div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="row m-0">
                        <div class="input-field col s10 offset-s1">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">Adresse Email</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row m-0 mb-1">
                        <div class="col s12 center">
                            <button class="btn btn-primary" type="submit" name="action">
                                Envoyer le lien
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

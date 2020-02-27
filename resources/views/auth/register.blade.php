@extends('layouts.app')

@section('content')
<div class="row no-margin inscription-flex">
	<div class="col s12 m6 l8 no-padding inscription-img">
	</div>

	<div class="col s12 m6 l4 white p-2 pt-3 pb-3">
		<form method="POST" action="{{ route('register') }}">
			@csrf

			<div class="row">
				<div class="input-field col s10">
					<select id="civility" type="text" class="form-control @error('civility') is-invalid @enderror" name="civility" value="{{ old('civility') }}" autocomplete="civility" autofocus>
                        <option value="" disabled selected>Sélectionnez votre genre</option>
                        <option value="man">Monsieur</option>
						<option value="woman">Madame</option>
						<option value="other">Autre</option>
					</select>
					<label>Genre*</label>

					@error('civility')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12 m6">
					<input id="first_name" name="first_name" type="text" class="validate form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
					<label for="first_name">Nom*</label>

					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="input-field col s12 m6">
					<input id="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" name="second_name" value="{{ old('second_name') }}" required autocomplete="second_name" autofocus>
					<label for="second_name">Prénom*</label>

					@error('second_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="row">
				<div class="input-field inline col s12">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
					<label for="email">Email*</label>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="row">
				<div class="input-field inline col s8">
					<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
					<label for="phone">Téléphone*</label>
					@error('phone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="row">
				<div class="input-field inline col s12 m6">
					<div class="input-field col s12">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
						<label for="password">Mot de passe*</label>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>


				<div class="input-field inline col s12 m6">
					<div class="input-field col s12">
						<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						<label for="verif_password">Retapez votre mot de passe*</label>
					</div>
				</div>
			</div>

			<div class="row">
				<label class="col s12 center center-align">
					<input type="checkbox" class="filled-in" required/>
					<span>Vous acceptez nos conditions d'utilisation</span>
				</label>
			</div>

			<div class="row">
				<div class="col s12 center">
					<button class="btn btn-primary waves-effect waves-light light-green" type="submit" name="action">
						S'inscrire !
					</button>
				</div>
			</div>

			<div class="row">
			</div>

		</form>
        <div class="row">
            <div class="col s12 center">
                <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">
                    Inscription via Facebook
                </button>
            </div>
        </div>

        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <a href="{{ url('/auth/redirect/google') }}" class="btn btn-primary"><i class="fa fa-google"></i> Google</a>
            </div>
        </div>

	</div>
	@endsection

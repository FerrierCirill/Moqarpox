@extends('layouts.app')

@section('content')
<div class="row no-margin inscription-flex inscription-img	">

	<div class="col s12 m6 l4 offset-m6 offset-l8 white p-2 pt-3 pb-6">
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif


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
					<label>Genre</label>

					@error('civility')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12 m6">
					<input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
					<label for="first_name">Prénom*</label>

					@error('first_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="input-field col s12 m6">
					<input id="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" name="second_name" value="{{ old('second_name') }}" autocomplete="family-name">
					<label for="second_name">Nom*</label>

					@error('second_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="row">
				<div class="input-field inline col s12">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
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
					<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
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
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
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
						<input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password_confirmation">
						<label for="password_confirmation">Confirmer votre mdp*</label>
						@error('password_confirmation')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
			</div>

			<div class="row">
				<label class="col s12 center center-align">
					<input type="checkbox" class="filled-in" name="cgu" required/>
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
		<hr/>
        <div class="row pt-1">
            <div class="col s12 center">

								<a href="{{ url('/auth/redirect/google') }}" class="btn waves-effect waves-light blue darken-4"><i class="fab fa-google"></i> Inscription via Google</a>
            </div>
        </div>

	</div>
	@endsection

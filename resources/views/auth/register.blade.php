@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{--Civility--}}
                        <div class="form-group row">
                            <label for="civility" class="col-md-4 col-form-label text-md-right">{{ __('Civilité') }}</label>

                            <div class="col-md-6">

                                <select id="civility" type="text" class="form-control @error('civility') is-invalid @enderror"
                                        name="civility" value="{{ old('civility') }}" required autocomplete="civility" autofocus>
                                    <option value="">--Please choose an option--</option>
                                    <option value="man">Mr</option>
                                    <option value="woman">Mme</option>
                                    <option value="other">Autre</option>
                                </select>

                                @error('civility')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--First Name--}}
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prenom*') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--Second Name--}}
                        <div class="form-group row">
                            <label for="second_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom*') }}</label>

                            <div class="col-md-6">
                                <input id="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror"
                                       name="second_name" value="{{ old('second_name') }}" required autocomplete="second_name" autofocus>

                                @error('second_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--Email--}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--Password--}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="show">
                                show/hide
                            </div>
                        </div>

                        {{--Passwd Confirm--}}
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">

                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                       onchange="
                                        // Cadeau
                                        // if(this.value !== document.getElementById('password').value){
                                        //     this.style.backgroundColor= '#b4645f';
                                        //     document.getElementById('password').style.backgroundColor= '#b4645f';
                                        //     console.log(this.value + document.getElementById('password').value)
                                        // }
                                        // else{
                                        //     this.style.backgroundColor= '#FFFFFF';
                                        //     document.getElementById('password').style.backgroundColor= '#FFFFFF';}
                              ">
                            </div>
                            <div class="show" >
                                show/hide
                            </div>
                        </div>

                        {{--Phone--}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('S\'inscrire à Mouqarpox') }}
                                </button>
                            </div>
                        </div>


                        <div name="Facebook">
                            Facebook
                        </div>

                        <div name="Condition">
                            conditions
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

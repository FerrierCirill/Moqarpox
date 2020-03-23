@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 center-align">
            <h2>Vérifiez votre adresse e-mail</h2>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    <p style="color: red">Vérifiez votre adresse e-mail<p>
                </div>
            @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

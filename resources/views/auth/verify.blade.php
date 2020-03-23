@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre adresse email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification d\'email vien de vous être envoyé sur:'.\Auth::user()->email) }}
                        </div>
                    @endif

                    {{ __('Avant d\'effectuer une nouvelle demande vérifiez votre boîte mail, ainsi que vos courriers indésirables.') }}
                    {{ __('Si vous n\'avez pas reçut de mail:) }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique ici pour envoyer un lien.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
            <p>Avant de continuer, veuillez vérifier votre boite mail. Si vous n'avez pas reçu l'e-mail</p>

            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn m-0">cliquez ici pour en demander un autre lien</button>
            </form>

        </div>
    </div>
</div>
@endsection

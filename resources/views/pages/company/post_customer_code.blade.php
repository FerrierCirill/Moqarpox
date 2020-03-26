@extends('layouts.app')

@section('content')
    <div class="container row">
        <div class="col l6 offset-l3 m8 offset-m2 s10 offset-s1 z-depth-2 mt-3 p-2">
            <div class="row">
                <div class="col s12">
                    <h1 class="h2-like m-0 mb-1">@if($etat == 1)Merci ! @else Désolé .. @endif </h1>
                </div>
            </div>
            <div class="row">
                @if($etat == 1)
                    Votre demande de remboursement auprès de Mouquarpox à été prise en compte.
                    Nous vous rembourserons dans les plus brefs délais. <br><br>
                @elseif($etat == 2)
                    .. mais la demande de reboursement concerant l'activité correspondante au code saisi à déja été effectuée.
                    Merci de rééssayer .. <br><br>
                @else
                    ..mais un problème est survenu ..
                    Veuillez vérifier que le code n'a pas déja été saisi .. <br><br>
                @endif
                <a class="btn right mb-2 mr-1" href="{{ route('user_customer_code_get') }}">Récupérer un code <i class="fas fa-money-bill-wave"></i></a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')


@section('content')
    <div class="container">
        @if($orders->count() != 0)
            <ul class="collapsible">
                @foreach($orders as $order)
                    <li @if ($loop->first) class="active" @endif>
                        <div class="collapsible-header">
                            N&#186;: {{$order->id}} | Commander le : {{$order->created_at}}
                        </div>
                        <div class="collapsible-body">
                            @foreach($order->activityOrder as $actOrd)
                                <div class="row">
                                    <div class="col s12 m6 l4">
                                        <img src="{{asset($actOrd->activity->link0)}}" class="responsive-img" alt="{{$actOrd->activity->name}}">
                                    </div>
                                    <div class="col s12 m6 l8">
                                        <h4>{{$actOrd->activity->name}}</h4>
                                        <h6>Code cadeau : {{$actOrd->code}}</h6>
                                        <p>
                                            <strong>Facture envoyer à :</strong> {{$actOrd->email}}<br>
                                            <br>

                                            <strong>Envoyer à :</strong> {{$actOrd->friend_name}} → {{$actOrd->friend_mail}}<br>
                                            <strong>Message :</strong> {{$actOrd->text}}<br>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="center-align col s12">
                <h4>Vous n'avez pas d'historique d'achat  <i class="far fa-frown"></i></h4>
                <p>Retouner <a href="{{route('home')}}">à l'accueil</a> pour chercher des activitées à ajouter ici</p>
            </div>
        @endif
    </div>
@endsection

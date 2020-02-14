@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')
{{-- {{var_dump($user)}} --}}
    <div class="container">
        <div class="row">
            <h1><span class="uppercase">{{$user->first_name}}</span> {{$user->second_name}}</h1>
            <div class="col s12 m10">
                <h3>Données personnel</h3>
                <p>
                    Email : {{$user->email}}<br>
                    Téléphone : {{$user->phone}}
                </p>
            </div>

            <div class="col s12 m2">
                <a class="btn" href="{{route('user_historical')}}">Historique d'achat <i class="fas fa-box"></i></a>
            </div>
            
        </div>
        
{{-- ce quon avais dit (avecflo) c'est que on le defini mais on ne le fait pas --}}

        @isClient
            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <i class="fas fa-bullhorn big-I"></i>
                        <h5>Développer votre activité</h5>
                        <span class="black-text">
                            <p>Vous êtes un professionnel et vous proposer des activités ou des séjours a vos clients ? Mettais vous en avant en apparaissent sur Mouqarpox</p>
                            <a class="btn" href="{{route('company_add_get')}}">Déposer une offre <i class="fas fa-paper-plane"></i></a> 
                        </span>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <i class="fas fa-money-bill-wave big-I"></i>
                        <h5>Développer votre activité</h5>
                        <span class="black-text">
                            <p>Vous êtes un professionnel et vous proposer des activités ou des séjours a vos clients ? Mettais vous en avant en apparaissent sur Mouqarpox</p>
                            <a class="btn" href="{{route('company_add_get')}}">Déposer une offre <i class="fas fa-paper-plane"></i></a> 
                        </span>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <i class="fas fa-chart-line big-I"></i>
                        <h5>Développer votre activité</h5>
                        <span class="black-text">
                            <p>Vous êtes un professionnel et vous proposer des activités ou des séjours a vos clients ? Mettais vous en avant en apparaissent sur Mouqarpox</p>
                            <a class="btn" href="{{route('company_add_get')}}">Déposer une offre <i class="fas fa-paper-plane"></i></a> 
                        </span>
                    </div>
                </div>


            </div>
        @endisClient

        @isProvider
            <h3></h3>
        @endisProvider


    </div>
@endsection

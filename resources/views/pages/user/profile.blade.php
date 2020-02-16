@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')
{{-- {{var_dump($user)}} --}}
    <div class="container">
        <div class="row">
            <a class="btn right mb-2" href="{{route('user_historical')}}">Historique d'achat <i class="fas fa-box"></i></a>

            <h1>
                <span class="uppercase">{{$user->first_name}}</span> {{$user->second_name}}  
            </h1>
            <h3>Données personnel </h3>
            <p>
                <strong>Email :</strong> {{$user->email}}<br>
                <strong>Téléphone :</strong> {{$user->phone}}<br>
                <strong>Compte créé le :</strong> {{$user->created_at}}<br>
            </p>
            

            <a class="btn modal-trigger" href="#modal_user_modification">Modifier mes informations</a>
            @include('components.user.profile.modal_for_change_information')


        </div>
        


        @isClient
            @include('components.user.profile.isClient')
        @endisClient

        @isProvider
            @include('components.user.profile.isProvider')            
        @endisProvider


    </div>
@endsection

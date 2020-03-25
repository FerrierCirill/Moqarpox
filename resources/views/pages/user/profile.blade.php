@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')

    <style>
        #error{
            color: red;
        }
    </style>
    <div class="container">
        <div class="row">
            <h1>
                {{$user->first_name}} <span class="uppercase"> {{$user->second_name}} </span>
            </h1>
            <h3>Données personnelles </h3>
            <p>
                <strong>Email :</strong> {{$user->email}}<br>
                <strong>Téléphone :</strong> {{$user->phone}}<br>
                <strong>Compte créé le :</strong> {{$user->created_at}}<br>
            </p>

            <div class="row mt-2">
                <a class="btn right" href="{{route('user_historical')}}">Historique d'achat <i class="fas fa-box"></i></a>
                <a class="btn modal-trigger ml-1" href="#modal_user_modification">Modifier mes informations</a>
            </div>
            @if($errors->has('password'))
                <p id="error">{{$errors->first('password')}}</p>
            @endif
            @if($errors->has('email'))
                <p id="error">{{$errors->first('email')}}</p>
            @endif
            @if($errors->has('phone'))
                <p id="error">{{$errors->first('phone')}}</p>
            @endif
            @if($errors->has('first_name'))
                <p id="error">{{$errors->first('first_name')}}</p>
            @endif
            @if($errors->has('second_name'))
                <p id="error">{{$errors->first('second_name')}}</p>
            @endif

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

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

            <div class="input-field col s12 m6">
                <label>Email</label>
                <input class="validate" type = "text" value="{{$user->email}}" readonly disabled>
            </div>
            <form action="{-- TODO --}">
                <div class="input-field col s12 m6">
                    <select id="civility" class="form-control @error('civility') is-invalid @enderror" value="{{ old('civility') }}">
                        <option value="" disabled selected>Sélectionnez votre genre</option>
                        <option value="man">Monsieur</option>
                        <option value="woman">Madame</option>
                        <option value="else">Autre</option>
                    </select>
                    <label>Genre</label>
                </div>

                <div class="input-field col s12 m12 l4">
                    <label>Téléphone</label>
                    <input  class="validate"
                            type = "text" 
                            name = "phone"
                            value="{{$user->phone}}">
                    
                    @if($errors->has('phone'))
                        <p>{{$errors->first('phone')}}</p>
                    @endif
                </div>

                <div class="input-field col s6 l4">
                    <label>Mot de passe</label>
                    <input  class="validate"
                            type = "text" 
                            name = "password">
                    @if($errors->has('password'))
                        <p>{{$errors->first('password')}}</p>
                    @endif
                </div>

                <div class="input-field col s6 l4">
                    <label for="verif_password">Retapez votre mot de passe</label>
                    <input id="verif_password" type="password" class="validate">
                </div>

                <div class="col s12">
                    <button type="submit" class="btn mb-2 right">Sauvegardé <i class="fas fa-save"></i></button>
                </div>
            </form>         
        </div>
        


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
            <a class="btn right mb-2" href="{{route('company_moneyback_get')}}">Récupéré un code <i class="fas fa-plus-square"></i></a>
            <a class="btn right mb-2" href="{{route('company_add_get')}}">Créé une entreprise <i class="fas fa-plus-square"></i></a>
            <h3>Vos entreprises :</h3>

            <div class="row">
                @forelse($user->companies as $company)

                    <div class="col s12 m6 l4">
                        <div class="card small">
                            <div class="card-image">
                                <img src="{{asset($company->link)}}">
                                <span class="card-title hoverable">{{$company->name}}</span>
                            </div>
                            <div class="card-content">
                                <p>
                                    Adresse : {{$company->adress1}} {{$company->adress2 || ''}}, {{$company->city_id}}<br>
                                    Description : {{ \Illuminate\Support\Str::limit($company->description, 80, $end='...') }}


                                </p>
                            </div>
                            <div class="card-action">
                                <a href="{{route('company_details', ['company_id' => $company->id])}}">Voir</a>
                                <a href="{{route('company_edit',  ['company_id' => $company->id])}}">Modifier</a>
                            </div>
                        </div>
                    </div>

                @empty
                    <h4>Vous n'avez pas encore d'entreprise</h4>
                    <a class="btn mb-2" href="{{route('company_add_get')}}">Créé une entreprise <i class="fas fa-plus-square"></i></a>
                @endforelse
            </div>
            
        @endisProvider


    </div>
@endsection

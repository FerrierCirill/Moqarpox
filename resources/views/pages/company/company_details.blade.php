 @extends('layouts.app')

@section('head-needMapScript', 'ON')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l3 mt-2 center-align">
                @if (isset($company->link))
                    <img class="responsive-img" src="{{$company->link}} alt="{{$company->name}}">
                @else
                    <img class="responsive-img" src="https://via.placeholder.com/300" alt="{{$company->name}}">
                @endif
            </div>
            <div class="col s12 m8 l9">
                <h1>{{$company->name}}</h1>
                <p>
                    <span class="title-category">{{$company->category->name}}</span><br>
                    {{$company->description}}
                </p>
                <p>
                    <strong>Téphone :</strong> {{$company->phone}}<br>
                    <strong>Adresse :</strong> {{$company->adress1}} {{$company->adress2 || ''}}, {{$company->city->code_postal}} {{$company->city->name}}<br>
                    <strong>Créé le :</strong> {{$company->created_at}}
                </p>
            </div>
        </div>

        @isMyCompany($company->user_id)
            <a href="{{route('company_edit',  ['company_id' => $company->id])}}" class="btn">Modifier <i class="fas fa-edit"></i></a>
            <a href="{{route('activity_add_get')}}" class="btn">Ajouter une activité <i class="fas fa-plus-square"></i></a>
        @endisMyCompany

        <div class="row mt-2">
            @forelse($activities as $activity)
                <div class="col s12 m12 l4">
                         <div class="card">
                        <div class="card-image">
                            @if (isset($activity->link0))
                                <img src="{{asset($activity->link0)}}" alt="{{$activity->name}}">
                            @else
                                <img src="https://via.placeholder.com/300" alt="{{$activity->name}}">
                            @endif

                            <div class="price">
                                <span>
                                    {{$activity->price}} $ 
                                </span>
                                <span>
                                    <a class="btn">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </a>
                                </span>
                            </div>
                            
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h5>{{$activity->name}}</h5>
                                <p>
                                    <div class="mb-1">
                                        {{$activity->note}} / 5 @include('components.star', ['note' => $activity->note])<br>
                                    </div>
                                    {{\Illuminate\Support\Str::limit($activity->description, 150, $end='...') }}
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="{{route('activity_details', ['activity_id' => $activity->id])}}">En voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty       
                <h3>Cette entreprise n'as pas encore de formule</h3>
            @endforelse
            

            {{ $activities->links('components.pagination') }}
        </div>

    </div>
@endsection
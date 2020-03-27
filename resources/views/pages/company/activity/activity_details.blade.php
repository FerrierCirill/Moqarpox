@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')
    <div class="light-green activity-nav">
        <div class="container valign-wrapper">
            <a href="{{route('company_details', ['company_id' => $activity->company->id])}}" class="breadcrumb">{{ $activity->company->name }}</a>
            <a href="#!" class="breadcrumb">{{$activity->name}}</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4 mt-2 center-align">
                @if (isset($activity->link0))
                    <img class="responsive-img" src="{{asset($activity->link0)}}" alt="{{$activity->name}}">
                @else
                    <img class="responsive-img" src="https://via.placeholder.com/300" alt="{{$activity->name}}">
                @endif
                <span class="activity-price  btn">{{$activity->price}} €</span>
            </div>
            <div class="col s12 m8 l8">

                <h1 class="activity-title">{{$activity->name}}</h1>

                <div class="mb-1">
                    {{$activity->note .' / 5' ?? 'Aucune note'}}  @include('components.star', ['note' => $activity->note]) |
                    <span class="categori-show" style="background :{{ \App\SubCategory::find($activity->sub_category_id)->category->hexa }}"></span>
                    {{ \App\SubCategory::find($activity->sub_category_id)->category->name }} >
                    <span>{{ \App\SubCategory::find($activity->sub_category_id)->name }}</span> |
                    <a href="#comments">{{ $nb_de_commentaire ?? 0 }} commentaires</a>

                    <p>
                        {{$activity->resume}}
                    </p>

                    @include('components.activity.btn_add_shopping', ['activity_id' => $activity->id])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><strong><i class="fas fa-list"></i> Description</strong></div>
                        <div class="collapsible-body">
                            <h5>Description</h5>
                            {{$activity->description}}
                            <br>
                            <br>
                            <br>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><strong><i class="fas fa-info-circle"></i> Information</strong></div>
                        <div class="collapsible-body">
                            <h5>Informations</h5>
                            {{$activity->information}}
                            <br>
                            <br>
                            <br>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><strong><i class="fas fa-building"></i> Entreprise</strong></div>
                        <div class="collapsible-body">
                            <a href="{{route('company_details', ['company_id' => $activity->company->id])}}">
                                <h5>{{$activity->company->name}}</h5>
                            </a>
                            <table>
                                <tr>
                                    <td><strong>Email  : </strong></td>
                                    <td>{{$activity->company->email}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Téphone: </strong></td>
                                    <td>{{$activity->company->phone}}</td>
                                </tr>
                                <tr>
                                    <td><strong>SIRET  : </strong></td>
                                    <td>{{$activity->company->siret}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Adresse : </strong></td>
                                    <td>{{$activity->company->adress1}} {{$activity->company->adress2 || ''}}, {{$activity->company->city->code_postal}} {{$activity->company->city->name}}</td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <br>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            @php
                $tab_pic =  array();
                if ( isset($activity->link0) && $activity->link0 != '') {
                    echo ' <div class="col s12"><h4>Photo :</h4></div>';
                    $tab_pic[] = $activity->link0;
                }
                if ( isset($activity->link1) && $activity->link1 != '') {
                    $tab_pic[] = $activity->link1;
                }
                if ( isset($activity->link2) && $activity->link2 != '') {
                    $tab_pic[] = $activity->link2;
                }
            @endphp

            @if(sizeof ($tab_pic) == 1)
                <div class="col s12">
                    <img src="{{asset($activity->link0)}}" class="responsive-img" alt="Photo {{$activity->name}}" srcset="">
                </div>
            @elseif(sizeof ($tab_pic) == 2)
                @foreach($tab_pic as $key => $img)
                    <div class="col s12 m6">
                        <img src="{{asset($img)}}" class="responsive-img" alt="Photo {{$key}} {{$activity->name}}" srcset="">
                    </div>
                @endforeach
            @elseif(sizeof ($tab_pic) == 3)
                @foreach($tab_pic as $key => $img)
                    <div class="col s12 m4">
                        <img src="{{asset($img)}}" class="responsive-img" alt="Photo {{$key}} {{$activity->name}}" srcset="">
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row" id="comments">
            <div class="col s12">
                <h4>Commentaires :</h4>
            </div>
            <div class="row">
                @php $test = false; @endphp

                @forelse($activity->comments as $comment)
                    @if($comment->state == 1)
                        @php $test = true @endphp
                        <div class="col s12 mb-2 comment">
                            <span class="title">{{$comment->title}}</span> |
                                {{$comment->note}} / 5 @include('components.star', ['note' => $comment->note]) |
                                {{$comment->created_at}}
                            <p>
                                {{$comment->message}}
                            </p>
                        </div>
                    @endif
                @empty
                    @php $test = true @endphp
                    <div class="col s12">
                        <p>Il n'y a pas encore de commentaire pour cette activité, <a href="{{route('get_add_comment')}}">déposez un commentaire ici</a></p>
                    </div>
                @endforelse
                @if($test == false)
                    <div class="col s12">
                        <p>Il n'y a pas encore de commentaire pour cette activité, <a href="{{route('get_add_comment')}}">déposez un commentaire ici</a></p>
                    </div>
                @else
                    <p>Vous avez participé à cette activité ? <a class="btn" href="{{route('get_add_comment')}}">Déposer un commentaire ici !</a></p>
                @endif
            </div>

        </div>
    </div>
@endsection

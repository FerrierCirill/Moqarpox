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
        <div class="row mt-2">
            <div class="col s12">
                <span class="title-category-n-sub" style="background :{{ \App\SubCategory::find($activity->subCategory_id)->category->hexa }}">
                    {{ \App\SubCategory::find($activity->subCategory_id)->category->name }} > 
                    <span>{{ \App\SubCategory::find($activity->subCategory_id)->name }}</span>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l3 mt-2 center-align">
                @if (isset($activity->link0))
                    <img class="responsive-img" src="{{$activity->link0}}" alt="{{$activity->name}}">
                @else
                    <img class="responsive-img" src="https://via.placeholder.com/300" alt="{{$activity->name}}">
                @endif
            </div>
            <div class="col s12 m8 l9">
                <h1 class="activity-title">{{$activity->name}}</h1>
                
                <div class="mb-1">
                    {{$activity->note}} / 5 @include('components.star', ['note' => $activity->note]) |
                    <a href="#comments">{{sizeof($activity->comments)}} commentaires</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m6">
                <p>
                    <strong>Description :</strong> {{$activity->description}}
                </p>
            </div>
            <div class="col s12 m6">
                <p>
                    <strong>Information :</strong> {{$activity->information}}
                </p>
            </div>
        </div>

        <div class="row" id="comments">
            <h4>Commentaires :</h4>
            @forelse($activity->comments as $comment)
                
            @empty
                <p>Il n'y as pas encore de commentaire pour cette activité, commendez la ou <a href="#//TODO">déposé un commentaire ici</a></p>
            @endforelse
        </div>
    </div>
@endsection
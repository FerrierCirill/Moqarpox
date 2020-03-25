@extends('layouts.app')

@section('content')
    <div class="center-align thanks-background m-0 pt-4">
        <div class="row">
            <div class="white col s10 offset-s1 m6 offset-m3 l4 offset-l4 p-2 pb-2 thanks-rounded">
                <h2 class="m-0 mb-2">Merci !</h2>

                <p>Nous vous remercions pour votre commentaire et le témoignage que vous avez bien voulu partager avec nous.</p>
                <p> Titre: {{$comment->title}}</p>
                <p>Message: {{$comment->message}}</p>
                <p>Note: {{$comment->note}}/5</p>
                <a class="btn full-width mt-4" href="{{route('home')}}">Accueil</a>
                <br><br>
                <a class="mt-1" href="{{route('activity_details', ['activity_id' => $activity_id])}}">Voir le commentaire</a>
            </div>
        </div>

    </div>
@endsection

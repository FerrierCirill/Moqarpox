@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

@section('content')


  <div class="container">

    <div class="row">
    </div>
    <div class="row">

      <div class="col s6 z-depth-3">
        Structures en attente
      </div>

      <div class="col offset-s1 s5">
        <div class="row">
          <div class="col s12 z-depth-3">
            Commentaires
            <div class="card">
              <div class="row">
              </div>
              <div class="row">
                <div class="col s4 offset-s1">
                  <!-- TODO : Nom de l'activité --> Nom de l'activité 1
                </div>
                <div class="col s3 offset-s4">
                  Note : <!-- TODO : Note -->/5
                </div>
              </div>
              <div class="row">
                <div class="col offset-s2 s7">
                  <hr/>
                </div>
                <div class="col s1 center">
                  <a href="#" class=""> <i class="material-icons green">check</i> </a>
                </div>
                <div class="col s1 center">
                  <a href="#" class=""> <i class="material-icons red">clear</i> </a>
                </div>
              </div>
              <div class="row">
                <div class="col offset-s1 s10">
                  <!-- TODO : Contenu du commentaire --> Contenu du commentaire 1
                </div>
              </div>
              <div class="row">
              </div>
            </div>
            <div class="card">
              <div class="row">
                <div class="col s5">
                  <!-- TODO : Nom de l'activité --> Nom de l'activité 2
                </div>
                <div class="col s3 offset-s4">
                  Note : <!-- TODO : Note -->/5
                </div>
              </div>
              <div class="row">
                <div class="col offset-s1 s8">
                  <hr/>
                </div>
                <div class="col s1">
                  <a href="#" class="btn-floating green center"> <i class="material-icons green">check</i> </a>
                </div>
                <div class="col s1">
                  <a href="#" class="btn-floating red center"> <i class="material-icons red">clear</i> </a>
                </div>
              </div>
              <div class="row">
                <div class="col offset-s1 s10">
                  <!-- TODO : Contenu du commentaire --> Contenu du commentaire 2
                </div>
              </div>
              <div class="row">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
        </div>

        <div class="row">
          <div class="col s12 z-depth-3">
            <form class="" action="" method="post">
              <div class="col s4">
                Ajouter un admin :
              </div>
              <div class="col s4">
                  <input type="text" name="addAdmin" value="">
              </div>
              <div class="col s2">
                <button type="button" name="button" class="btn-small">></button>
              </div>
            </form>
          </div>
        </div>

        <div class="row z-depth-3">
          <form class="" action="index.html" method="post">
            <div class="row col s4">
              Supprimer un admin :
            </div>
            <div class="col s4">
              <input type="text" name="delAdmin" value="">
            </div>
            <div class="col s4">
              <button type="button" class="btn-small" name="button">></button>
            </div>
          </form>
        </div>

        </div>
      </div>


    </div>
  </div>

  <style>
      .row_act {
          display: flex;
          flex-direction: row;
          justify-content: space-between;
          align-items: center;
          padding: 2px;
          margin: 5px;
      }
      .zone {
          margin: 15px 0;
      }
  </style>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3 center-align">
                Je le vois comme ca perso (EN GROS), apres vous me dirai ! (et je maitrise pas matérialize donc c'est moche ^^)
            </div>
            <div class="col s12 z-depth-3 zone">
                <h5>Activités en attente</h5>
                <ul>
                    @foreach($activities as $activity)
                        <li>
                            <div class="row_act z-depth-3">
                                <div>
                                    Nom : {{ $activity->name }} <br>
                                    Description : {{ \Illuminate\Support\Str::limit($activity->description, $limit = 75, $end = '...') }}
                                </div>
                                <div>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-book-open"></i></a>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-check"></i></a>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{ $activities->links() }}
                </ul>
            </div>
            <div class="col s12 z-depth-3 zone">
                <h5>Compagnies en attente</h5>
                <ul>
                    @foreach($companies as $company)
                        <li>
                            <div class="row_act z-depth-3">
                                <div>
                                    Nom : {{ $company->name }} <br>
                                    Description : {{ \Illuminate\Support\Str::limit($company->description, $limit = 75, $end = '...') }}
                                </div>
                                <div>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-book-open"></i></a>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-check"></i></a>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{ $companies->links() }}
                </ul>
            </div>
            <div class="col s12 z-depth-3 zone">
                <h5>Commentaires en attente</h5>
                <ul>
                    @foreach($comments as $comment)
                        <li>
                            <div class="row_act z-depth-3">
                                <div>
                                    Titre : {{ $comment->title }} <br>
                                    Message : {{ \Illuminate\Support\Str::limit($comment->message, $limit = 75, $end = '...') }}
                                </div>
                                <div>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-book-open"></i></a>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-check"></i></a>
                                    <a href="#" class="btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{ $comments->links() }}
                </ul>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

@section('content')


  <div class="container pt-2">


    <div class="row">

      <div class="col s12 l6">
        <div class="row z-depth-1 px-2">
          <div class="col s12">
            Structures en attente
          </div>
          <div class="card col s12 px-2 pb-1 pt-1">
            <div class="row">
              <div class="col s10">
                Nom : Nom structure 1
              </div>
              <div class="col s2 center">
                <a href="#">Détails</a>
              </div>
            </div>
            <div class="row no-margin no-padding">
              <div class="col s8 offset-s2">
                <hr/>
              </div>
            </div>
            <div class="row">
              <div class="col s10">
                Description de la structure 1
              </div>
              <div class="col s2 center">
                <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-check"></i></a> <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
              </div>
            </div>
          </div>
          <div class="card col s12 px-2 pb-1 pt-1">
            <div class="row">
              <div class="col s10">
                Nom : Nom structure 2
              </div>
              <div class="col s2 center">
                <a href="#">Détails</a>
              </div>
            </div>
            <div class="row no-margin no-padding">
              <div class="col s8 offset-s2">
                <hr/>
              </div>
            </div>
            <div class="row">
              <div class="col s10">
                Description de la structure 2
              </div>
              <div class="col s2 center">
                <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-check"></i></a> <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="row z-depth-1 px-2">
          Activités en attente

          <div class="card col s12 px-2 pb-1 pt-1">
            <div class="row">
              <div class="col s5">
                Nom : Nom activité 1
              </div>
              <div class="col s5">
                Structure : Structure 1
              </div>
              <div class="col s2 center">
                <a href="#">Détails</a>
              </div>
            </div>
            <div class="row no-margin no-padding">
              <div class="col s8 offset-s2">
                <hr/>
              </div>
            </div>
            <div class="row">
              <div class="col s10">
                Description de l'activité 1
              </div>
              <div class="col s2 center">
                <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-check"></i></a> <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
              </div>
            </div>
          </div>
          <div class="card col s12 px-2 pb-1 pt-1">
            <div class="row">
              <div class="col s5">
                Nom : Nom activité 2
              </div>
              <div class="col s5">
                Structure : Structure 1
              </div>
              <div class="col s2 center">
                <a href="#">Détails</a>
              </div>
            </div>
            <div class="row no-margin no-padding">
              <div class="col s8 offset-s2">
                <hr/>
              </div>
            </div>
            <div class="row">
              <div class="col s10">
                Description de l'activité 2
              </div>
              <div class="col s2 center">
                <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-check"></i></a> <a href="#" class="small-btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col offset-l1 s12 l5">
        <div class="row">
          <div class="col s12 z-depth-1 px-2 pb-1 pt-1">
            Commentaires
            <div class="card px-2 pb-1 pt-1">
              <div class="row">
                <div class="col s5">
                  <!-- TODO : Nom de l'activité --> Nom de l'activité 1
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
                  <!-- TODO : Contenu du commentaire --> Contenu du commentaire 1
                </div>
              </div>
              <div class="row">
              </div>
            </div>
            <div class="card px-2 pb-1 pt-1">
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
          <div class="col s12 z-depth-1 px-1">
            <form class=" valign-wrapper" action="" method="post">
              <div class="col s5">
                Ajouter un admin :
              </div>
              <div class="col s5">
                  <input type="text" name="addAdmin" value="">
              </div>
              <div class="col s2">
                <button type="button" name="button" class="btn-small">></button>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col s12 z-depth-1 px-1">
            <form class=" valign-wrapper" action="index.html" method="post">
              <div class="col s5">
                Supprimer un admin :
              </div>
              <div class="col s5">
                <input type="text" name="delAdmin" value="">
              </div>
              <div class="col s2">
                <button type="button" class="btn-small" name="button">></button>
              </div>
            </form>
          </div>
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
            <div class="col s6 z-depth-1 px-1">
                <form class="valign-wrapper" action="{{ route('add_admin') }}" method="POST">
                    @csrf
                    <div class="col s4">
                        Ajouter un admin :
                    </div>
                    <div class="col s5 input-field">
                        <input type="text" id="addAdmin" name="email" value="">
                        <label for="email">e-mail*</label>
                    </div>
                    <div class="col s3">
                        <button type="submit" class="btn-small">Ajouter</button>
                    </div>
                </form>
            </div>

            <div class="col s6 z-depth-1 px-1">
                <form class="valign-wrapper" action="{{ route('delete_admin') }}" method="POST">
                    @csrf
                    <div class="col s4">
                        Supprimer un admin :
                    </div>
                    <div class="col s5 input-field">
                        <input type="text" id="delAdmin" name="email" value="">
                        <label for="email">e-mail*</label>
                    </div>
                    <div class="col s3">
                        <button type="submit" class="btn-small">Supprimer</button>
                    </div>
                </form>
            </div>

            <div class="col s12 z-depth-1 zone">
                <h5>Activités en attente</h5>
                <ul>
                    @foreach($activities as $activity)
                        <li>
                            <div class="row_act z-depth-3">
                                <div>
                                    {{ $activity->name }}
                                </div>
                                <div>
                                    <a href="{{ route('activity_details', ['activity_id' => $activity->id]) }}" class="btn" style="margin: 1px"><i class="fas fa-book-open"></i></a>
                                    <a href="{{ route('confirm_activity', ['activity_id' => $activity->id]) }}" class="btn" style="margin: 1px"><i class="fas fa-check"></i></a>
                                    <a href="{{ route('refuse_activity', ['activity_id' => $activity->id]) }}" class="btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{ $activities->links() }}
                </ul>
            </div>
            <div class="col s12 z-depth-1 zone">
                <h5>Compagnies en attente</h5>
                <ul>
                    @foreach($companies as $company)
                        <li>
                            <div class="row_act z-depth-1">
                                <div>
                                    {{ $company->name }}
                                </div>
                                <div>
                                    <a href="{{ route('company_details', ['company_id' => $company->id]) }}" class="btn" style="margin: 1px"><i class="fas fa-book-open"></i></a>
                                    <a href="{{ route('confirm_company', ['company_id' => $company->id]) }}" class="btn" style="margin: 1px"><i class="fas fa-check"></i></a>
                                    <a href="{{ route('refuse_company', ['company_id' => $company->id]) }}" class="btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{ $companies->links() }}
                </ul>
            </div>
            <div class="col s12 z-depth-1 zone">
                <h5>Commentaires en attente</h5>
                <ul>
                    @foreach($comments as $comment)
                        <li>
                            <div class="row_act z-depth-1">
                                <div>
                                    {{ $comment->title }} : {{ \Illuminate\Support\Str::limit($comment->message, $limit = 75, $end = '...') }}
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

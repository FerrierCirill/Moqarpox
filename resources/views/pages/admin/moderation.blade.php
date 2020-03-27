@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

@section('content')

<div class="container pt-2">
    <h1> Panel Administration</h1>
    <div id="adminStat">
        <h4>Statistiques</h4>
        <div class="row">
            <div class="col s12 z-depth-1 px-1 pt-1 mb-3">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>


                <div>
                    <h5>Entreprises</h5>
                    <div class="col s12 mb-1">
                        <div class="col m4 s12 pb-1">
                            <div class="col m8 s12 pt-1">
                                Nombre d'entreprises créées : <br>
                                Nombre d'entreprises validées : <br>
                                Nombre d'entreprises en attente : <br>
                            </div>
                            <div class="col m4 s12 right-align pt-1">
                                {{ $nombre_companies }}<br>
                                {{ $nombre_companies_valide }} <br>
                                {{ $nombre_companies_attente }} <br>
                            </div>
                        </div>

                        <div class="col m8 s12 pb-1">
                            <canvas id="companyChar"  height="100" style='color:#fff'></canvas>

                            <script>
                                const mois_fr = [
                                    @foreach($mois_parcouru as $mois)
                                        '{{$mois}}',
                                    @endforeach
                                ]

                                let dataCompanyChar  = JSON.parse('{{json_encode($nombre_companies_on_last_12_month)}}')
                                let ctxCompanyChar   = document.getElementById('companyChar').getContext('2d');
                                let chartCompanyChar = new Chart(ctxCompanyChar, {
                                    type: 'bar',
                                    data: {
                                        labels: mois_fr,
                                        datasets: [{
                                            label          : 'Entreprises créées',
                                            backgroundColor: '#aed581',
                                            borderColor    : 'rgb(255, 255, 255)',
                                            fillColor      : "#aed581",
                                            data           : dataCompanyChar
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        defaultFontColor : '#fff',
                                        labelColor: "#fff",
                                        legend: {
                                            font: {
                                                color: "#fff"
                                            }
                                        },
                                        scaleFontColor: "#fff",
                                    }
                                });
                            </script>
                        </div>
                    </div>

                    <hr>
                    <h5>Activités</h5>
                    <div class="col s12 mb-1">
                        <div class="col m4 s12 pb-1">
                            <div class="col m8 s12 pt-1">
                                Nombre d'activités créées : <br>
                                Nombre d'activités validées : <br>
                                Nombre d'activités en attente : <br>
                            </div>
                            <div class="col m4 s12 right-align pt-1">
                                {{ $nombre_activities }} <br>
                                {{ $nombre_activities_valide }} <br>
                                {{ $nombre_activities_attente }} <br>
                            </div>
                        </div>

                        <div class="col m8 s12 pb-1">
                            <canvas id="activityChar" height="100" style='color:#fff'></canvas>

                            <script>
                                let dataActivityChar  = JSON.parse('{{json_encode($nombre_activities_on_last_12_month)}}')
                                let ctxActivityChar   = document.getElementById('activityChar').getContext('2d');
                                let chartActivityChar = new Chart(ctxActivityChar, {
                                    type: 'bar',
                                    data: {
                                        labels: mois_fr,
                                        datasets: [{
                                            label          : 'Activités créer',
                                            backgroundColor: '#aed581',
                                            borderColor    : 'rgb(255, 255, 255)',
                                            fillColor      : "#aed581",
                                            data           : dataActivityChar
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        defaultFontColor : '#fff',
                                        labelColor: "#fff",
                                        legend: {
                                            font: {
                                                color: "#fff"
                                            }
                                        },
                                        scaleFontColor: "#fff",
                                    }
                                });
                            </script>
                        </div>
                    </div>

                    <hr>
                    <h5>Commandes</h5>
                    <hr>
                    <div class="col s12 mb-1">
                        <div class="col m4 s12 pb-1">
                            <div class="col m8 s12 pt-1">
                                Nombre de commandes réalisées : <br>
                                {{-- Moyenne de commandes par activité : <br> --}}
                            </div>
                            <div class="col m4 s12 right-align pt-1">
                                {{ $orders }} <br>
                                {{-- TODO <br> --}}
                            </div>
                        </div>

                        <div class="col m8 s12 pb-1">
                            <canvas id="orderChar" height="100" style='color:#fff'></canvas>

                            <script>
                                let dataOrderChar  = JSON.parse('{{json_encode($nombre_orders_on_last_12_month)}}')
                                let ctxOrderChar   = document.getElementById('orderChar').getContext('2d');
                                let chartOrderChar = new Chart(ctxOrderChar, {
                                    type: 'bar',
                                    data: {
                                        labels: mois_fr,
                                        datasets: [{
                                            label          : 'Nombre de commandes',
                                            backgroundColor: '#aed581',
                                            borderColor    : 'rgb(255, 255, 255)',
                                            fillColor      : "#aed581",
                                            data           : dataOrderChar
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        defaultFontColor : '#fff',
                                        labelColor: "#fff",
                                        legend: {
                                            font: {
                                                color: "#fff"
                                            }
                                        },
                                        scaleFontColor: "#fff",
                                    }
                                });
                            </script>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4>Modération</h4>
	<ul class="collapsible accordeon">
		<li>
			<div class="collapsible-header">
				Structures en attente ({{ $nombre_companies_attente }})
			</div>
			<div class="collapsible-body">
				<h5 class="pb-2">Structures en attente</h5>
				<ul>
					@foreach($companies as $company)
						<li>
							<div class="row z-depth-1 pt-1 px-1 pb-1">
								<div class="col m8 s12">
									{{ $company->name }}
								</div>
								<div class="col m4 s12 right-align">
									<a href="{{ route('company_details', ['company_id' => $company->id]) }}" class="btn"><i class="fas fa-book-open"></i></a>
									<a href="{{ route('confirm_company', ['company_id' => $company->id]) }}" class="btn"><i class="fas fa-check"></i></a>
									<a href="{{ route('refuse_company', ['company_id' => $company->id]) }}" class="btn"><i class="fas fa-ban"></i></a>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</li>
		<li>
			<div class="collapsible-header">
				Activités en attente ({{ $nombre_activities_attente }})
			</div>
			<div class="collapsible-body">
				<h5 class="pb-2">Activités en attente</h5>
				<ul>
					@if (count($activities) >= 1)
					@foreach($activities as $activity)
						<li>
							<div class="row z-depth-1 pt-1 px-1 pb-1">
								<div class="col m8 s12">
									{{ $activity->name }}
								</div>
								<div class="colm4 s12 right-align">
									<a href="{{ route('activity_details', ['activity_id' => $activity->id]) }}" class="btn"><i class="fas fa-book-open"></i></a>
									<a href="{{ route('confirm_activity', ['activity_id' => $activity->id]) }}" class="btn"><i class="fas fa-check"></i></a>
									<a href="{{ route('refuse_activity', ['activity_id' => $activity->id]) }}" class="btn"><i class="fas fa-ban"></i></a>
								</div>
							</div>
						</li>
					@endforeach
					@else
						Aucune activité à valider
					@endif
				</ul>
			</div>
		</li>
		<li>
			<div class="collapsible-header">
				Commentaires en attente ({{ $nombre_comments_attente }})
			</div>
			<div class="collapsible-body">
				<h5 class="pb-2">Commentaires en attente</h5>
				<ul>
					@if (count($comments) >= 1)
					@foreach($comments as $comment)
						<li>
							<div class="row z-depth-1 pt-1 px-1 pb-1">
								<div class="col m8 s12">
									{{ $comment->title }} : {{ \Illuminate\Support\Str::limit($comment->message, $limit = 75, $end = '...') }}
								</div>
								<div class="colm4 s12 right-align">
									<a href="{{ route('change_state_comment', ['comment_id' => $comment->id, 'state' => 1]) }}" class="btn" style="margin: 1px"><i class="fas fa-check"></i></a>
									<a href="{{ route('change_state_comment', ['comment_id' => $comment->id, 'state' => -1]) }}" class="btn" style="margin: 1px"><i class="fas fa-ban"></i></a>
								</div>
							</div>
						</li>
					@endforeach
					@else
					Aucun commentaire à valider !
					@endif
				</ul>
			</div>
		</li>
	</ul>


    <h4 class="mt-4">Administration</h4>
    <div class="row">
        <div class="col s12 z-depth-1 px-1">
            <h5>Liste des administrateurs</h5>
            <table class="striped highlight responsive-table" >
                <thead>
                        <td>Nom</td>
                        <td>Email</td>
                        <td>Téléphone</td>
                </thead>
                <tbody>
                    @foreach ($administrators as $admin)
                        <tr>
                            <td>{{ $admin->first_name }} {{ $admin->second_name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row z-depth-1">
        @if($errorUser != null)
            <div class="col s12 m-0">
                <h6 style="color:#ff0000">Utilisateur inconnu</h6>
            </div>
        @endif
        <div class="col s12 l6  px-1">
            <form class="valign-wrapper" action="{{route('add_admin')}}" method="post">
                @csrf
                <div class="col s5">
                Ajouter un admin :
                </div>
                <div class="col s5">
                    <input type="text" name="email" value="">
                </div>
                <div class="col s2">
                <button type="submit" name="button" class="btn-small">></button>
                </div>
            </form>
        </div>
        <div class="col s12 l6 px-1">
            <form class=" valign-wrapper" action="{{route('delete_admin')}}" method="post">
                @csrf
                <div class="col s5">
                Supprimer un admin :
                </div>
                <div class="col s5">
                <input type="text" name="email" value="">
                </div>
                <div class="col s2">
                <button type="submit" class="btn-small" name="button">></button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

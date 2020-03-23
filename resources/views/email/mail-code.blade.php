@extends('mail')
@section('content')
<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
	<tr>
		<td valign="top" class="bg_white" style="padding: 1em 2.5em;">
			<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="logo" style="text-align: center;">
						<h1>
							<a href="{{ route('home') }}">
								<img src="{{asset('images/logo.svg')}}" alt="mouqarpox" class="responsive-img">
							</a>
						</h1>
					</td>
				</tr>
			</table>
		</td>
	</tr><!-- end tr -->
	<tr>
		<td valign="middle" class="hero bg_white" style="background-image: url(images/bg_1.jpg); background-size: cover; height: 400px;">
			<div class="overlay">
			</div>
			<table>
				<tr>
					<td>
						<div class="text" style="padding: 0 4em; text-align: center;">
							<h2>{{ $activity_name }}</h2>
							<p style="text-transform: uppercase;">{{$code}}</p>
							<p><a href="{{$path_activity}}" class="btn btn-primary">En savoir plus</a></p>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr><!-- end tr -->
	<tr>
		<td class="bg_white email-section">
			<div class="heading-section" style="text-align: center; padding: 0 30px;">
				<h2>{{$name_customer}}</h2>
                <p>Voici un peti cadeau de la part de : {{$name_customer}}.</p>
                <p>{{$text}} (signé.e {{$name_customer}})</p>

                <br><br><br><br>

                <h4>Utilisation :</h4>
                <p>Pour utiliser ce cadeaux, rendez-vous sur <a href="{{$path_activity}}">Mouqarpox</a> pour connaitre l'emplacement de l'entreprise. Une fois sur place il vous suffira de donné ce code : <span style="font-weight:900;text-transform: uppercase;">{{$code}}</span></p>
			</div>
		</td>
	</tr><!-- end: tr -->
	<!-- 1 Column Text + Button : END -->
</table>
@endsection

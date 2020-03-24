@extends('email.mail')
@section('content')
<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
	<tr>
		<td valign="top" class="bg_white" style="padding: 1em 2.5em;">
			<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="logo" style="text-align: center;">
						<h1>
							<a href="{{ route('home') }}">
								Mouqarpox
							</a>
						</h1>
					</td>
				</tr>
			</table>
		</td>
	</tr><!-- end tr -->
	<tr>
		<td class="bg_white email-section">
			<div class="heading-section" style="text-align: center; padding: 0 30px;">
				<h2>Bonjour, Merci d'avoir effectué votre achat.</h2>
                <p>Voici votre facture d'un montant de {{$solde}} €. <br>
                    <a href="https://mouqarpox.neolithic.fr/user/historical">Historique d'achat</a>
                </p>

                <table style="border:solid #555 1px">
                    <tr >
                        <td>Numéro</td>
                        <td>Activitée</td>
                        <td>Ami(e)</td>
                        <td>Mail</td>
                        <td>Code</td>
                        <td>Prix</td>
                        <td>Date Limite</td>
                        <td>Message personalisée</td>
                    </tr>
                    @foreach($produits as $produit)
                        <tr>
                            @php
                                $activity = \App\Activity::find($produit->activity_id)
                            @endphp
                            <td>{{$num}}</td>
                            <td>{{$activity->name}}</td>
                            <td>{{$produit->friend_name}}</td>
                            <td>{{$produit->friend_email}}</td>
                            <td>{{$produit->code}}</td>
                            <td>{{$activity->price}}</td>
                            <td>{{gmdate("d/m/Y",mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1))}}</td>
                            <td>{{$produit->text}}</td>
                        </tr>
                        @php
                        $num++
                        @endphp
                    @endforeach
                </table>

                <h6>Merci de votre confiance!</h6>
			</div>
		</td>
	</tr><!-- end: tr -->
	<!-- 1 Column Text + Button : END -->
</table>
@endsection

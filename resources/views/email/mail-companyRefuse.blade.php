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
								<img src="{{asset('images/logo.svg')}}" alt="mouqarpox" class="responsive-img">
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
				<h2>{{$company_name}}</h2>
                <p>Votre demande de céation de l'entreprise {{$company_name}} a été refusée.</p>
                <p><a href="{{$path_company_add}}"> Ajouter à nouveau une entreprise </a></p>

                <h6>Merci de votre confiance!</h6>
			</div>
		</td>
	</tr><!-- end: tr -->
	<!-- 1 Column Text + Button : END -->
</table>
@endsection

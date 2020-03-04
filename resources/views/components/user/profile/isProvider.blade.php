<hr class="my-8">

<a class="btn right mb-2" href="{{route('company_add_get')}}">Créé une entreprise <i class="fas fa-plus-square"></i></a>
<a class="btn right mb-2 mr-1" href="{{route('company_moneyback_get')}}">Récupéré un code <i class="fas fa-money-bill-wave"></i></i></a>

<h3>Vos entreprises :</h3>

<div class="row">
    @forelse($user->companies as $company)
        <div class="col s12 m6 l4">
            <div class="card medium">
                <div class="card-image card-image-company">
                    @if (isset($company->link))
                        <img src="{{ asset($company->link) }}" alt="{{$company->name}}">
                    @else
                        <img src="https://via.placeholder.com/300" alt="{{$company->name}}">
                    @endif
                    <span class="card-title card-title-company hoverable">{{$company->name}}</span>
                </div>
                <div class="card-content">
                    <p>
                        <strong>Adresse :</strong> {{$company->adress1}} {{$company->adress2 || ''}}, {{$company->city->code_postal}} {{$company->city->name}}<br>
                    </p>
                </div>
                <div class="card-action">
                    @include('components.company.state', ['state' => $company->state])
                    @if($company->state == 1)
                        <a href="{{route('company_details', ['company_id' => $company->id])}}">Voir</a>
                        <a href="{{route('company_edit',  ['company_id' => $company->id])}}">Modifier</a>
                        <a href="{{route('disable_company', ['company_id' => $company->id])}}">Désactiver</a>
                    @elseif ($company->state == -1)
                        <a href="{{route('enable_company', ['company_id' => $company->id])}}">Activer</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <h4>Vous n'avez pas encore d'entreprise</h4>
        <a class="btn mb-2" href="{{route('company_add_get')}}">Créez une entreprise <i class="fas fa-plus-square"></i></a>
    @endforelse
</div>

<hr class="my-8">

<a class="btn right mb-2" href="{{route('company_add_get')}}">Créer une entreprise <i class="fas fa-plus-square"></i></a>
<a class="btn right mb-2 mr-1" href="{{ route('user_customer_code_get') }}">Récupérer un code <i class="fas fa-money-bill-wave"></i></a>

<h3>Vos entreprises :</h3>

<div class="row">
    <div class="col s12">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
        <canvas id="orderChar" height="100" style='color:#fff'></canvas>
        <script>
            @php
                $NowYear            = date('Y');
                $orders_by_Comp     = [];
                $total_all_by_mouth = [0,0,0,0,0,0,0,0,0,0,0,0];
                $total_of_company_by_mouth = [];
                $companies_names = [];

                foreach($user->companies as $key => $company) {
                    $companies_names[]               = $company->name;
                    $activities                      = $company->activities;
                    $total_of_company_by_mouth[$key] = [0,0,0,0,0,0,0,0,0,0,0,0];

                    foreach($activities as $activity) {
                        for ($i=0; $i < 12; $i++) {
                            $activityOrder = \App\ActivityOrder::where('activity_id', $activity->id)
                                                ->whereMonth('created_at', ($i + 1))
                                                ->whereYear ('created_at', $NowYear)->get();
                            if (sizeof($activityOrder) != 0)
                            {
                                $total_all_by_mouth[$i]              += $activity->price * sizeof($activityOrder);
                                $total_of_company_by_mouth[$key][$i] += $activity->price * sizeof($activityOrder);
                                // $orders[]                = $activityOrder;
                                // $orders_by_Comp[$key][]  = $activityOrder;
                            }
                        }
                    }
                }

                // dd($companies_names);
                // dd($total_of_company_by_mouth);
                // dd($total_all_by_mouth);
            @endphp


            const mois_fr = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Déc'];

            let ctxOrderChar   = document.getElementById('orderChar').getContext('2d');
            let chartOrderChar = new Chart(ctxOrderChar, {
                type: 'line',
                data: {
                    labels: mois_fr,
                    datasets: [
                        {
                            label          : 'Montant bénéfice en Euro',
                            backgroundColor: '#aed581',
                            borderColor    : 'rgb(255, 255, 255)',
                            fillColor      : "#aed581",
                            data           : JSON.parse('{{ json_encode($total_all_by_mouth) }}')
                        },
                        @foreach($total_of_company_by_mouth as $key => $value)
                        {
                            label          : '{{ $companies_names[$key] }}',
                            backgroundColor: '#fff',
                            borderColor    : 'rgb({{ random_int (0,255) }}, {{ random_int (0,255) }}, {{ random_int (0,255) }})',
                            fillColor      : "#aed581",
                            data           : JSON.parse('{{ json_encode($value) }}')
                        },
                        @endforeach
                    ],
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

<div class="row">
    @forelse($user->companies as $company)
        <div class="col s12 m6 l4">
            <div class="card">
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
        <a class="btn mb-2" href="{{route('company_add_get')}}">Créer une entreprise <i class="fas fa-plus-square"></i></a>
    @endforelse
</div>

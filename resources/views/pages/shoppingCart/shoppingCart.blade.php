@extends('layouts.app')

@section('content')
<div class="row h-full m-0">
    @if($shoppingCart != [])
        <div class="h-full col l8 m12 pl-5 pt-1">
            <h4>Votre panier</h4>
    @else
        <div class="col s12">
    @endif
            <div class="row m-0 mt-3">
                @php $total = 0 @endphp
                @forelse($shoppingCart as $panier)
                    <div class="col s12">
                        <div class="row m-0">
                            <div class="col l4 circle shoppingCart-circle">
                                <div class="shoppingCart-img" style="background:url('{{ $panier->link0 }}')">

                                </div>
                            </div>
                            <div class="col l6">
                                <span class="title">
                                    <h5>{{ $panier->name }}</h5>
                                </span>
                            </div>
                            <div class="col l2">
                                <span class="small-text">{{ $panier->price }} €</span>

                                <a href="#!" class="">
                                    <i class="fas fa-times-circle deep-orange-text text-darken-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="shoppingCart-separator">

                    </div>
                    @php $total += $panier->price @endphp
                @empty
                    <div class="center-align col s12">
                        <h4>Il n'y a pas de panier  <i class="far fa-frown"></i></h4>
                        <p>Retouner <a href="{{route('home')}}">à l'accueil</a> pour trouver des activitées à ajouter ici</p>
                    </div>
                @endforelse

                @if($total != 0)
                    {{-- Total = {{$total}} --}}
                @endif
            </div>
        </div>

    @if($shoppingCart != [])
        <div class="h-full col l4 m12 shoppingCart-rightZone pt-2 px-2">
            @if(\Auth::check())
                <h5 class="white-text mb-2">Total : {{$total}}</h5>
                <div id="paypal-button-container">

                </div>
            @else

            @endif

            <div class="pt-1">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header">
                            <i class="fas fa-shield-alt"></i> Paiement sécurisé
                        </div>
                        <div class="collapsible-body shoppingCart-collapsible-body">
                            <span>En utilisant PayPal, vous vous assurez que votre paiement est sécurisé par une des entreprises les plus populaire au monde !</span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <i class="far fa-calendar-check"></i> Vos activitées assurées
                        </div>
                        <div class="collapsible-body shoppingCart-collapsible-body">
                            <span>Soyez serein à propos de vos activités. Si vous avez un problème, nous mettrons tout en oeuvre pour vous aider !</span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <i class="fas fa-shipping-fast"></i> Livraison instantanée
                        </div>
                        <div class="collapsible-body shoppingCart-collapsible-body">
                            <span>Recevez directement votre code par mail pour pouvoir en profiter n'importe quand !</span>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    @endif

</div>

<script src="https://www.paypal.com/sdk/js?client-id=access_token$sandbox$q887x2qg93khjss8$a27a096cca4ae5a9405962f6e298799e&currency=EUR"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({ purchase_units: [{ amount: { value: {{$total}} } }] });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                var xhr  = new XMLHttpRequest();
                xhr.open("GET", "{{route('home')}}"+ data.orderID);
                xhr.send();
            });
        },
        style: {
            layout:  'vertical',
            color:   'blue',
            shape:   'rect',
            label:   'paypal'
        },
        }).render('#paypal-button-container');
</script>
@endsection

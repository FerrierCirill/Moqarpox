@extends('layouts.app')

@section('content')
    <div class="row h-full m-0">
        <div class="h-full col l9 m12 pl-5 pt-1" style="max-height: 92vh;overflow-y: auto;">
            <h4>Votre panier</h4>

            <div class="row m-0 mt-1 pr-1">
                @php $total = 0 @endphp
                @foreach($shoppingCarts as $key => $shoppingCart)
                    <div class="col s12">
                        <div class="row m-0 p-1 pb-2 grey lighten-4">
                            {{--  --}}
                            <h5 class="mt-0">{{ $shoppingCart->activity->name }} <span class="shoppingCart-price ml-2 right small-text">{{ $shoppingCart->activity->price }} €</span></h5>

                            <h6><strong>Votre cadeau sera envoyé à :</strong></h6>
                            
                            @if($shoppingCart->friend_name != null)
                                <div class="col s12 m6"><strong>{{$shoppingCart->friend_name}}</strong> → {{$shoppingCart->friend_email}}</div>
                                <div class="col s12">{{$shoppingCart->text}}</div>
                            @else
                                <div class="col s12">Votre adresse mail : <strong>{{$shoppingCart->email}}</strong></div>
                            @endif
                        </div>
                    </div>

                    <div class="shoppingCart-separator"></div>

                    @php $total += $shoppingCart->activity->price @endphp
                @endforeach
            </div>
        </div>

        <div class="h-full col l3 m12 shoppingCart-rightZone pt-2 px-2">
            <h5 class="white-text mb-2">Total : {{$total}} €</h5>
            
            <p>
                Pour procédé au paiement vous devez accepté les <a href="{{route('terms_conditions_sale')}}">conditions générales de vente</a>
                <br><br>
                <label class="white-text">
                    <input id="CGV" type="checkbox"/>
                    <span>Je certifie avoir lu et accepté les conditions générales de vente</span>
                </label>
            </p>

            <div id="loader">

            </div>

            <div id="paypal-button-container"></div>

            <script src="https://www.paypal.com/sdk/js?client-id=access_token$sandbox$q887x2qg93khjss8$a27a096cca4ae5a9405962f6e298799e&currency=EUR"></script>
            <script>
                var OUI = false;

                async function cheackCGV() {
                    OUI = true;
                    await paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({ purchase_units: [{ amount: { value: {{$total}} } }] });
                        },
                        onApprove: function(data, actions) {
                            document.getElementById('loader').innerHTML = `<div class="progress"><div class="indeterminate"></div></div>`
                            return actions.order.capture().then(function(details) {
                                var xhr  = new XMLHttpRequest();
                                xhr.open("GET", "{{route('home')}}?idOrderPaypal="+ data.orderID);
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
                }
                
                document.getElementById('CGV').addEventListener('click', () => {
                    if(!OUI){
                        cheackCGV()
                        document.getElementById('CGV').setAttribute('disabled', '');
                    }
                });
            </script>
        </div>
    </div>
@endsection
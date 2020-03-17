@extends('layouts.app')

{{-- @section('head-needMapScript', 'ON') --}}

@section('content')




<div id="paypal-button-container"></div>





<script src="https://www.paypal.com/sdk/js?client-id=access_token$sandbox$q887x2qg93khjss8$a27a096cca4ae5a9405962f6e298799e&currency=EUR"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({ purchase_units: [{ amount: { value: '0.01' } }] });
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


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="panier_row">
        @php $total = 0 @endphp 
        @forelse($shoppingCart as $panier)
            <div class="col s12 row">
                <div class="col s12">
                    {{-- <img src="https://picsum.photos/150/150" alt=""> --}}
                    <div class="">{{ $panier->activity->name }}, <span class="small-text">{{ $panier->activity->price }} €</span></div>
                    <button class="btn">Supprimer</button>
                </div>
                <div class="col s12">
                    <button class="btn">-</button>
                    <div    class="btn">{{ $panier->quantity }}</div>
                    <button class="btn">+</button>
                </div>
                <div class="col s12">
                    <div class="panier_ligneTotal">Total : {{ $panier->quantity * $panier->activity->price }} €</div>
                </div>
            </div>
            <hr>
            @php $total += $panier->quantity * $panier->activity->price @endphp 
        @empty
            <p class="panier_noPanier">Il n'y à pas de panier ; <a href="{{route('home')}}">Retour à l'acueil</a></p>
        @endforelse

        @if($total != 0)
            Total = {{$total}}
        @endif
    </div>


    <script>
        var shoppingCart = 
            @if($shoppingCart == null) 
                null; 
            @else 
                0; 
            @endif

        if(shoppingCart == null) {
            shoppingCart = (localStorage.getItem('moqarpox_your_shopping_cart')) 
                                ? JSON.parse(localStorage.getItem('moqarpox_your_shopping_cart'))
                                : null;
            if (shoppingCart != null) {
                document.querySelector('#panier_row').innerHTML = "";

                var pR = document.querySelector('#panier_row');
                shoppingCart.forEach(panier => {
                    pR.innerHTML += `
                        <div class="col s12 row">
                            <div class="col s12">
                                <div class="">${panier.name}, <span class="small-text">${panier.price} €</span></div>
                                <button class="btn">Supprimer</button>
                            </div>
                            <div class="col s12">
                                <button class="btn">-</button>
                                <div    class="btn">${panier.quantity}</div>
                                <button class="btn">+</button>
                            </div>
                            <div class="col s12">
                                <div class="panier_ligneTotal">Total : ${panier.quantity * panier.price } €</div>
                            </div>
                        </div>
                        <hr>
                    `
                });
            }
        }
    </script>
</div>
@endsection

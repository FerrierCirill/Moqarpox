@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3" id="panier_row">
        @php $total = 0 @endphp 
        @forelse($shoppingCart as $panier)
            <div class="col s12">
                <img src="{{ $panier->link0 }}" alt="{{ $panier->name }}" class="circle">
                <span class="title">
                    <h5>{{ $panier->name }}</h5>
                </span>

                <span class="small-text">{{ $panier->price }} €</span>

                <a href="#!" class="secondary-content red-text text-darken-4">
                    <i class="fas fa-times-circle"></i>
                </a>
            </div>
            @php $total += $panier->price @endphp
        @empty
            <p class="panier_noPanier">Il n'y à pas de panier ; <a href="{{route('home')}}">Retour à l'acueil</a></p>
        @endforelse

        @if($total != 0)
            Total = {{$total}}
        @endif
    </div>


    {{-- <script>
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
                document.querySelector('#panier_row').innerHTML = "<ul>";

                var pR = document.querySelector('#panier_row');
                shoppingCart.forEach(panier => {
                    pR.innerHTML += `
                        <div class="col s12 row">
                            <div class="col s12">
                                <h5>${panier.name} <span class="small-text">${panier.price} €</span></h5>
                                <button class="btn">Supprimer</button>
                            </div>
                            <div class="col s12">
                                <button class="btn">-</button>
                                <div    class="btn">${panier.quantity}</div>
                                <button class="btn">+</button>
                            </div>
                            <div class="col s12">
                                <div class="panier_ligneTotal">Total : ${(panier.quantity * panier.price).toFixed(2) } €</div>
                            </div>
                        </div>
                        <hr>


                        <li class="collection-item avatar">
                            <img src="images/yuna.jpg" alt="" class="circle">
                            <span class="title">Title</span>
                            <p>First Line <br>
                                Second Line
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                        </li>
                    `
                });
                document.querySelector('#panier_row').innerHTML = "</ul>";
            }
        }
    </script> --}}

    {{-- <p>
        <button class="btn">-</button>
        <div    class="btn">{{ $panier->quantity }}</div>
        <button class="btn">+</button>
    </p> --}}
</div>
@endsection

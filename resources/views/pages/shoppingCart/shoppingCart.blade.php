@extends('layouts.app')

@section('content')

    <?php
        session_start();
        $_SESSION['panier'] = [
            [
                'name' => 'Vol en montgolfière',
                'prix' => 150.99,
                'qte'  => 1
            ],

            [
                'name' => 'Diner à thème',
                'prix' => 42,
                'qte'  => 3
            ],

            [
                'name' => 'Saut en parachute',
                'prix' => 404,
                'qte'  => 1
            ]
        ];
    ?>

    <div class="flex justify-center w-full flex-wrap bg-gray-400">
        @forelse($_SESSION['panier'] as $panier)
            <div class="w-8/12 bg-gray-200 my-5 p-3 shadow-lg align-middle">
                <div class="flex justify-between">
                    {{-- <img src="https://picsum.photos/150/150" alt=""> --}}
                    <div class="panier_name font-medium text-2xl">{{ $panier['name'] }}, <span class="panier_prix text-sm font-normal">{{ $panier['prix'] }} €</span></div>
                    <button class="btn py-1 px-3 rounded-full bg-gray-300 hover:bg-red-200 panier_btn_supp">Supprimer</button>
                </div>
                <div class="flex my-1">
                    <button class="btn py-1 px-3 mr-3 rounded-full hover:bg-gray-600 hover:text-white bg-gray-500 panier_btn_moin">-</button>
                    <div    class="btn py-1 px-3 mr-3 panier_nombreQte">{{ $panier['qte'] }}</div>
                    <button class="btn py-1 px-3 mr-3 rounded-full hover:bg-gray-600 hover:text-white bg-gray-500 panier_btn_plus">+</button>
                </div>
                <div class="flex justify-end">
                    <div class="panier_ligneTotal">Total : {{ $panier['qte'] * $panier['prix'] }} €</div>
                </div>
            </div>
            <hr class="w-8/12">
        @empty
            <p class="panier_noPanier">Il n'y à pas de panier ; <a href="{{route('home')}}">Retour à l'acueil</a></p>
        @endforelse
    </div>
@endsection

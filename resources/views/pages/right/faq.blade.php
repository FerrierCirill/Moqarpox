@extends('layouts.app')

@section('content')
    <style>
        .faq h4{
            margin-left: 3rem;
        }
        .faq li {
            margin-bottom: 15px;
            list-style-type: circle !important;
            margin-left: 9rem;
        }
        .faq button {
            margin: 0px 10px;
        }

        .faq p {
            margin-left: 6rem;
        }

        .faq blockquote {
            margin-left: 6rem;
        }

        .faq hr {
            margin: 3rem 0px;
        }

        .faq hr.separator {
            width: 90%;
            margin-left: 2.5rem;
        }
    </style>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large" href="#main">
            <i class="fas fa-angle-double-up"></i>
        </a>
    </div>

    <div class="container">
        <div class="row center-align">
            <h2 style="font-weight:600" id="main">Comment on peut vous aidez ?</h2>
        </div>
    </div>

    <div class="container center-align px-2" style="display:flex;justify-content: space-around;flex-wrap: wrap; align-content:stretch">
        <a  href="#compte"
            class="center-align hoverable z-depth-2 p-3  mb-2" style="min-width:20%; color:#5c6bc0; cursor:pointer">
            <i class="fas fa-user-cog" style="font-size:60px"></i>
            <h4>Compte</h4>
        </a>

        <a  href="#cadeaux"
            class="center-align hoverable z-depth-2 p-3  mb-2" style="min-width:20%; color:#5c6bc0; cursor:pointer">
            <i class="fas fa-gifts" style="font-size:60px"></i>
            <h4>Cadeaux</h4>
        </a>

        <a  href="#paiement"
            class="center-align hoverable z-depth-2 p-3  mb-2" style="min-width:20%; color:#5c6bc0; cursor:pointer">
            <i class="fab fa-paypal" style="font-size:60px"></i>
            <h4>Paiement</h4>
        </a>

        <a  href="#prestataire"
            class="center-align hoverable z-depth-2 p-3  mb-2" style="min-width:20%; color:#5c6bc0; cursor:pointer">
            <i class="fas fa-business-time" style="font-size:60px"></i>
            <h4>Prestataire</h4>
        </a>
    </div>

    <div class="container faq">
        <div class="row">
            <div class="col s12">
                <h3 id="compte" class="pt-5">Compte</h3>

            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h3 id="cadeaux" class="pt-5">Cadeaux</h3>

                <h4>Comment offrir un cadeau ?</h4>
                    <blockquote>
                        <strong>
                        ** Pour validé votre pannier il vous faudra un compte d'on l'email est validé, vous pouvez le faire à n'importe quel moment des étapes ci-dessous. Pour plus d'info vous pouvez lire : <a href="#validationMail">"Comment validé mon email ? "</a>.<br>Pour créé un compte vous pouvez vous rendre ici : <a href="{{route('register')}}">Inscription</a>
                        </strong>
                    </blockquote>

                    <ul>
                        <li>Trouvé une activité que vous voulez offrir (vous pouvez faire une recherche via la carte <a href="{{route('home')}}">disponible ici</a>.</li>
                        <li>Ajouter les activités au panier grâce au button <button class="btn">Ajouter au panier</button>.</li>
                        <li>Rendez-vous sur la page pannier grace à l'icon <strong>" <a href="{{route('shopping_cart')}}"><i class="fas fa-shopping-cart"></i></a> "</strong>.</li>
                        <li>** Connecter vous.</li>
                        <li>Saisir ou nom des adresses mail particulière pour des destinataires particulier <em>(si vous ne remplissez pas tous les champs, vous receverez sur votre adresse email le cadeau)</em>.</li>
                        <li>Clique sur Valider le panier.</li>
                        <li>Accepter les conditions.</li>
                        <li>Payer par Paypal ou grace a votre carte bancaire <em>(pour plus d'information, lire <a href="#paiement">la rubrique paiement</a>)</em>.</li>
                    </ul>

                <hr class="separator">

                <h4>Comment utiliser un cadeau ?</h4>
                    <ul>
                        <li>Vous avez reçu par courrier, ou en main propre un document comportant le code d’une activitée.</li>
                        <li>Rendez vous sur le site et rechercher votre activité pour accéder à ses détails</li>
                        <li>Au besoin contacter l’entreprise pour confirmer la date ou la réservation <em>(conseillé fortement)</em></li>
                        <li>Avant de réaliser votre activité, vous devez vous être muni de votre code.</li>
                        <li>Donner ce code au prestataire pour valider votre bon, penser à garder une photocopie du document.</li>
                        <li>Effectué l’activité</li>
                    </ul>

                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h3 id="paiement" class="pt-5">Paiement</h3>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h3 id="prestataire" class="pt-5">Prestataire</h3>

                <h4>Comment ajouter une activité ?</h4>
                    <blockquote>
                        <strong>Nécessite : Avoir une entreprise valide. Voir devenir prestataire.</strong>
                    </blockquote>

                    <ul class="faq">
                        <li>Connecter vous avec votre compte</li>
                        <li>Cliquer sur l'icon <strong>" <i class="fas fa-user"></i> "</strong> dans la bare de navigation pour accéder à votre compte</li>
                        <li>Rendez-vous sur la page de votre entreprise</li>
                        <li>Cliquer sur <button class="btn">Ajouter une activité <i class="fas fa-plus-square"></i></button></li>
                        <li>Remplisez les différents champs puis validé avec le button <button class="btn">Ajouter <i class="fas fa-save"></i></button></li>
                    </ul>

                    <p>Une fois ajouter notre équipe ce chargera de verifier votre ajout, une fois validé/refusé vous receverez un email à l'adresse renseignez lors de votre inscription à Mouqarpox <em>(pour plus d'information : <a href="{{route('terms_conditions_use')}}">CGU</a>)</em></p>

                <hr class="separator">

                <h4>Comment retirer une activité/ une entreprise?</h4>
                    <p>Pour le moment Mouqarpox ne propose pas de supprimer une activité créé, vous pouvez la désactiver pour qu'elle ne soit plus accesible au utilisateur ou contacter Mouqarpox à l’adresse contact[at]mouqarpox.fr</p>

                <hr>


                <h4>Comment modifier une entreprise ?</h4>
                    <blockquote>
                        <strong>Avoir une entreprise valide. Voir devenir prestataire.</strong>
                    </blockquote>

                    <ul>
                        <li>Connecter vous avec votre compte</li>
                        <li>Cliquer sur l'icon <strong>"  <a href="{{route('user_details')}}"><i class="fas fa-user"></i></a> "</strong> dans la bare de navigation pour accéder à votre compte</li>
                        <li>Rendez-vous sur la page de votre entreprise</li>
                        <li>Cliquer sur <button class="btn">Modifier <i class="fas fa-edit"></i></button></li>
                        <li>Remplisez les différents champs <em>(<strong>Attention</strong> : La photo sera alors supprimée, il vous faudra remettre la photo avant l’envoie du formulaire)</em><br>puis validé avec le button <button class="btn">Enregistrer <i class="fas fa-save"></i></button></li>
                    </ul>
            </div>

        </div>

    </div>

@endsection

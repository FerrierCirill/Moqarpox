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
            <h2 style="font-weight:600" id="main">Comment pouvons-nous vous aider ?</h2>
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

                    <h4>Comment créer un compte ?</h4>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h3 id="cadeaux" class="pt-5">Cadeaux</h3>

                <h4>Comment offrir un cadeau ?</h4>
                    <blockquote>
                        <strong>
                        ** Pour valider votre pannier il vous faudra un compte dont l'email est validé, vous pouvez le faire à n'importe quel moment des étapes ci-dessous. Pour plus d'infos vous pouvez lire : <a href="#validationMail">"Comment valider mon email ? "</a>.<br>Pour créer un compte vous pouvez vous rendre ici : <a href="{{route('register')}}">Inscription</a>
                        </strong>
                    </blockquote>

                    <ul>
                        <li>Trouvez une activité que vous voulez offrir (vous pouvez faire une recherche via la carte <a href="{{route('home')}}">disponible ici</a>.</li>
                        <li>Ajoutez les activités au panier grâce au bouton <button class="btn">Ajouter au panier</button>.</li>
                        <li>Rendez-vous sur la page panier grâce à l'icone <strong>" <a href="{{route('shopping_cart')}}"><i class="fas fa-shopping-cart"></i></a> "</strong>.</li>
                        <li>** Connectez vous.</li>
                        <li>Saisissez ou non des adresses mail pour les destinataires de vos cadeaux  <em>(si vous ne remplissez pas tous les champs, vous receverez le cadeau sur votre mail)</em>.</li>
                        <li>Cliquez sur Valider le panier.</li>
                        <li>Acceptez les conditions.</li>
                        <li>Payez par Paypal ou grâce à votre carte bancaire <em>(pour plus d'informations, lire <a href="#paiement">la rubrique paiement</a>)</em>.</li>
                    </ul>

                <hr class="separator">

                <h4>Comment utiliser un cadeau ?</h4>
                    <ul>
                        <li>Vous avez reçu par courrier, ou en main propre un document comportant le code d’une activité.</li>
                        <li>Rendez vous sur le site et rechercher votre activité pour accéder à ses détails.</li>
                        <li>Au besoin contacter l’entreprise pour confirmer la date ou la réservation <em>(conseillé fortement)</em>.</li>
                        <li>Avant de réaliser votre activité, vous devez vous être munis de votre code.</li>
                        <li>Donner ce code au prestataire pour valider votre bon, penser à garder une photocopie du document.</li>
                        <li>Effectuer l’activité !</li>
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

                <h4>Comment devenir prestataire / Créer un entrprise ?</h4>
                    <ul>
                        <li>Connectez vous à votre compte <em>(Voir <a href="#compte">créer un compte</a>)</em></li>
                        <li>Cliquez sur l'icone <strong>"  <a href="{{route('user_details')}}"><i class="fas fa-user"></i></a> "</strong> dans la barre de navigation pour accéder à votre compte</li>
                        <li>Cliquez sur <a class="btn" href="{{route('company_add_get')}}'">Déposer une offre <i class="fas fa-paper-plane" aria-hidden="true"></i></a> ou <a href="{{route('company_add_get')}}" class="btn">Créer une entreprise <i class="fas fa-plus-square" aria-hidden="true"></i></a> si vous êtes déjà  prestataire sur Mouqarpox</li>
                        <li>Remplissez les différents champs</li>
                        <li>Puis validez en cliquant sur <button class="btn">Ajouter <i class="fas fa-save"></i></button></li>
                    </ul>

                    <p>Une fois ajoutée notre équipe se chargera de verifier votre ajout, une fois validée/refusée vous recevrez un email à l'adresse renseignée lors de votre inscription à Mouqarpox <em>(pour plus d'informations : <a href="{{route('terms_conditions_use')}}">CGU</a>)</em></p>

                <hr class="separator">

                <h4>Comment ajouter une activité ?</h4>
                    <blockquote>
                        <strong>Nécessite : Avoir une entreprise valide. Voir devenir prestataire.</strong>
                    </blockquote>

                    <ul class="faq">
                        <li>Connectez vous avec votre compte</li>
                        <li>Cliquez sur l'icone <strong>" <i class="fas fa-user"></i> "</strong> dans la barre de navigation pour accéder à votre compte</li>
                        <li>Rendez-vous sur la page de votre entreprise</li>
                        <li>Cliquez sur <button class="btn">Ajouter une activité <i class="fas fa-plus-square"></i></button></li>
                        <li>Remplisez les différents champs puis valider avec le bouton <button class="btn">Ajouter <i class="fas fa-save"></i></button></li>
                    </ul>

                    <p>Une fois ajoutée notre équipe se chargera de verifier votre ajout, une fois validée/refusée vous recevrez un email à l'adresse renseigneée lors de votre inscription à Mouqarpox <em>(pour plus d'information : <a href="{{route('terms_conditions_use')}}">CGU</a>)</em></p>

                <hr class="separator">

                <h4>Comment retirer une activité/ une entreprise?</h4>
                    <p>Pour le moment Mouqarpox ne propose pas de supprimer une activité créée, vous pouvez la désactiver pour qu'elle ne soit plus accesible aux utilisateurs ou contacter Mouqarpox à l’adresse contact[at]mouqarpox.fr</p>

                <hr class="separator">


                <h4>Comment modifier une entreprise ?</h4>
                    <blockquote>
                        <strong>Avoir une entreprise valide. Voir Devenir prestataire.</strong>
                    </blockquote>

                    <ul>
                        <li>Connectez vous avec votre compte</li>
                        <li>Cliquez sur l'icone <strong>"  <a href="{{route('user_details')}}"><i class="fas fa-user"></i></a> "</strong> dans la bare de navigation pour accéder à votre compte</li>
                        <li>Rendez-vous sur la page de votre entreprise</li>
                        <li>Cliquez sur <button class="btn">Modifier <i class="fas fa-edit"></i></button></li>
                        <li>Remplisez les différents champs <em>(<strong>Attention</strong> : La photo sera alors supprimée, il vous faudra remettre la photo avant l’envoie du formulaire)</em><br>puis validé avec le button <button class="btn">Enregistrer <i class="fas fa-save"></i></button></li>
                    </ul>

                <hr class="separator">

                <h4>Un client se présente avec un cadeau Mouqarpox© ?</h4>
                    <blockquote>
                        Avant de réaliser toute activité, nous vous conseillons de suivre ce déroulement. Sans cela Mouqarpox ne peut vous garantir le rembourcement de votre prestation.<br>
                        <strong>Seul un code vérifié sur Mouqarpox peut servir de preuve d'achat.</strong>
                    </blockquote>

                    <ul>
                        <li>Demandeé à votre client le code qui lui a été remis lors de son achat</li>
                        <li>Connectez-vous</li>
                        <li>Rendez vous sur votre profil en cliquant sur l'icon <strong>"  <a href="{{route('user_details')}}"><i class="fas fa-user"></i></a> "</strong> dans la bare de navigation pour accéder à votre compte</li>
                        <li>Cliquez sur <a class="btn" href="{{ route('user_customer_code_get') }}">Récupérer un code <i class="fas fa-money-bill-wave" aria-hidden="true"></i></a></li>
                        <li>Rentrez le code demandé précédemment et valider</li>
                        <li>Suivez les instruction écrite : <br>
                            <span style="margin-left:1.2rem">- Soit le code soit le code est valide et vous pouvez réaliser l'activité <em>(Mouqarpox créditera votre compte sous 30 jours, pour plus d'information voir les <a href="{{route('terms_conditions_sale')}}">conditions generales de vente</a> et les <a href="{{route('terms_conditions_use')}}">condition générale d'utilisation</a>)</em></span><br>
                            <span style="margin-left:1.2rem">- Soit le code est inconnu ou à déjà etait utiliser<span></li>
                    </ul>
                    <p><br><br>La prochaine fois rendez-vous directement à l'adresse <a href="{{ route('user_customer_code_get') }}">{{ route('user_customer_code_get') }}</a> en l'ajoutant à vos favoris <em>(vous devez être connecté)</em></p>
            </div>

        </div>

    </div>

@endsection

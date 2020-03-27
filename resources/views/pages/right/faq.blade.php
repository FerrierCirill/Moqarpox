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
            <h4>Utilisateur</h4>
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
                <h3 id="compte" class="pt-5">Utilisateur</h3>

                  <h4>Comment créer un compte ?</h4>

                      <ul>
                          <li>Cliquez sur l'onglet "Inscription" <em>(en haut à droite)</em>.</li>
                          <li>Remplissez les informations oligatoires.</li>
                      </ul>

                  <hr class="separator">


                  <h4 id="validationMail" >Comment valider son mail ?</h4>

                      <ul>
                          <li> Effectuez la procédure de création de compte</li>
                          <li> Vérifiez vos mails <em>(si vous n'avez rien reçu, vérifiez vos spams)</em></li>
                          <li> Cliquez sur le lien présent dans le mail. </li>
                      </ul>


                  <hr class="separator">


                  <h4>Comment récupérer son mot de passe ?</h4>

                      <ul>
                          <li> Cliquez sur l'onglet "Connexion" <em>(en haut à droite)</em>. </li>
                          <li> Cliquez sur Mot de passe oublié ?. </li>
                          <li> Vérifiez vos mails <em>(si vous n'avez rien reçu, vérifiez vos spams)</em> </li>
                          <li> Cliquez sur le lien présent dans le mail. </li>
                          <li> Entrez votre nouveau mot de passe. </li>
                      </ul>


                  <hr class="separator">


                  <h4>Comment déposer un commentaire ?</h4>

                      <ul>
                          <li> Cliquez sur Déposer un avis </li>
                          <li> Saisissez le code fourni dans votre mail.</li>
                          <li> Si le prestataire a bien enregistré votre participation, vous pourrez déposer votre commentaire. </li>
                      </ul>

                  <hr class="separator">


                  <h4>Mon commentaire ne s'affiche pas ?</h4>

                      <ul>
                          <li> Tout les commentaires doivent être modérés par Mouquarpox, il est donc en cours de validation ou ne respectait pas les conditions requises pour ête validé.</li>
                      </ul>


                  <hr class="separator">


                  <h4>Comment modifier/supprimer mon commentaire ?</h4>

                      <ul>
                          <li> Il est impossible de modifier un commentaire validé. Pour tout problème/demande de suppression, contactez contant@mouquarpox.fr.</li>
                      </ul>


                  <hr class="separator">


            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h3 id="cadeaux" class="pt-5">Cadeaux</h3>

                <h4>Comment offrir un cadeau ?</h4>
                    <blockquote>
                        <strong>
                        ** Pour valider votre pannier il vous faudra un compte dont l'mail est validé, vous pouvez le faire à n'importe quel moment des étapes ci-dessous. Pour plus d'infos vous pouvez lire : <a href="#validationMail">"Comment valider mon mail ? "</a>.<br>Pour créer un compte vous pouvez vous rendre ici : <a href="{{route('register')}}">Inscription</a>
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
                        <li>Donnez ce code au prestataire pour valider votre bon, penser à garder une photocopie du document.</li>
                        <li>Effectuez l’activité !</li>
                    </ul>

                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h3 id="paiement" class="pt-5">Paiement</h3>

                <h4>Payer via Paypal</h4>
                    <blockquote>
                        <strong>Payer via Paypal demande un compte Paypal qui est une entreprise extérieure à Mouqarpox. Pour plus d’informations sur Paypal, visitez le lien <a href="https://www.paypal.com/bj/smarthelp/topic/MY_ACCOUNT">suivant</a>.</strong>
                    </blockquote>
                    <ul>
                        <li>Lors de la sélection du mode de paiement, sélectionnez Paypal.</li>
                        <li>Connectez vous à votre compte Paypal.</li>
                        <li>Choisissez votre moyen de paiement.</li>
                        <li>Validez le paiement.</li>
                    </ul>

                <hr class="separator">

                <h4>Payer via Carte Bancaire</h4>

                    <ul>
                      <li>Lors de la sélection du mode de paiement, sélectionnez Carte Bancaire.</li>
                      <li>Entrez vos informations de paiement.</li>
                      <li>Suivez les instructions à l’écran <em>(dépendantes de votre banque)</em>.</li>
                      <li>Validez le paiement</li>
                    </ul>

            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <h3 id="prestataire" class="pt-5">Prestataire</h3>

                <h4>Comment devenir prestataire / Créer une entreprise ?</h4>
                    <ul>
                        <li>Connectez vous à votre compte <em>(Voir <a href="#compte">créer un compte</a>)</em></li>
                        <li>Cliquez sur l'icone <strong>"  <a href="{{route('user_details')}}"><i class="fas fa-user"></i></a> "</strong> dans la barre de navigation pour accéder à votre compte</li>
                        <li>Cliquez sur <a class="btn" href="{{route('company_add_get')}}'">Déposer une offre <i class="fas fa-paper-plane" aria-hidden="true"></i></a> ou <a href="{{route('company_add_get')}}" class="btn">Créer une entreprise <i class="fas fa-plus-square" aria-hidden="true"></i></a> si vous êtes déjà  prestataire sur Mouqarpox</li>
                        <li>Remplissez les différents champs</li>
                        <li>Puis validez en cliquant sur <button class="btn">Ajouter <i class="fas fa-save"></i></button></li>
                    </ul>

                    <p>Une fois ajoutée notre équipe se chargera de verifier votre activité, une fois validée/refusée vous recevrez un mail à l'adresse renseignée lors de votre inscription à Mouqarpox <em>(pour plus d'informations : <a href="{{route('terms_conditions_use')}}">CGU</a>)</em></p>

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

                    <p>Une fois ajoutée notre équipe se chargera de verifier votre activité, une fois validée/refusée vous recevrez un mail à l'adresse renseigneée lors de votre inscription à Mouqarpox <em>(pour plus d'information : <a href="{{route('terms_conditions_use')}}">CGU</a>)</em></p>

                <hr class="separator">

                <h4>Comment retirer une activité/une entreprise?</h4>
                    <p>Pour le moment Mouqarpox ne propose pas de supprimer une activité ou une entreprise, vous pouvez la désactiver pour qu'elle ne soit plus accesible aux utilisateurs ou contacter Mouqarpox à l’adresse contact@mouqarpox.fr</p>

                <hr class="separator">


                <h4>Comment modifier une activité ?</h4>
                    <blockquote>
                        <strong>Avoir une activité. Voir Ajouter une activité.</strong>
                    </blockquote>

                    <ul>
                        <li>Pour le moment Mouqarpox ne propose pas de modifier une activité, vous pouvez la désactiver pour qu'elle ne soit plus accesible aux utilisateurs ou contacter Mouqarpox à l’adresse contact@mouqarpox.fr. Ce n'est qu'après que vous pourrez créer une nouvelle activité similaire.</li>
                    </ul>

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

                <h4>Un client se présente avec un cadeau Mouqarpox, comment se faire payer ?</h4>
                    <blockquote>
                        Avant de réaliser toute activité, nous vous conseillons de suivre ce déroulement. Sans cela Mouqarpox ne peut vous garantir le rembourcement de votre prestation.<br>
                        <strong>Seul un code vérifié sur Mouqarpox peut servir de preuve d'achat.</strong>
                    </blockquote>

                    <ul>
                        <li>Demandez à votre client le code qui lui a été remis lors de son achat</li>
                        <li>Connectez-vous</li>
                        <li>Rendez vous sur votre profil en cliquant sur l'icone <strong>"  <a href="{{route('user_details')}}"><i class="fas fa-user"></i></a> "</strong> dans la bare de navigation pour accéder à votre compte</li>
                        <li>Cliquez sur <a class="btn" href="{{ route('user_customer_code_get') }}">Récupérer un code <i class="fas fa-money-bill-wave" aria-hidden="true"></i></a></li>
                        <li>Rentrez le code demandé précédemment et valider</li>
                        <li>Suivez les instructiosn écrites : <br>
                            <span style="margin-left:1.2rem">- Soit le code soit le code est valide et vous pouvez réaliser l'activité <em>(Mouqarpox créditera votre compte sous 30 jours, pour plus d'information voir les <a href="{{route('terms_conditions_sale')}}">conditions generales de vente</a> et les <a href="{{route('terms_conditions_use')}}">condition générale d'utilisation</a>)</em></span><br>
                            <span style="margin-left:1.2rem">- Soit le code est inconnu ou à déjà etait utiliser<span></li>
                    </ul>
                    <p><br><br>La prochaine fois rendez-vous directement à l'adresse <a href="{{ route('user_customer_code_get') }}">{{ route('user_customer_code_get') }}</a> en l'ajoutant à vos favoris <em>(vous devez être connecté)</em></p>
            </div>

        </div>

    </div>

@endsection

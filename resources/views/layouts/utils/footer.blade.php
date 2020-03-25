<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l4">
                <h5>A propos de Mouqarpox</h5>
                    <a href="{{route('legal_mentions')}}" class="white-text">Qui sommes-nous ?</a>
                <br><a href="#!" class="white-text">Charte qualité</a>
                <br><a href="#!" class="white-text">Idées séjours Mouqar-Weekend</a>
                <br><a href="#!" class="white-text">Recrutement</a>
                <br><a href="#!" class="white-text">Partenaria Mouqarpox</a>
            </div>

            <div class="col s12 m6 l4">
                <h5>Pour les professionnels</h5>
                    <a href="{{route('company_add_get')}}" class="white-text">Devenir partenaire ou parrainer un établissement</a>
                <br><a href="{{route('user_details')}}"    class="white-text">Accéder à votre Espace Partenaire</a>
                <br><a href="#!" class="white-text">Solutions pour entreprises</a>
                <br><a href="#!" class="white-text">Solutions pour comités d'entreprise</a>
            </div>

            <div class="col s12 m6 l4">
                <h5>Besoin d'aide ?</h5>
                    <a href="#!" class="white-text">Aide</a>
                <br><a href="#!" class="white-text">Comment ça marche ?</a>
                <br><a href="{{route('terms_conditions_sale')}}" class="white-text">Conditions de livraison</a>
                <br><a href="{{route('terms_conditions_sale')}}" class="white-text">Échange et prolongation</a>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © {{date('Y')}} Mouqarpox
            <a class="grey-text text-lighten-4 right ml-1" href="{{route('legal_mentions')}}">Mentions légales</a>
            <a class="grey-text text-lighten-4 right ml-1" href="{{route('terms_conditions_use')}}">CGU</a>
            <a class="grey-text text-lighten-4 right ml-1" href="{{route('terms_conditions_sale')}}">CGV</a>
            <a class="grey-text text-lighten-4 right ml-1" href="{{route('faq')}}">FAQ</a>
        </div>
    </div>
</footer>

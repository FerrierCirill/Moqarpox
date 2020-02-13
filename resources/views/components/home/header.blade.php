<header class="parallax-container">
    <div class="parallax">
        <img src="{{$activity->pictures[0]->link}}">
    </div>
    
    <div class="row">
        <div class="col s12 l6 mb-2 ">
            <h2 class="H2-title-header">{{$activity->name}}</h2>
            
            <div class="H2-container-header right">
                <div class="price">{{$activity->price}} $</div>
                <div class="note">
                    {{-- {{$activity->note}} / 5<br> --}}
                    @include('components.star', ['note' => $activity->note])
                </div>
            </div>
        </div>
        <div class="col s12 l6">
            <div class="bg-white px-2 pb-2 pt-1 mb-1">
                <h1 class="H1-call-to-action">Trouvez des activités, des séjours et plus encore pour vous ou pour offrir !</h1>

                <div class="input-field">
                    <label for   = "generalInputSearch">Recherche</label>
                    <input class="validate"
                        id          = "generalInputSearch"
                        type        = "text"
                        placeholder = "Chercher une formule">
                </div>

                <button class="btn">Rechercher</button>
            </div>

            <div class="bg-white px-2 py-1 show-on-small hide-on-med-and-up center-align">
                <div class="row">
                    <div class="col s12 m8 center-align">
                        <p class="small-text">Vous êtes un professionnel et vous proposer des activités ou des séjours a vos clients ? Mettais vous en avant en apparaissent sur Mouqarpox </p>
                    </div>
                    <div class="col s12 m4 center-align">
                        <a href="{{route('company_add_get')}}">Déposer une offre <i class="fas fa-paper-plane"></i></a>                    
                    </div>
                </div>
            </div>

            <div class="bg-white px-2 py-1 show-on-medium-and-up hide-on-small-only">
                <div class="row valign-wrapper ">
                    <div class="col s12 m8 col-sparator-r valign-wrapper">
                        <p class="small-text">Vous êtes un professionnel et vous proposer des activités ou des séjours a vos clients ? Mettais vous en avant en apparaissent sur Mouqarpox </p>
                    </div>
                    <div class="col s12 m4 valign-wrapper">
                        <a href="{{route('company_add_get')}}">Déposer une offre <i class="fas fa-paper-plane"></i></a>                    
                    </div>
                </div>
            </div>

        </div>
    </div>
        
</header>
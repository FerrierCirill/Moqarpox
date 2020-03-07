<header class="parallax-container h-full">
    <div class="parallax">
        <img src="{{asset($activity->link0)}}">
    </div>

    <div class="row">
        <div class="col s12 l7 mb-2 ">
            <a href="{{route('activity_details', ['activity_id' => $activity->id])}}">
                <h2 class="H2-title-header">{{$activity->name}}</h2>
            </a>
                       

            
            <div class="right">
                <div class="H2-container-header">
                    <div class="home-price">{{$activity->price}} €</div>
                    <div class="note">
                        @include('components.star', ['note' => $activity->note])
                    </div>              
                </div>

                <a  class="btn button-acheter-header w-100" 
                    href="{{route('activity_details', ['activity_id' => $activity->id ])}}">
                    Acheter
                </a>
            </div>
        </div>
        <div class="col s12 l5">
            <div class="bg-white px-2 pb-2 pt-1 mb-1">
                <h1 class="H1-call-to-action mb-1">Trouvez des activités, des séjours et plus encore pour vous ou pour offrir !</h1>

                <div class="input-field mt-2">
                    <input list="results" type="text" id="search" oninput="setdatalist()" placeholder="Ville, Activité, Domaine..." autocomplete="no">
                    <input list="type" id="type" type="text" hidden>
                    <datalist id="results"></datalist>
                </div>

                <div class="py-1 mb-2">
                    <a href="#scrollToMap" class="btn right" style="width:42%" id="recherche" onclick="searchCompanies()">Rechercher</a>
                </div>
            </div>

            <div class="bg-white px-2 py-1 show-on-small hide-on-med-and-up center-align">
                <div class="row">
                    <div class="col s12 m8 center-align">
                        <p class="small-text">Vous êtes un professionnel et vous proposer des activités ou des séjours a vos clients ? Mettez vous en avant en apparaissant sur Mouqarpox </p>
                    </div>
                    <div class="col s12 m4 center-align">
                        <a href="{{route('company_add_get')}}">Déposer une offre <i class="fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>

            <div class="bg-white px-2 py-1 show-on-medium-and-up hide-on-small-only">
                <div class="row valign-wrapper ">
                    <div class="col s12 m8 col-sparator-r valign-wrapper">
                        <p class="small-text">Vous êtes un professionnel et vous proposer des activités ou des séjours a vos clients ? Mettez vous en avant en apparaissant sur Mouqarpox </p>
                    </div>
                    <div class="col s12 m4 valign-wrapper">
                        <a class="mt-2" href="{{route('company_add_get')}}">Déposer une offre <i class="fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="scrollAction">
        <a href="#scrollToCategorie" class="btn-floating btn-large scrollAction">
            <?xml version="1.0" encoding="UTF-8"?>
            <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="transform: rotate(0.5turn)">
                <style>
                    .scroll-mouse{
                animation-duration: 1.3s;
                    animation-name: scrolldown;
                    animation-iteration-count: infinite;
                }
                @keyframes scrolldown {
                    0% {
                        opacity: 0;
                        transform: translate(0, 6px);
                    }
                    50% {
                        opacity: 1;
                        transform: translate(0, 0);
                    }
                    100% {
                        opacity: 0;
                        transform: translate(0, 6px);
                    }
                }
                </style>
                <path d="M10,32 C20,32 20,24.94 20,16 C20,7.06 20,0 10,0 C0,0 0,7.06 0,16 C0,24.94 0,32 10,32" id="Fill-1" fill="#404040"></path>
                <path class="scroll-mouse" d="M8,6 C8,4.896 8.896,4 10,4 C11.104,4 12,4.896 12,6 C12,7.104 11.104,8 10,8 C8.896,8 8,7.104 8,6" id="Fill-3" fill="#FFFFFF"></path>
            </svg>
        </a>
    </div>

</header>

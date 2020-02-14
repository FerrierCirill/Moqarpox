<footer class="page-footer">
    <div class="container">
        @php
            $footer_category = App\Category::all()
        @endphp
        <div class="row">
            @foreach ($footer_category as $category)
                <div class="col s12 m6 l3">
                    <h5 class="white-text">{{$category->name}}</h5>
                    <ul>
                        @foreach($category->subcategories as $subcategory)
                            <li><a class="grey-text text-lighten-3" href="#!">{{$subcategory->name}}</a></li>
                        @endforeach
                    </ul> 
                </div>
            @endforeach
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © {{date('Y')}} Mouqarpox
            <a class="grey-text text-lighten-4 right ml-1" href="{{route('legal_mentions')}}">Mentions légales</a>
            <a class="grey-text text-lighten-4 right ml-1" href="{{route('terms_conditions_use')}}">CGU</a>
            <a class="grey-text text-lighten-4 right ml-1" href="{{route('terms_conditions_sale')}}">CGV</a>
        </div>
    </div>
</footer>
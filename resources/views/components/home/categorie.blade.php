<div class="row pt-5 mb-4" id="scrollToCategorie">
    @forelse($categories as $category)
        <div class="col s12 m6 l3">
            <a href="#scrollToMap" onclick="recherche({{$category->id}})">
                <div class="card microSmallCard hoverable">
                    <div class="card-image" style="overflow: hidden;height: 235px;">
                        <img class="card-category" src="{{ asset($category->link) }}">
                        <span class="card-title">{{$category->name}}</span>
                        {{-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> --}}
                    </div>
                </div>
            </a>
        </div>
    @empty

    @endforelse
</div>

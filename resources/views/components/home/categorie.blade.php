<div class="row">
    @forelse($companies as $company)
        <div class="col s12 m6 l3">
             <div class="card">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <span class="card-title">{{$company->name}}</span>
                    {{-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> --}}
                </div>
            </div>
        </div>
    @empty
        
    @endforelse
</div>
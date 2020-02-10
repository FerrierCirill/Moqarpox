{{-- {{$pictures[0]->link}} --}}
<header style="background:url('https://picsum.photos/seed/picsum/1080/720')" class=""> 
    <div class="container">
        <div class="col s12 m8">
           <h2 class="">{{$activity->name}}</h2>
        </div>
        <div class="col s12 m4">
            @include('components.form.header_AjaxForm')
        </div>
    </div>
</header>
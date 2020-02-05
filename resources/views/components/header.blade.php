{{-- {{$pictures[0]->link}} --}}
<header style="background:url('https://picsum.photos/seed/picsum/1080/720')" class="min-h-screen p-5 "> 
    <div class="flex justify-between p-16">
        <div class="w-2/3">
           <h2 class="text-white text-4xl p-5 bg-gray-600 font-medium mr-16">{{$activity->name}}</h2>
        </div>
        <div class="w-1/3">
            @include('components.form.header_AjaxForm')
        </div>
    </div>
</header>
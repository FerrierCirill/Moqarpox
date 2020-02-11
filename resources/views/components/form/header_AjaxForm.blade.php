<div class="">
    <div class="">
        <h1 class="">Trouvez des activités, des séjours et plus encore pour vous ou pour offrir !</h1>
    </div>

    <div class="">
        @include('components.form.search_filter.input.what',  ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pr-1'])
        @include('components.form.search_filter.input.where', ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pl-1'])
    </div>

    <div class="">
        @include('components.form.search_filter.select.category',    ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pr-1'])
        @include('components.form.search_filter.select.subCategory', ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pl-1'])
    </div>

    <div class="">
        <label for="budget">Budget ?</label>
        @include('components.form.search_filter.range.budget')
    </div>

    <button class="btn">Rechercher</button>

    <div class=""></div>
</div>
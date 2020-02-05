<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
        <h1 class="text-2xl font-black">Trouvez des activités, des séjours et plus encore pour vous ou pour offrir !</h1>
    </div>

    <div class="flex flex-row mb-4 flex-wrap">
        @include('components.form.search_filter.input.what',  ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pr-1'])
        @include('components.form.search_filter.input.where', ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pl-1'])
    </div>

    <div class="flex flex-row mb-4 flex-wrap">
        @include('components.form.search_filter.select.category',    ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pr-1'])
        @include('components.form.search_filter.select.subCategory', ['from_include' => 'header-AjaxForm', 'size_include' => 'w-1/2 pl-1'])
    </div>

    <div class="flex-row mb-4">
        <label for="budget">Budget ?</label>
        @include('components.form.search_filter.range.budget')
    </div>

    <button class="goSearch btn mb-4 w-full bg-gray-500 p-2 mt-5 text-white">Rechercher</button>

    <div class=""></div>
</div>
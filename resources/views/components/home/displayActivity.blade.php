<div class="input-field m-0" style="height:70vh">
    <div class="row m-0">
        <div class="col s12 m3">
            <label for="what">Quoi ? </label>
            <input type="text" id="what">
        </div>
        <div class="col s12 m3">
            <label for="where">Où ? </label>
            <input type="text" id="where"><br>
        </div>
        <div class="col s12 m3">
            <label for="category">Catégorie : </label>
            <select id="category" onchange="updateSubCategories()">
                <option value="null" disabled>--</option>
            </select>
        </div>
        <div class="col s12 m3">
            <label for="subCategory">Sous-catégorie : </label>
            <select id="subCategory">
                <option value="null" disabled>--</option>
            </select>
        </div>
    </div>
    <button type="button" onclick="recherche()" class="btn right mt-1" style="width:42%">Rechercher</button>

    
    <div id="activities" class="row mt-5"></div>
</div>
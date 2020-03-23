{{-- <div id="switchSearchEngine-0">
    <div style="width: 70%;">
        <input list="results" type="text" id="search-1" oninput="setdatalist(this.value)" placeholder="Ville, Activité, Domaine..." autocomplete="no">
    </div>
    <div>
        <i class="fas fa-caret-down" onclick="switchSearchEngine()"></i>
    </div>
    <div>
        <button class="btn right" onclick="searchCompanies(document.getElementById('search-1').value)">Rechercher</button>
    </div>
</div> --}}

<div id="switchSearchEngine">
    <div class="row m-0">
        <div class="w-35">
            <input type="text" placeholder="Quoi ?"  id="what" >
        </div>
        <div class="w-35">
            <input type="text" placeholder="Où ? "  id="where">
        </div>

        <div>
            <i class="fas fa-caret-down tooltipped" data-position="bottom" data-tooltip="Tous ces champs de recherche son cumulable !" onclick="switchSearchEngine()"></i>
        </div>
        <div>
            <button type="button" onclick="recherche()" class="btn right">Rechercher</button>
        </div>
    </div>

    <div class="row m-0" id="switchSearchEngine-0" style="display:none">
        <h6>Catégorie</h6>
        <div class="w-35">
            <select id="category" onchange="updateSubCategories()">
                <option value="null">--</option>
            </select>
        </div>
        <div class="w-35">
            <select id="subCategory" >
                <option value="null">--</option>
            </select>
        </div>
    </div>

    <div class="row m-0" id="switchSearchEngine-1" style="display:none">
        <h6>Budget</h6>
        <div class="row">
            <span id="min" style="min-width:35px">Min:<br>0</span>
            <p class="multi-range range-field m-0">
                <input type="range" min="0" max="2500" value="0"    step="10" id="lower">
                <input type="range" min="0" max="2500" value="2500" step="10" id="upper">
            </p>
            <span id="max" style="min-width:35px">Max:<br>2500</span>
        </div>

    </div>
</div>





<div class="containerActivities">
    <div id="activities">
    </div>
</div>

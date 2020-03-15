<div id="switchSearchEngine-0">
    <div style="width: 70%;">
        <input list="results" type="text" id="search-1" oninput="setdatalist(this.value)" placeholder="Ville, Activité, Domaine..." autocomplete="no">
    </div>
    <div>
        <i class="fas fa-ellipsis-h" onclick="switchSearchEngine()"></i>
    </div>
    <div>
        <button class="btn right" onclick="searchCompanies(document.getElementById('search-1').value)">Rechercher</button>
    </div>
</div>

<div style="display:none" id="switchSearchEngine-1">
    <div class="w-35">
        <select id="category" onchange="updateSubCategories()">
        </select>
    </div>
    <div class="w-35">
        <select id="subCategory">
            <option value="null" disabled>--</option>
        </select>
    </div>
    <div>
        <i class="fas fa-ellipsis-h" onclick="switchSearchEngine()"></i>
    </div>
    <div>
        <button type="button" onclick="recherche()" class="btn right">Rechercher</button>
    </div>
</div>

<div style="display:none" id="switchSearchEngine-2">
    <div class="w-35">
        <input type="text" id="what" placeholder="Quoi ?">
    </div>
    <div class="w-35">
        <input type="text" id="where" placeholder="Où ?">
    </div>
    <div>
        <i class="fas fa-ellipsis-h" onclick="switchSearchEngine()"></i>
    </div>
    <div>
        <button type="button" onclick="recherche()" class="btn right">Rechercher</button>
    </div>
</div>


<div class="containerActivities">
    <div id="activities">
    </div>
</div>

<div class="input-field m-0" style="height:70vh">
    <div>
        <label for="search">Recherche :</label>
        <input list="results" type="text" id="search" oninput="setdatalist()" placeholder="Votre recherche">
        <input list="type" id="type" type="text" hidden>
        <datalist id="results"></datalist>
        <button type="button" class="btn  mt-2" id="recherche" onclick="searchCompanies()">Rechercher</button>
    </div>
    

    <hr class="my-1">
    
    <div id="activities" class="row"></div>
</div>
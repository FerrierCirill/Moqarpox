// MATERIALIZE //

    // SELECT
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });

    // DROPDOWN
        document.addEventListener('DOMContentLoaded', function () {
            let elems = document.querySelectorAll('.dropdown-trigger');
            M.Dropdown.init(elems);
        });

    // PARALAX
        document.addEventListener('DOMContentLoaded', function () {
            let elems = document.querySelectorAll('.parallax');
            M.Parallax.init(elems);
        });

    // MODAL
        document.addEventListener('DOMContentLoaded', function () {
            let elems = document.querySelectorAll('.modal');
            M.Modal.init(elems);
        });
    
    // COLLAPSIBLE
        document.addEventListener('DOMContentLoaded', function () {
            let elems = document.querySelectorAll('.collapsible');
            M.Collapsible.init(elems);
        });

    // NAV
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.sidenav');
            M.Sidenav.init(elems);
        });

// END _ MATERIALIZE //